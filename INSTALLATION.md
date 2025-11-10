# Installation Guide

## Quick Start

This is a Laravel 12 admin panel starter kit with a comprehensive component library, authentication, and dark mode support.

### Requirements

- PHP 8.3 or higher
- Composer
- Node.js 18+ and npm
- SQLite, MySQL, or PostgreSQL
- Git

### Installation Steps

#### 1. Clone/Create from Template

**Option A: Using GitHub Template (Recommended)**
```bash
# Click "Use this template" on GitHub, then clone your new repository
git clone https://github.com/YOUR-USERNAME/YOUR-PROJECT-NAME.git
cd YOUR-PROJECT-NAME
```

**Option B: Clone directly**
```bash
git clone https://github.com/YOUR-USERNAME/compy.git your-project-name
cd your-project-name
rm -rf .git
git init
```

#### 2. Run Automated Setup

```bash
composer setup
```

This single command will:
- Install PHP dependencies via Composer
- Copy `.env.example` to `.env`
- Generate application key
- Create SQLite database file (if using SQLite)
- Run database migrations
- Install Node.js dependencies
- Build frontend assets

#### 3. Configure Your Application

Edit your `.env` file to customize:

```env
APP_NAME="Your App Name"
APP_URL=http://your-domain.test

# Database Configuration
# Using SQLite (default)
DB_CONNECTION=sqlite

# Or MySQL/PostgreSQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=your_database
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Mail Configuration (for password reset, etc.)
MAIL_MAILER=log
```

#### 4. Start Development

**Option A: Using the convenient dev script**
```bash
composer dev
```

This starts:
- Laravel development server (http://localhost:8000)
- Queue worker
- Laravel Pail (log viewer)
- Vite dev server (with HMR)

**Option B: Manual start**
```bash
# Terminal 1: Start Laravel server
php artisan serve

# Terminal 2: Start Vite
npm run dev
```

#### 5. Access Your Application

- **Frontend**: http://localhost:8000
- **Dashboard**: http://localhost:8000/dashboard (requires registration)
- **Component Demos**: Available after authentication

### Default User (Optional)

You can seed a default user by running:

```bash
php artisan db:seed
```

### Production Deployment

#### 1. Prepare Environment

```bash
# Set production environment
APP_ENV=production
APP_DEBUG=false

# Configure database
# Configure mail settings
# Set up queue workers
```

#### 2. Deploy

```bash
# Install dependencies (no dev dependencies)
composer install --no-dev --optimize-autoloader

# Build assets for production
npm ci
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force
```

#### 3. Set Proper Permissions

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### 4. Configure Web Server

Point your web server (Nginx/Apache) document root to the `public` directory.

**Nginx Example:**
```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/your-project/public;

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
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Features Included

### ✅ Authentication System
- User registration and login (Laravel Breeze)
- Password reset functionality
- Email verification
- Profile management

### ✅ UI Components Library
- **Alerts**: Success, error, warning, info notifications
- **Buttons**: Primary, secondary, danger variants with groups
- **Cards**: Multiple card styles with images and actions
- **Forms**: 30+ form input types with validation
- **Tables**: Sortable, filterable data tables
- **Modals**: Customizable modal dialogs
- **Dropdowns**: Context menus and navigation
- **File Manager**: Upload, browse, and manage files
- **Comments**: Nested comment system
- **Tabs & Accordions**: Content organization
- **Toast Notifications**: Non-intrusive alerts
- **Timeline**: Event timeline display
- **Lists**: Various list styles with actions
- **Sidebar**: Collapsible navigation sidebar

### ✅ Dark Mode Support
- System preference detection
- Manual toggle
- Persisted user preference

### ✅ Developer Tools
- Laravel Pail for log monitoring
- Email preview routes (local/dev only)
- Pest testing framework
- Laravel Pint for code styling

## Customization

### Updating Application Name

1. Edit `.env`:
```env
APP_NAME="Your App Name"
```

2. Update `composer.json`:
```json
{
    "name": "yourvendor/yourproject",
    "description": "Your project description"
}
```

3. Clear caches:
```bash
php artisan config:clear
php artisan cache:clear
```

### Customizing Colors/Theme

Edit `tailwind.config.js` to customize your color scheme:

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: {
          // Your custom colors
        }
      }
    }
  }
}
```

Then rebuild assets:
```bash
npm run build
```

### Removing Demo Pages

If you don't need the component demo pages:

1. Remove demo routes from `routes/web.php`
2. Delete demo views from `resources/views/`
3. Keep the component library in `resources/views/components/`

### Adding Your Own Features

Follow Laravel best practices:
- Create models in `app/Models/`
- Create controllers in `app/Http/Controllers/`
- Create migrations in `database/migrations/`
- Add routes to `routes/web.php` or create new route files

## Troubleshooting

### Permission Errors
```bash
chmod -R 755 storage bootstrap/cache
```

### Assets Not Loading
```bash
npm run build
php artisan view:clear
```

### Database Connection Errors
Check your `.env` file database settings and ensure the database exists.

### Session/Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Testing

Run the test suite:

```bash
composer test
# or
php artisan test
```

## Support

For Laravel documentation, visit: https://laravel.com/docs/12.x

## License

This starter kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

