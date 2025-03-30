#!/bin/bash

# Ensure script is not being sourced
if [[ "${BASH_SOURCE[0]}" != "${0}" ]]; then
    echo "Script is being sourced. Please run it directly."
    return 1
fi

# Print colorful status messages
print_status() {
    echo -e "\e[1;34m[*] $1\e[0m"
}

print_success() {
    echo -e "\e[1;32m[+] $1\e[0m"
}

print_error() {
    echo -e "\e[1;31m[-] $1\e[0m"
}

# Check if running as root
if [[ $EUID -ne 0 ]]; then
   print_error "This script must be run as root"
   print_error "Please run: sudo bash $0 $*"
   exit 1
fi

# Function to check command exists
command_exists() {
    command -v "$@" > /dev/null 2>&1
}

# Function to install Docker if not exists
install_docker() {
    if ! command_exists docker; then
        print_status "Installing Docker..."
        apt-get update
        apt-get install -y ca-certificates curl gnupg
        install -m 0755 -d /etc/apt/keyrings
        curl -fsSL https://download.docker.com/linux/ubuntu/gpg | gpg --dearmor -o /etc/apt/keyrings/docker.gpg
        chmod a+r /etc/apt/keyrings/docker.gpg
        echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | tee /etc/apt/sources.list.d/docker.list > /dev/null
        apt-get update
        apt-get install -y docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
    else
        print_status "Docker already installed"
    fi
}

# Parse command line arguments
while [ $# -gt 0 ]; do
    case "$1" in
        --app-name=*)
        APP_NAME="${1#*=}"
        ;;
        --app-url=*)
        APP_URL="${1#*=}"
        ;;
        --admin-email=*)
        ADMIN_EMAIL="${1#*=}"
        ;;
        --admin-pass=*)
        ADMIN_PASS="${1#*=}"
        ;;
        --local-install)
        LOCAL_INSTALL=true
        ;;
        -h|--help)
        echo "Usage: $0 [options]"
        echo "Options:"
        echo "  --app-name=NAME     Set application name (default: Aployd)"
        echo "  --app-url=URL       Set application URL (default: http://SERVER_IP)"
        echo "  --admin-email=EMAIL Set admin email (default: admin@example.com)"
        echo "  --admin-pass=PASS   Set admin password (default: random)"
        echo "  --local-install     Use local files instead of git clone"
        exit 0
        ;;
        *)
        print_error "Unknown option: $1"
        exit 1
        ;;
    esac
    shift
done

# Set default values if not provided
APP_NAME=${APP_NAME:-"Aployd"}
APP_URL=${APP_URL:-"http://$(curl -s ifconfig.me)"}
ADMIN_EMAIL=${ADMIN_EMAIL:-"admin@example.com"}
ADMIN_PASS=${ADMIN_PASS:-$(openssl rand -base64 12)}

# Install Docker
print_status "Installing Docker..."
install_docker

# Create project directory
print_status "Setting up project directory..."
PROJECT_DIR="/var/www/aployd"
mkdir -p $PROJECT_DIR
cd $PROJECT_DIR

# Clone repository
print_status "Cloning the Aployd repository..."
git clone https://github.com/Adarshagupta/Aployd .

# Create docker-compose.yml
print_status "Creating Docker Compose configuration..."
cat > docker-compose.yml << 'EOL'
version: '3.8'

services:
  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
    volumes:
      - ./:/var/www/html
      - ./docker/nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - app
    networks:
      - aployd

  app:
    build:
      context: .
      dockerfile: docker/php/Dockerfile
    volumes:
      - ./:/var/www/html
    depends_on:
      - mysql
      - redis
    networks:
      - aployd

  mysql:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: aployd
      MYSQL_USER: aployd
      MYSQL_PASSWORD: ${DB_PASSWORD:-password}
      MYSQL_ROOT_PASSWORD: ${DB_ROOT_PASSWORD:-rootpassword}
    volumes:
      - mysql_data:/var/lib/mysql
    networks:
      - aployd

  redis:
    image: redis:alpine
    volumes:
      - redis_data:/data
    networks:
      - aployd

networks:
  aployd:
    driver: bridge

volumes:
  mysql_data:
  redis_data:
EOL

# Create Nginx configuration
print_status "Creating Nginx configuration..."
mkdir -p docker/nginx
cat > docker/nginx/default.conf << 'EOL'
server {
    listen 80;
    server_name _;
    root /var/www/html/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass app:9000;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOL

# Create PHP Dockerfile
print_status "Creating PHP Dockerfile..."
mkdir -p docker/php
cat > docker/php/Dockerfile << 'EOL'
FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory
COPY . .

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
EOL

# Create .env file
print_status "Creating environment configuration..."
cat > .env << EOL
APP_NAME="${APP_NAME}"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL="${APP_URL}"

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=aployd
DB_USERNAME=aployd
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=redis
FILESYSTEM_DISK=local
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
SESSION_LIFETIME=120

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
EOL

# Start Docker containers
print_status "Starting Docker containers..."
docker compose up -d --build

# Wait for containers to be ready
print_status "Waiting for containers to be ready..."
sleep 30

# Run Laravel commands
print_status "Running Laravel commands..."
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --force
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache

# Create admin user
print_status "Creating admin user..."
docker compose exec app php artisan tinker --execute="App\Models\User::create(['name' => 'Admin', 'email' => '$ADMIN_EMAIL', 'password' => bcrypt('$ADMIN_PASS')])"

print_success "Installation completed!"
print_success "Your Aployd instance should now be accessible via $APP_URL"
print_success "Admin Login Details:"
print_success "Email: $ADMIN_EMAIL"
print_success "Password: $ADMIN_PASS"
print_success "Please save these credentials securely!"
print_success "\nTo manage your application, use these commands:"
print_success "- View logs: docker compose logs -f"
print_success "- Restart services: docker compose restart"
print_success "- Stop services: docker compose down"
print_success "- Start services: docker compose up -d" 