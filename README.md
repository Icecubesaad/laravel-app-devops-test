# Laravel Test Application

Simple Laravel application for deployment testing.

## Features

- RESTful API endpoints
- Health check
- Basic routing
- JSON responses
- Nginx + PHP-FPM setup

## Endpoints

- `GET /` - Welcome page
- `GET /api/health` - Health check
- `GET /api/items` - List items
- `POST /api/items` - Create item
- `GET /api/stats` - Application stats

## Local Development

```bash
# Install dependencies
composer install

# Generate application key
php artisan key:generate

# Run development server
php artisan serve --host=0.0.0.0 --port=8000
```

## Docker

```bash
# Build image
docker build -t laravel-app .

# Run container
docker run -p 80:80 laravel-app
```

## Testing

```bash
# Health check
curl http://localhost/api/health

# Get items
curl http://localhost/api/items
```

## Deployment

This application is designed to be deployed on:
- AWS ECS/Fargate
- AWS EC2
- Docker containers
- Kubernetes

Port: 80 (Nginx)
PHP-FPM: 9000
