# Docker Commands

## Fix Permission Issues

เพื่อป้องกันปัญหา permission เมื่อสร้างไฟล์ด้วย artisan commands:

```bash
# Linux/Mac: Export your user ID and group ID
export USER_ID=$(id -u)
export GROUP_ID=$(id -g)

# หรือเพิ่มใน .env file
echo "USER_ID=$(id -u)" >> .env
echo "GROUP_ID=$(id -g)" >> .env
```

## Build and Run

```bash
# Build containers (จะใช้ USER_ID และ GROUP_ID จาก environment)
docker-compose build --no-cache

# Start containers
docker-compose up -d

# Stop containers
docker-compose down
```

## Setup Application

```bash
# Install dependencies
docker-compose exec app composer install

# Copy environment file
cp .env.example .env

# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate

# Install npm dependencies and build assets
docker-compose exec app npm install
docker-compose exec app npm run build
```

## Useful Commands

```bash
# View logs
docker-compose logs -f

# Access container shell
docker-compose exec app bash

# Run artisan commands
docker-compose exec app php artisan [command]

# Run composer commands
docker-compose exec app composer [command]

# Clear cache
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan view:clear
```

## Access Application

-   Application: http://localhost:8000
-   MySQL: localhost:3306
-   Redis: localhost:6379

## Database Configuration

Update your `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```
