#!/bin/bash

# Coolify Server SSH Setup Script
# This script prepares a server for Coolify by setting up SSH keys and configurations

# Function to display messages
log() {
  echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1"
}

# Check if running as root
if [ "$(id -u)" -ne 0 ]; then
   log "This script must be run as root" 
   exit 1
fi

# Ensure SSH server is installed
if command -v apt-get &> /dev/null; then
  apt-get update && apt-get install -y openssh-server
elif command -v yum &> /dev/null; then
  yum install -y openssh-server
elif command -v dnf &> /dev/null; then
  dnf install -y openssh-server
elif command -v pacman &> /dev/null; then
  pacman -Sy --noconfirm openssh
elif command -v apk &> /dev/null; then
  apk add openssh
fi

# Configure SSH
log "Configuring SSH..."
ssh_config="/etc/ssh/sshd_config"

# Backup original SSH config
cp $ssh_config ${ssh_config}.backup

# Update SSH config
sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin prohibit-password/' $ssh_config
sed -i 's/#PubkeyAuthentication yes/PubkeyAuthentication yes/' $ssh_config

# Create SSH directory if it doesn't exist
mkdir -p ~/.ssh
chmod 700 ~/.ssh

# If a public key is provided, add it to authorized_keys
if [ -n "$1" ]; then
  log "Adding provided public key to authorized_keys..."
  echo "$1" >> ~/.ssh/authorized_keys
  chmod 600 ~/.ssh/authorized_keys
else
  log "No public key provided. Please add your key manually to ~/.ssh/authorized_keys"
fi

# Restart SSH service
log "Restarting SSH service..."
if systemctl status sshd &> /dev/null; then
  systemctl restart sshd
elif service sshd status &> /dev/null; then
  service sshd restart
elif rc-service sshd status &> /dev/null; then
  rc-service sshd restart
else
  log "Could not restart SSH service. Please restart it manually."
fi

log "SSH setup complete!" 