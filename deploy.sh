#!/bin/bash

# Check if server IP is provided
if [ -z "$1" ]; then
    echo "Usage: ./deploy.sh <server_ip> [ssh_key_path]"
    echo "Example: ./deploy.sh 3.101.197.205 ~/.ssh/my_key.pem"
    exit 1
fi

SERVER_IP=$1
SSH_KEY=${2:-"~/.ssh/id_rsa"}

# Create a temporary deployment package
echo "📦 Creating deployment package..."
tar --exclude='deploy.tar.gz' \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='vendor' \
    --exclude='.env' \
    --exclude='storage/logs/*' \
    --exclude='storage/framework/cache/*' \
    --exclude='storage/framework/sessions/*' \
    --exclude='storage/framework/views/*' \
    -czf deploy.tar.gz .

# Copy the installation script and deployment package
echo "📤 Transferring files to server..."
scp -i "$SSH_KEY" deploy.tar.gz install.sh "root@$SERVER_IP:/tmp/"

# Execute installation script
echo "🚀 Starting installation..."
ssh -i "$SSH_KEY" "root@$SERVER_IP" 'bash -s' << 'ENDSSH'
cd /tmp
bash install.sh --local-install
rm deploy.tar.gz install.sh
ENDSSH

# Clean up local files
rm deploy.tar.gz

echo "✅ Deployment completed!" 