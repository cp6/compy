# Compy - Laravel 12 Admin Panel Starter Kit

<p align="center">
  <strong>A comprehensive Laravel 12 admin panel starter kit with 100+ pre-built components, authentication, and dark mode support.</strong>
</p>

<p align="center">
  <a href="#-quick-start">Quick Start</a> •
  <a href="#-features">Features</a> •
  <a href="#-documentation">Documentation</a> •
  <a href="#-component-library">Components</a> •
  <a href="#-requirements">Requirements</a>
</p>

---

## 🚀 Quick Start

Get up and running in under 2 minutes:

```bash
# Clone or create from template
git clone https://github.com/YOUR-USERNAME/compy.git your-project
cd your-project

# Run automated setup (installs dependencies, configures .env, runs migrations, builds assets)
composer setup

# Start development environment (Laravel server + Vite + Queue + Logs)
composer dev
```

Visit **http://localhost:8000** and start building!

### Alternative: Manual Setup

```bash
# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations (creates SQLite database by default)
php artisan migrate

# Install Node dependencies and build assets
npm install && npm run build

# Start servers separately
php artisan serve    # Terminal 1
npm run dev          # Terminal 2
```

---

## ✨ Features

### 🔐 Complete Authentication System
- User registration and login (Laravel Breeze)
- Password reset with email notifications
- Email verification
- Profile management (update info, change password, delete account)

### 🎨 100+ Pre-built Components
- **Alerts & Notifications**: Success, error, warning, info alerts + toast notifications
- **Buttons**: Primary, secondary, danger variants with groups and dropdowns
- **Cards**: Image cards, profile cards, action cards, and more
- **Forms**: 30+ input types including autocomplete, tags, rich text, color picker
- **Tables**: Sortable, responsive tables with pagination
- **Modals**: Customizable modal dialogs with headers and footers
- **File Manager**: Upload, browse, and manage files
- **Comments**: Nested comment system with replies
- **Navigation**: Sidebar, dropdowns, breadcrumbs
- **Timeline**: Event timeline display
- **Tabs & Accordions**: Content organization
- **Lists**: Various list styles with avatars, badges, and actions

### 🌙 Dark Mode Support
- Automatic system preference detection
- Manual toggle switch
- Persistent user preference
- Fully styled dark mode for all components

### 🛠️ Developer Experience
- **Laravel Pail**: Real-time log monitoring
- **Pest Testing**: Modern testing framework
- **Laravel Pint**: Automatic code styling
- **Vite**: Fast HMR (Hot Module Replacement)
- **Concurrently Scripts**: Run all dev services with one command
- **Email Preview**: Preview emails in browser (dev only)

### 📱 Responsive Design
- Mobile-first approach
- Responsive layouts for all screen sizes
- Touch-friendly navigation

### 🎯 Production Ready
- Optimized asset building
- Database migrations
- Proper error pages (401, 403, 404, 419, 500, 503)
- Email templates
- Security best practices

---

## 📚 Documentation

Comprehensive guides to help you get started and customize your application:

