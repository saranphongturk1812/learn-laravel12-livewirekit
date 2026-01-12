#!/bin/bash

# Fix permissions for Laravel directories
if [ -d "/var/www/storage" ]; then
    chmod -R 775 /var/www/storage
fi

if [ -d "/var/www/bootstrap/cache" ]; then
    chmod -R 775 /var/www/bootstrap/cache
fi

# Execute the main command
exec "$@"
