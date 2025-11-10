# Customization Guide

This guide explains how to customize your Laravel Starter Kit installation to match your brand and requirements.

## Table of Contents

- [Basic Configuration](#basic-configuration)
- [Branding](#branding)
- [Color Scheme](#color-scheme)
- [Layout Customization](#layout-customization)
- [Removing Demo Content](#removing-demo-content)
- [Adding Custom Features](#adding-custom-features)

---

## Basic Configuration

### Application Name and URL

Edit your `.env` file:

```env
APP_NAME="Your Application Name"
APP_URL=http://yourdomain.com
```

After changing, clear the config cache:

```bash
php artisan config:clear
```

### Database Configuration

**Using MySQL:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Using PostgreSQL:**
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Using SQLite (Default):**
```env
DB_CONNECTION=sqlite
```

### Email Configuration

For production email sending:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Branding

### Application Logo

#### 1. Update Logo Component

Edit `resources/views/components/application-logo.blade.php`:

```blade
<!-- Replace SVG with your logo -->
<img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" {{ $attributes }} />
```

#### 2. Add Your Logo File

Place your logo in `public/images/logo.png` or `public/images/logo.svg`

#### 3. Update Favicon

Replace `public/favicon.ico` with your custom favicon.

### Sidebar Branding

Edit `resources/views/layouts/partials/sidebar.blade.php`:

Look for the brand section (typically near the top) and customize:

```blade
<x-sidebar.brand href="{{ route('dashboard') }}">
    <x-application-logo class="h-8 w-auto" />
    <span class="text-xl font-bold">Your Brand</span>
</x-sidebar.brand>
```

---

## Color Scheme

### Tailwind Configuration

Edit `tailwind.config.js` to customize your color palette:

```javascript
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        // Add your brand colors
        primary: {
          50: '#f0f9ff',
          100: '#e0f2fe',
          200: '#bae6fd',
          300: '#7dd3fc',
          400: '#38bdf8',
          500: '#0ea5e9',  // Main brand color
          600: '#0284c7',
          700: '#0369a1',
          800: '#075985',
          900: '#0c4a6e',
          950: '#082f49',
        },
        // Add more custom colors
        accent: {
          // Your accent color palette
        }
      },
      fontFamily: {
        // Add custom fonts
        sans: ['Inter', 'system-ui', 'sans-serif'],
      }
    }
  }
}
```

After updating, rebuild assets:

```bash
npm run build
```

### CSS Variables

Edit `resources/css/app.css` to add CSS custom properties:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
    :root {
        --color-primary: 14 165 233;
        --color-secondary: 148 163 184;
        /* Add more custom properties */
    }
    
    .dark {
        --color-primary: 56 189 248;
        /* Dark mode overrides */
    }
}
```

---

## Layout Customization

### Sidebar Navigation

Edit `resources/views/layouts/partials/sidebar.blade.php`:

```blade
<x-sidebar.section title="Main Menu">
    <x-sidebar.link 
        href="{{ route('dashboard') }}" 
        icon="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
        :active="request()->routeIs('dashboard')">
        Dashboard
    </x-sidebar.link>
    
    <!-- Add your custom menu items -->
    <x-sidebar.link 
        href="{{ route('your.route') }}" 
        icon="YOUR_SVG_PATH"
        :active="request()->routeIs('your.route')">
        Your Page
    </x-sidebar.link>
</x-sidebar.section>

<!-- Add dropdown menus -->
<x-sidebar.dropdown title="Settings" icon="SETTINGS_ICON">
    <x-sidebar.dropdown-item href="{{ route('settings.general') }}">
        General
    </x-sidebar.dropdown-item>
    <x-sidebar.dropdown-item href="{{ route('settings.security') }}">
        Security
    </x-sidebar.dropdown-item>
</x-sidebar.dropdown>
```

### Dashboard Layout

Edit `resources/views/dashboard.blade.php` to customize your dashboard:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Your custom dashboard content -->
        </div>
    </div>
</x-app-layout>
```

### Top Navigation

Edit `resources/views/layouts/navigation.blade.php` for top nav customization.

---

## Removing Demo Content

If you want to start with a clean slate:

### 1. Remove Demo Routes

Edit `routes/web.php` and remove/comment out demo routes:

```php
// Remove or comment these lines:
Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/forms/demo', ...
    // Route::get('/tables/demo', ...
    // Route::get('/buttons/demo', ...
    // ... etc
});
```

### 2. Remove Demo Views

Keep the components but remove demo pages:

```bash
rm resources/views/*-demo.blade.php
rm -rf resources/views/buttons/
rm -rf resources/views/cards/
rm -rf resources/views/forms/
rm -rf resources/views/tables/
rm -rf resources/views/lists/
rm -rf resources/views/modals/
rm -rf resources/views/files/
rm -rf resources/views/sidebar/

# KEEP these:
# - resources/views/components/ (component library)
# - resources/views/layouts/ (layout templates)
# - resources/views/auth/ (authentication pages)
# - resources/views/profile/ (profile management)
# - resources/views/errors/ (error pages)
```

### 3. Clean Welcome/Landing Page

Edit `resources/views/welcome.blade.php` to create your own landing page.

### 4. Customize Dashboard

Edit `resources/views/dashboard.blade.php` to show your own dashboard content instead of the demo.

---

## Adding Custom Features

### Creating a New CRUD Resource

Example: Adding a "Projects" feature

#### 1. Create Migration

```bash
php artisan make:migration create_projects_table
```

Edit `database/migrations/YYYY_MM_DD_create_projects_table.php`:

```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->string('name');
    $table->text('description')->nullable();
    $table->enum('status', ['active', 'completed', 'archived'])->default('active');
    $table->timestamps();
});
```

Run migration:

```bash
php artisan migrate
```

#### 2. Create Model

```bash
php artisan make:model Project
```

Edit `app/Models/Project.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

#### 3. Create Controller

```bash
php artisan make:controller ProjectController
```

Edit `app/Http/Controllers/ProjectController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::where('user_id', auth()->id())
            ->latest()
            ->paginate(15);

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,archived',
        ]);

        $project = auth()->user()->projects()->create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    // Add show, edit, update, destroy methods...
}
```

#### 4. Create Views

Create `resources/views/projects/index.blade.php`:

```blade
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Projects') }}
            </h2>
            <a href="{{ route('projects.create') }}" 
               class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                New Project
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-card.card>
                <x-table.table>
                    <x-table.header>
                        <x-table.row>
                            <x-table.header-cell>Name</x-table.header-cell>
                            <x-table.header-cell>Status</x-table.header-cell>
                            <x-table.header-cell>Created</x-table.header-cell>
                            <x-table.header-cell>Actions</x-table.header-cell>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        @foreach($projects as $project)
                            <x-table.row>
                                <x-table.cell>{{ $project->name }}</x-table.cell>
                                <x-table.cell>
                                    <span class="rounded-full px-2 py-1 text-xs font-semibold
                                        {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $project->status === 'completed' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $project->status === 'archived' ? 'bg-gray-100 text-gray-800' : '' }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </x-table.cell>
                                <x-table.cell>{{ $project->created_at->format('M d, Y') }}</x-table.cell>
                                <x-table.cell>
                                    <a href="{{ route('projects.edit', $project) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-table.body>
                </x-table.table>

                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            </x-card.card>
        </div>
    </div>
</x-app-layout>
```

#### 5. Add Routes

Edit `routes/web.php`:

```php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('projects', ProjectController::class);
});
```

#### 6. Add to Sidebar

Edit `resources/views/layouts/partials/sidebar.blade.php`:

```blade
<x-sidebar.link 
    href="{{ route('projects.index') }}" 
    icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
    :active="request()->routeIs('projects.*')">
    Projects