- **[Installation Guide](INSTALLATION.md)** - Detailed setup instructions, deployment, troubleshooting
- **[Customization Guide](CUSTOMIZATION.md)** - Branding, colors, layouts, adding features
- **[Starter Kit Guide](STARTER_KIT_GUIDE.md)** - How to use this as a template for new projects
- **[Component Library](#-component-library)** - Full list of available components (below)

---

## 📦 Requirements

- **PHP**: 8.3 or higher
- **Composer**: Latest version
- **Node.js**: 18+ and npm
- **Database**: SQLite (default), MySQL, or PostgreSQL
- **Git**: For version control

---

## 🎨 Component Library

This starter kit includes a comprehensive component library built with Tailwind CSS and Alpine.js. All components support dark mode and are fully customizable.

## Application Structure

### Layouts

Base layout templates located in `resources/views/layouts/`:

- `app.blade.php` - Main application layout (authenticated users)
- `guest.blade.php` - Guest layout (unauthenticated users)
- `navigation.blade.php` - Navigation component layout
- `partials/sidebar.blade.php` - Sidebar partial component

### Components

Reusable Blade components located in `resources/views/components/`:

#### Alert Components
- `alert/alert.blade.php` - Single alert component
- `alert/alerts.blade.php` - Multiple alerts container

#### Button Components
- `button/button.blade.php` - Base button component
- `button/danger.blade.php` - Danger variant button
- `button/dropdown.blade.php` - Button with dropdown
- `button/group.blade.php` - Button group container
- `button/primary.blade.php` - Primary variant button
- `button/secondary.blade.php` - Secondary variant button

#### Card Components
- `card/card.blade.php` - Base card component
- `card/csgo-skin.blade.php` - CSGO skin card variant
- `card/image.blade.php` - Card with image
- `card/profile.blade.php` - Profile card variant
- `card/with-actions.blade.php` - Card with action buttons

#### Comment Components
- `comment/comment.blade.php` - Single comment item with nested replies support
- `comment/form.blade.php` - Comment form with textarea and submit
- `comment/list.blade.php` - Comments list container with close all functionality

#### Tabs Components
- `tabs/tabs.blade.php` - Tab container component
- `tabs/tab-item.blade.php` - Individual tab button
- `tabs/tab-panel.blade.php` - Tab content panel

#### Accordion Components
- `accordion/accordion.blade.php` - Accordion container component
- `accordion/accordion-item.blade.php` - Accordion item with expand/collapse

#### Toast/Notification Components
- `toast/toast.blade.php` - Individual toast notification
- `toast/toast-container.blade.php` - Toast container for managing multiple toasts

#### Timeline Components
- `timeline/timeline.blade.php` - Timeline container component
- `timeline/timeline-item.blade.php` - Individual timeline event item

#### Dropdown Components
- `dropdown/dropdown.blade.php` - Base dropdown component
- `dropdown/item.blade.php` - Dropdown item
- `dropdown/link.blade.php` - Dropdown link item

#### File Components
- `file/context-menu.blade.php` - File context menu
- `file/details.blade.php` - File details display
- `file/item.blade.php` - Single file item
- `file/list.blade.php` - File list container
- `file/manager.blade.php` - File manager interface
- `file/toolbar.blade.php` - File manager toolbar
- `file/upload.blade.php` - File upload component

#### Form Components
- `form/autocomplete.blade.php` - Autocomplete input
- `form/checkbox.blade.php` - Checkbox input
- `form/color.blade.php` - Color picker input
- `form/date.blade.php` - Date input
- `form/datetime.blade.php` - DateTime input
- `form/error.blade.php` - Form error display
- `form/file.blade.php` - File input
- `form/group.blade.php` - Form group container
- `form/hidden.blade.php` - Hidden input
- `form/input-prefix.blade.php` - Input with prefix
- `form/input.blade.php` - Base input component
- `form/label.blade.php` - Form label
- `form/modal.blade.php` - Form in modal
- `form/month.blade.php` - Month input
- `form/multiselect.blade.php` - Multi-select dropdown
- `form/number-prefix.blade.php` - Number input with prefix
- `form/number.blade.php` - Number input
- `form/radio.blade.php` - Radio button input
- `form/range-dual.blade.php` - Dual range slider
- `form/range.blade.php` - Range slider input
- `form/rating.blade.php` - Rating input
- `form/rich-text.blade.php` - Rich text editor
- `form/search.blade.php` - Search input
- `form/select.blade.php` - Select dropdown
- `form/tags.blade.php` - Tags input
- `form/tel.blade.php` - Telephone input
- `form/text-input.blade.php` - Text input variant
- `form/textarea.blade.php` - Textarea input
- `form/time.blade.php` - Time input
- `form/toggle.blade.php` - Toggle switch
- `form/url.blade.php` - URL input
- `form/week.blade.php` - Week input

#### List Components
- `list/group.blade.php` - List group container
- `list/item-action.blade.php` - List item with action
- `list/item-avatar.blade.php` - List item with avatar
- `list/item-badge.blade.php` - List item with badge
- `list/item-description.blade.php` - List item with description
- `list/item-icon.blade.php` - List item with icon
- `list/item.blade.php` - Base list item
- `list/list.blade.php` - Base list container

#### Modal Components
- `modal/body.blade.php` - Modal body content
- `modal/footer.blade.php` - Modal footer
- `modal/header.blade.php` - Modal header
- `modal/modal.blade.php` - Base modal component

#### Navigation Components
- `nav/link.blade.php` - Navigation link
- `nav/responsive-link.blade.php` - Responsive navigation link

#### Sidebar Components
- `sidebar/badge.blade.php` - Sidebar badge
- `sidebar/brand.blade.php` - Sidebar brand/logo
- `sidebar/dropdown-item.blade.php` - Sidebar dropdown item
- `sidebar/dropdown.blade.php` - Sidebar dropdown menu
- `sidebar/example.blade.php` - Sidebar example
- `sidebar/footer.blade.php` - Sidebar footer
- `sidebar/icon.blade.php` - Sidebar icon
- `sidebar/link.blade.php` - Sidebar link
- `sidebar/search.blade.php` - Sidebar search
- `sidebar/section.blade.php` - Sidebar section
- `sidebar/sidebar.blade.php` - Base sidebar component
- `sidebar/spacer.blade.php` - Sidebar spacer

#### Table Components
- `table/body.blade.php` - Table body
- `table/cell.blade.php` - Table cell
- `table/header-cell.blade.php` - Table header cell
- `table/header.blade.php` - Table header row
- `table/row.blade.php` - Table row
- `table/table.blade.php` - Base table component

#### Utility Components
- `application-logo.blade.php` - Application logo
- `auth-session-status.blade.php` - Authentication session status
- `breadcrumb.blade.php` - Breadcrumb navigation
- `pagination.blade.php` - Pagination component
- `spinner.blade.php` - Loading spinner
- `theme-switcher.blade.php` - Dark/light theme switcher
- `usage.blade.php` - Component usage documentation

### Demo Pages

Component demonstration pages located in `resources/views/`:

- `buttons/demo.blade.php` - Button components demo (Route: `/buttons/demo`)
- `cards/demo.blade.php` - Card components demo (Route: `/cards/demo`)
- `comments-demo.blade.php` - Nested comments system demo (Route: `/comments/demo`)
- `tabs-demo.blade.php` - Tab navigation components demo (Route: `/tabs/demo`)
- `accordion-demo.blade.php` - Accordion components demo (Route: `/accordion/demo`)
- `toast-demo.blade.php` - Toast notification components demo (Route: `/toast/demo`)
- `timeline-demo.blade.php` - Timeline components demo (Route: `/timeline/demo`)
- `files/demo.blade.php` - File components demo (Route: `/files/demo`)
- `forms/demo.blade.php` - Form components demo (Route: `/forms/demo`)
- `lists/demo.blade.php` - List components demo (Route: `/lists/demo`)
- `modals/demo.blade.php` - Modal components demo (Route: `/modals/demo`)
- `sidebar/demo.blade.php` - Sidebar components demo (Route: `/sidebar/demo`)
- `tables/demo.blade.php` - Table components demo (Route: `/tables/demo`)
- `misc-demo.blade.php` - Miscellaneous components demo (Route: `/misc/demo`)
- `premium-demo.blade.php` - Premium components demo (Route: `/premium-demo`)
- `usage-demo.blade.php` - Component usage examples (Route: `/usage-demo`)

### Main Pages

Core application pages:

- `welcome.blade.php` - Landing page (Route: `/`)
- `dashboard.blade.php` - User dashboard (Route: `/dashboard`, Auth required)
- `blank.blade.php` - Blank page template (Route: `/blank`)
- `pricing.blade.php` - Pricing page (Route: `/pricing`)

### Authentication Pages

Authentication views located in `resources/views/auth/`:

- `login.blade.php` - User login page
- `register.blade.php` - User registration page
- `forgot-password.blade.php` - Password reset request page
- `reset-password.blade.php` - Password reset form
- `verify-email.blade.php` - Email verification page
- `confirm-password.blade.php` - Password confirmation page

### Profile Pages

User profile management located in `resources/views/profile/`:

- `edit.blade.php` - Profile edit page (Route: `/profile`, Auth required)
- `partials/delete-user-form.blade.php` - Delete user account form
- `partials/update-password-form.blade.php` - Update password form
- `partials/update-profile-information-form.blade.php` - Update profile information form

### Error Pages

Error page templates located in `resources/views/errors/`:

- `401.blade.php` - Unauthorized error page
- `403.blade.php` - Forbidden error page
- `404.blade.php` - Not found error page
- `419.blade.php` - CSRF token mismatch error page
- `500.blade.php` - Server error page
- `503.blade.php` - Service unavailable error page

### Email Templates

Email templates located in `resources/views/emails/`:

- `reset-password.blade.php` - Password reset email template
- `verify-email.blade.php` - Email verification template
- `preview/index.blade.php` - Email preview index (Route: `/email-preview`, Dev only)

## Routes Summary

### Public Routes
- `GET /` - Welcome page
- `GET /pricing` - Pricing page
- `GET /premium-demo` - Premium demo page
- `GET /blank` - Blank page
- `GET /usage-demo` - Usage demo page

### Authenticated Routes
- `GET /dashboard` - Dashboard (requires auth & verified)
- `GET /profile` - Profile edit page
- `PATCH /profile` - Update profile
- `DELETE /profile` - Delete profile
- `GET /forms/demo` - Forms demo
- `POST /forms/demo` - Submit form demo
- `GET /tables/demo` - Tables demo
- `GET /sidebar/demo` - Sidebar demo
- `GET /lists/demo` - Lists demo
- `GET /cards/demo` - Cards demo
- `GET /buttons/demo` - Buttons demo
- `GET /comments/demo` - Comments demo (nested comment system)
- `GET /tabs/demo` - Tabs demo
- `GET /accordion/demo` - Accordion demo
- `GET /toast/demo` - Toast notifications demo
- `GET /timeline/demo` - Timeline demo
- `GET /files/demo` - Files demo
- `GET /modals/demo` - Modals demo
- `GET /misc/demo` - Miscellaneous demo

### Development Routes (Local/Development only)
- `GET /email-preview` - Email preview index
- `GET /email-preview/verify-email` - Verify email preview
- `GET /email-preview/reset-password` - Reset password email preview

## Technical Stack

- **Framework**: Laravel 12.0+
- **PHP**: 8.3+
- **Frontend**: Tailwind CSS
- **Features**: Dark mode support, Component-based architecture

---

## 🏗️ Architecture & Best Practices

This starter kit follows Laravel and industry best practices:

### Code Standards
- **PSR-12** coding standards
- **SOLID principles** for OOP
- **Final classes** for controllers and models (prevents inheritance issues)
- **Explicit type declarations** for methods and properties (PHP 8.3+ features)
- **Service layer pattern** for complex business logic
- **Form Request validation** for input validation

### Project Structure
- **MVC architecture** with clear separation of concerns
- **Component-based** Blade templates for reusability
- **Eloquent ORM** for database interactions
- **Repository pattern** ready (add as needed)
- **Middleware** for request filtering
- **API Resources** ready for API development

### Security
- CSRF protection enabled
- XSS prevention
- SQL injection prevention via Eloquent
- Password hashing with bcrypt
- Email verification
- Rate limiting

---

## 🚦 Usage

### Accessing Demo Pages

After logging in, you can access component demos from the sidebar:

- **Forms Demo**: `/forms/demo` - All form components with examples
- **Tables Demo**: `/tables/demo` - Data table examples
- **Buttons Demo**: `/buttons/demo` - Button variants and styles
- **Cards Demo**: `/cards/demo` - Card component examples
- **Modals Demo**: `/modals/demo` - Modal dialog examples
- And many more...

### Using Components in Your Views

All components are located in `resources/views/components/`. Use them in your Blade templates:

```blade
{{-- Alert --}}
<x-alert.alert type="success" dismissible>
    Operation completed successfully!
</x-alert.alert>

{{-- Button --}}
<x-button.primary href="{{ route('dashboard') }}">
    Go to Dashboard
</x-button.primary>

{{-- Card --}}
<x-card.card>
    <x-slot name="header">
        <h3>Card Title</h3>
    </x-slot>
    
    Card content goes here
    
    <x-slot name="footer">
        <x-button.primary>Action</x-button.primary>
    </x-slot>
</x-card.card>

{{-- Form --}}
<form method="POST" action="{{ route('your.route') }}">
    @csrf
    
    <x-form.group>
        <x-form.label for="name">Name</x-form.label>
        <x-form.input id="name" name="name" type="text" required />
        <x-form.error :messages="$errors->get('name')" />
    </x-form.group>
    
    <x-button.primary type="submit">Submit</x-button.primary>
</form>

{{-- Table --}}
<x-table.table>
    <x-table.header>
        <x-table.row>
            <x-table.header-cell>Name</x-table.header-cell>
            <x-table.header-cell>Email</x-table.header-cell>
            <x-table.header-cell>Actions</x-table.header-cell>
        </x-table.row>
    </x-table.header>
    <x-table.body>
        @foreach($users as $user)
            <x-table.row>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell>
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                </x-table.cell>
            </x-table.row>
        @endforeach
    </x-table.body>
</x-table.table>
```

---

## 🧪 Testing

Run the test suite:

```bash
# Run all tests
composer test

# Or use Pest directly
./vendor/bin/pest

# Run specific test file
./vendor/bin/pest tests/Feature/ExampleTest.php

# Run with coverage
./vendor/bin/pest --coverage
```

---

## 🎨 Customization Quick Tips

### Change Application Name
Edit `.env`:
```env
APP_NAME="Your App Name"
```

### Change Color Scheme
Edit `tailwind.config.js` to add your brand colors.

### Customize Sidebar
Edit `resources/views/layouts/partials/sidebar.blade.php` to add/remove menu items.

### Add New Pages
1. Create route in `routes/web.php`
2. Create controller (optional): `php artisan make:controller YourController`
3. Create view in `resources/views/`
4. Add menu item to sidebar

For detailed customization instructions, see [CUSTOMIZATION.md](CUSTOMIZATION.md).

---

## 🚀 Deployment

### Production Checklist

```bash
# Set production environment
APP_ENV=production
APP_DEBUG=false

# Install dependencies
composer install --no-dev --optimize-autoloader

# Build assets
npm ci && npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Set permissions
chmod -R 755 storage bootstrap/cache
```

For detailed deployment instructions, see [INSTALLATION.md](INSTALLATION.md).

---

## 📝 Creating Your First Feature

Example: Adding a "Tasks" feature

```bash
# Create migration
php artisan make:migration create_tasks_table

# Create model
php artisan make:model Task

# Create controller
php artisan make:controller TaskController

# Add routes to routes/web.php
# Create views in resources/views/tasks/
# Add to sidebar menu
```

See [CUSTOMIZATION.md](CUSTOMIZATION.md) for a complete CRUD example.

---

## 🤝 Contributing

Contributions are welcome! If you find a bug or have a feature request, please open an issue.

---

## 📄 License

This starter kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 🙏 Acknowledgments

Built with:
- [Laravel 12](https://laravel.com) - The PHP Framework for Web Artisans
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Your new lightweight JavaScript framework
- [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#breeze) - Minimal, simple authentication scaffolding

---

## 📞 Support

- **Documentation**: See guides in this repository
- **Laravel Docs**: https://laravel.com/docs/12.x
- **Issues**: Open an issue on GitHub
- **Discussions**: Use GitHub Discussions for questions

---

<p align="center">Made with ❤️ for the Laravel community</p>
