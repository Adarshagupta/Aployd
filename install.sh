#!/bin/bash

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
   exit 1
fi

# Update system
print_status "Updating system packages..."
apt-get update && apt-get upgrade -y

# Install required packages
print_status "Installing required packages..."
apt-get install -y \
    nginx \
    php8.1 \
    php8.1-fpm \
    php8.1-mysql \
    php8.1-mbstring \
    php8.1-xml \
    php8.1-curl \
    php8.1-zip \
    composer \
    git \
    unzip \
    mysql-server

# Configure MySQL
print_status "Configuring MySQL..."
mysql_password=$(openssl rand -base64 12)
mysql -e "CREATE DATABASE IF NOT EXISTS coolify;"
mysql -e "CREATE USER IF NOT EXISTS 'coolify'@'localhost' IDENTIFIED BY '$mysql_password';"
mysql -e "GRANT ALL PRIVILEGES ON coolify.* TO 'coolify'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

# Create project directory
print_status "Setting up project directory..."
PROJECT_DIR="/var/www/coolify"
mkdir -p $PROJECT_DIR
cd $PROJECT_DIR

# Clone the repository
print_status "Cloning the repository..."
git clone https://github.com/coollabsio/coolify .

# Set permissions
print_status "Setting correct permissions..."
chown -R www-data:www-data $PROJECT_DIR
chmod -R 755 $PROJECT_DIR

# Configure environment
print_status "Setting up environment configuration..."
cp .env.example .env
php artisan key:generate
sed -i "s/DB_PASSWORD=/DB_PASSWORD=$mysql_password/" .env
sed -i "s#APP_URL=http://localhost#APP_URL=http://$(curl -s ifconfig.me)#" .env

# Install composer dependencies
print_status "Installing PHP dependencies..."
composer install --no-interaction --optimize-autoloader --no-dev

# Run migrations
print_status "Running database migrations..."
php artisan migrate --force

# Configure Nginx
print_status "Configuring Nginx..."
cat > /etc/nginx/sites-available/coolify << 'EOL'
server {
    listen 80;
    server_name _;
    root /var/www/coolify/public;

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
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
EOL

# Enable the site
print_status "Enabling Nginx site configuration..."
ln -sf /etc/nginx/sites-available/coolify /etc/nginx/sites-enabled/
rm -f /etc/nginx/sites-enabled/default

# Test Nginx configuration
nginx -t

# Optimize Laravel
print_status "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart services
print_status "Restarting services..."
systemctl restart php8.1-fpm
systemctl restart nginx

print_success "Installation completed!"
print_success "Your Coolify instance should now be accessible via http://$(curl -s ifconfig.me)"
print_success "MySQL Database Details:"
print_success "Database: coolify"
print_success "Username: coolify"
print_success "Password: $mysql_password"
print_success "Please save these credentials securely!" 