</x-sidebar.link>
```

---

## Custom Components

### Creating Your Own Component

```bash
php artisan make:component StatusBadge
```

Edit `app/View/Components/StatusBadge.php`:

```php
<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

final class StatusBadge extends Component
{
    public function __construct(
        public string $status,
        public string $size = 'md'
    ) {}

    public function render(): View
    {
        return view('components.status-badge');
    }
}
```

Create `resources/views/components/status-badge.blade.php`:

```blade
@php
$colors = [
    'active' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
    'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
    'inactive' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
];

$sizes = [
    'sm' => 'px-2 py-0.5 text-xs',
    'md' => 'px-2.5 py-1 text-sm',
    'lg' => 'px-3 py-1.5 text-base',
];
@endphp

<span {{ $attributes->merge([
    'class' => 'inline-flex items-center rounded-full font-semibold ' . 
               ($colors[$status] ?? $colors['inactive']) . ' ' . 
               ($sizes[$size] ?? $sizes['md'])
]) }}>
    {{ ucfirst($status) }}
</span>
```

Use it:

```blade
<x-status-badge status="active" size="md" />
```

---

## Advanced Customization

### Adding a Custom Theme

Create a theme switcher with more than just light/dark:

1. **Add theme options** in `resources/js/dark.js`
2. **Create theme config** in `config/theme.php`
3. **Update CSS** with theme-specific variables
4. **Build theme selector** component

### Internationalization (i18n)

Add multiple language support:

```bash
php artisan lang:publish
```

Create language files in `lang/`:
- `lang/en/messages.php`
- `lang/es/messages.php`
- `lang/fr/messages.php`

Use in views:

```blade
{{ __('messages.welcome') }}
```

---

## Testing Your Customizations

Always test after making changes:

```bash
# Run tests
composer test

# Check code style
./vendor/bin/pint

# Clear caches
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Rebuild assets
npm run build
```

---

## Tips and Best Practices

1. **Version Control**: Commit frequently with descriptive messages
2. **Environment Variables**: Keep sensitive data in `.env`, never commit it
3. **Component Reusability**: Use the existing component library before creating new ones
4. **Code Style**: Run `./vendor/bin/pint` to maintain consistent code style
5. **Performance**: Use caching for production (`php artisan optimize`)
6. **Security**: Always validate and sanitize user input
7. **Testing**: Write tests for custom features

---

## Getting Help

- **Laravel Documentation**: https://laravel.com/docs/12.x
- **Tailwind CSS**: https://tailwindcss.com/docs
- **Alpine.js**: https://alpinejs.dev
- **Component Examples**: Check the demo pages included in the starter kit

---

Happy Customizing! 🎨

