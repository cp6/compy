#!/bin/bash

#######################################
# Laravel Starter Kit Deployment Script
#######################################

set -e  # Exit on error

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Functions
log_info() {
    echo -e "${BLUE}ℹ${NC} $1"
}

log_success() {
    echo -e "${GREEN}✓${NC} $1"
}

log_warning() {
    echo -e "${YELLOW}⚠${NC} $1"
}

log_error() {
    echo -e "${RED}✗${NC} $1"
}

check_requirements() {
    log_info "Checking requirements..."
    
    # Check PHP
    if ! command -v php &> /dev/null; then
        log_error "PHP is not installed"
        exit 1
    fi
    
    PHP_VERSION=$(php -r "echo PHP_VERSION;")
    log_success "PHP $PHP_VERSION detected"
    
    # Check Composer
    if ! command -v composer &> /dev/null; then
        log_error "Composer is not installed"
        exit 1
    fi
    log_success "Composer detected"
    
    # Check Node.js
    if ! command -v node &> /dev/null; then
        log_error "Node.js is not installed"
        exit 1
    fi
    
    NODE_VERSION=$(node -v)
    log_success "Node.js $NODE_VERSION detected"
    
    # Check npm
    if ! command -v npm &> /dev/null; then
        log_error "npm is not installed"
        exit 1
    fi
    log_success "npm detected"
}

setup_environment() {
    log_info "Setting up environment..."
    
    if [ ! -f .env ]; then
        if [ -f .env.example ]; then
            cp .env.example .env
            log_success "Created .env file from .env.example"
        else
            log_error ".env.example not found"
            exit 1
        fi
    else
        log_warning ".env file already exists"
    fi
}

install_dependencies() {
    log_info "Installing PHP dependencies..."
    
    if [ "$1" == "production" ]; then
        composer install --no-dev --optimize-autoloader --no-interaction
    else
        composer install --no-interaction
    fi
    
    log_success "PHP dependencies installed"
    
    log_info "Installing Node.js dependencies..."
    npm ci --silent
    log_success "Node.js dependencies installed"
}

generate_key() {
    log_info "Generating application key..."
    
    # Check if key already exists
    if grep -q "APP_KEY=base64:" .env; then
        log_warning "Application key already exists"
    else
        php artisan key:generate --ansi
        log_success "Application key generated"
    fi
}

setup_database() {
    log_info "Setting up database..."
    
    # Check database connection
    DB_CONNECTION=$(php artisan tinker --execute="echo config('database.default');" 2>/dev/null || echo "")
    
    if [ "$DB_CONNECTION" == "sqlite" ]; then
        # Create SQLite database if it doesn't exist
        if [ ! -f database/database.sqlite ]; then
            touch database/database.sqlite
            log_success "Created SQLite database file"
        else
            log_warning "SQLite database already exists"
        fi
    fi
    
    # Run migrations
    if [ "$1" == "production" ]; then
        php artisan migrate --force --no-interaction
    else
        log_warning "Run migrations manually with: php artisan migrate"
    fi
    
    log_success "Database setup complete"
}

build_assets() {
    log_info "Building frontend assets..."
    
    if [ "$1" == "production" ]; then
        npm run build
        log_success "Production assets built"
    else
        npm run build
        log_success "Development assets built"
    fi
}

optimize_application() {
    log_info "Optimizing application..."
    
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    
    log_success "Application optimized"
}

set_permissions() {
    log_info "Setting permissions..."
    
    if [ -d storage ]; then
        chmod -R 755 storage
        log_success "Storage permissions set"
    fi
    
    if [ -d bootstrap/cache ]; then
        chmod -R 755 bootstrap/cache
        log_success "Bootstrap cache permissions set"
    fi
}

clear_caches() {
    log_info "Clearing caches..."
    
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    php artisan cache:clear
    
    log_success "Caches cleared"
}

run_tests() {
    log_info "Running tests..."
    
    php artisan test --parallel
    
    log_success "Tests passed"
}

# Main deployment script
main() {
    echo ""
    echo "╔════════════════════════════════════════════╗"
    echo "║   Laravel Starter Kit Deployment Script   ║"
    echo "╚════════════════════════════════════════════╝"
    echo ""
    
    # Parse arguments
    ENVIRONMENT="${1:-development}"
    SKIP_TESTS=false
    
    while [[ "$#" -gt 0 ]]; do
        case $1 in
            --production) ENVIRONMENT="production" ;;
            --skip-tests) SKIP_TESTS=true ;;
            *) ;;
        esac
        shift
    done
    
    log_info "Deploying in $ENVIRONMENT mode..."
    echo ""
    
    # Run deployment steps
    check_requirements
    echo ""
    
    setup_environment
    echo ""
    
    install_dependencies "$ENVIRONMENT"
    echo ""
    
    generate_key
    echo ""
    
    setup_database "$ENVIRONMENT"
    echo ""
    
    build_assets "$ENVIRONMENT"
    echo ""
    
    if [ "$ENVIRONMENT" == "production" ]; then
        optimize_application
        echo ""
    else
        clear_caches
        echo ""
    fi
    
    set_permissions
    echo ""
    
    if [ "$SKIP_TESTS" = false ] && [ "$ENVIRONMENT" != "production" ]; then
        run_tests
        echo ""
    fi
    
    echo ""
    echo "╔════════════════════════════════════════════╗"
    echo "║          Deployment Complete! 🎉          ║"
    echo "╚════════════════════════════════════════════╝"
    echo ""
    
    if [ "$ENVIRONMENT" == "production" ]; then
        log_info "Production deployment completed successfully"
        echo ""
        log_warning "Remember to:"
        echo "  - Configure your web server (Nginx/Apache)"
        echo "  - Set up SSL certificate"
        echo "  - Configure environment variables in .env"
        echo "  - Set up queue workers if using queues"
        echo "  - Set up scheduled tasks (cron)"
        echo "  - Configure monitoring and logging"
    else
        log_info "Development setup completed successfully"
        echo ""
        log_info "To start development server, run:"
        echo "  composer dev"
        echo ""
        log_info "Or start services separately:"
        echo "  php artisan serve"
        echo "  npm run dev"
    fi
    echo ""
}

# Show usage if --help is passed
if [ "$1" == "--help" ] || [ "$1" == "-h" ]; then
    echo "Usage: ./deploy.sh [OPTIONS]"
    echo ""
    echo "Options:"
    echo "  --production    Deploy in production mode (default: development)"
    echo "  --skip-tests    Skip running tests"
    echo "  --help, -h      Show this help message"
    echo ""
    echo "Examples:"
    echo "  ./deploy.sh                    # Development deployment"
    echo "  ./deploy.sh --production       # Production deployment"
    echo "  ./deploy.sh --skip-tests       # Development without tests"
    echo ""
    exit 0
fi

# Run main function
main "$@"

