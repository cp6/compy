# Contributing to Laravel Starter Kit

Thank you for considering contributing to this Laravel Starter Kit! This document will guide you through the contribution process.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [How Can I Contribute?](#how-can-i-contribute)
- [Development Setup](#development-setup)
- [Coding Standards](#coding-standards)
- [Pull Request Process](#pull-request-process)
- [Component Guidelines](#component-guidelines)
- [Testing Guidelines](#testing-guidelines)

---

## Code of Conduct

### Our Pledge

We pledge to make participation in this project a harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.

### Our Standards

**Positive behavior includes:**
- Using welcoming and inclusive language
- Being respectful of differing viewpoints
- Gracefully accepting constructive criticism
- Focusing on what is best for the community
- Showing empathy towards other community members

**Unacceptable behavior includes:**
- Trolling, insulting/derogatory comments, and personal attacks
- Public or private harassment
- Publishing others' private information without permission
- Other conduct which could reasonably be considered inappropriate

---

## How Can I Contribute?

### Reporting Bugs

Before submitting a bug report:
1. Check the [documentation](README.md) to ensure it's not a configuration issue
2. Search existing [issues](https://github.com/YOUR-USERNAME/compy/issues) to avoid duplicates
3. Test with the latest version

**When submitting a bug report, include:**
- Clear, descriptive title
- Steps to reproduce the issue
- Expected vs actual behavior
- Screenshots (if applicable)
- Environment details:
  - PHP version
  - Laravel version
  - Browser and version
  - Operating system

**Example:**

```markdown
## Bug: Modal doesn't close on mobile devices

**Steps to Reproduce:**
1. Open modal on mobile device
2. Tap close button
3. Modal remains open

**Expected:** Modal closes
**Actual:** Modal stays visible

**Environment:**
- PHP 8.3.0
- Laravel 12.0
- Safari iOS 17.2
- iPhone 14 Pro
```

### Suggesting Enhancements

Enhancement suggestions are welcome! Include:
- Clear description of the feature
- Why this feature would be useful
- Examples of how it would work
- Mockups or wireframes (if applicable)

### Contributing Code

We welcome pull requests for:
- Bug fixes
- New components
- Documentation improvements
- Performance improvements
- New features

---

## Development Setup

### 1. Fork and Clone

```bash
# Fork the repository on GitHub
# Then clone your fork
git clone https://github.com/YOUR-USERNAME/compy.git
cd compy

# Add upstream remote
git remote add upstream https://github.com/ORIGINAL-OWNER/compy.git
```

### 2. Install Dependencies

```bash
# Run automated setup
composer setup

# Or manually:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

### 3. Create a Branch

```bash
# Update main branch
git checkout main
git pull upstream main

# Create feature branch
git checkout -b feature/your-feature-name
# or
git checkout -b fix/your-bug-fix
```

### 4. Make Changes

- Write clean, readable code
- Follow coding standards (see below)
- Add tests for new features
- Update documentation as needed

### 5. Test Your Changes

```bash
# Run tests
composer test

# Run code style checker
./vendor/bin/pint

# Test in browser
composer dev
```

---

## Coding Standards

### PHP Standards

Follow **PSR-12** coding standards:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

final class ExampleController extends Controller
{
    public function index(): View
    {
        $items = $this->getItems();
        
        return view('example.index', compact('items'));
    }
    
    private function getItems(): array
    {
        return [
            'item1',
            'item2',
        ];
    }
}
```

**Key Points:**
- Use **final classes** for controllers and models
- **Explicit return types** for all methods
- **Type declarations** for parameters
- **camelCase** for method names
- **snake_case** for database columns
- **PascalCase** for class names
- 4 spaces for indentation (no tabs)
- Opening braces on same line for methods and classes
- One blank line between methods

### Blade Standards

```blade
{{-- Good: Clean, readable Blade --}}
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold">{{ $title }}</h1>
    
    @if($items->isNotEmpty())
        <ul class="space-y-2">
            @foreach($items as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">No items found.</p>
    @endif
</div>

{{-- Use Blade components when appropriate --}}
<x-card.card>
    <x-slot name="header">
        {{ $title }}
    </x-slot>
    
    {{ $content }}
</x-card.card>
```

### JavaScript Standards

```javascript
// Use modern JavaScript (ES6+)
const handleClick = (event) => {
    event.preventDefault();
    console.log('Button clicked');
};

// Alpine.js component example
Alpine.data('dropdown', () => ({
    open: false,
    
    toggle() {
        this.open = !this.open;
    },
    
    close() {
        this.open = false;
    }
}));
```

### CSS/Tailwind Standards

```css
/* Prefer Tailwind utility classes */
/* Only use custom CSS when necessary */

/* Good: Utility classes in Blade */
<div class="flex items-center justify-between p-4 rounded-lg shadow-md">

/* Custom CSS only for complex cases */
.custom-animation {
    animation: slide-in 0.3s ease-out;
}

@keyframes slide-in {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}
```

### Code Style Checking

Run Pint before committing:

```bash
./vendor/bin/pint
```

---

## Pull Request Process

### 1. Update Your Branch

```bash
# Fetch latest changes
git fetch upstream
git rebase upstream/main
```

### 2. Commit Your Changes

Write clear, descriptive commit messages:

```bash
# Good commit messages
git commit -m "Add accordion component with animation"
git commit -m "Fix modal z-index issue on mobile devices"
git commit -m "Update installation documentation"

# Bad commit messages (avoid these)
git commit -m "fixes"
git commit -m "update"
git commit -m "changes"
```

**Commit Message Format:**

```
<type>: <subject>

<body>

<footer>
```

**Types:**
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

**Example:**

```
feat: Add chart component with multiple chart types

- Add line chart support
- Add bar chart support
- Add pie chart support
- Include Chart.js dependency
- Add component documentation
- Add demo page

Closes #123
```

### 3. Push to Your Fork

```bash
git push origin feature/your-feature-name
```

### 4. Create Pull Request

1. Go to your fork on GitHub
2. Click "Pull Request"
3. Select your branch
4. Fill in the PR template:

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Documentation update
- [ ] Code refactoring

## Testing
- [ ] Tests pass
- [ ] Tested in browser
- [ ] Tested on mobile

## Checklist
- [ ] Code follows style guidelines
- [ ] Self-review completed
- [ ] Comments added for complex code
- [ ] Documentation updated
- [ ] No new warnings
- [ ] Tests added/updated
- [ ] All tests pass
```

### 5. Code Review

- Respond to feedback promptly
- Make requested changes
- Push updates to same branch
- Request re-review when ready

### 6. Merge

Once approved:
- PR will be merged by maintainer
- Your branch can be deleted
- Changes will appear in next release

---

## Component Guidelines

### Creating New Components

**1. Component Structure:**

```
resources/views/components/
  └── your-component/
      ├── your-component.blade.php  (main component)
      ├── item.blade.php            (sub-component if needed)
      └── README.md                 (usage documentation)
```

**2. Component PHP Class (if needed):**

```php
<?php

namespace App\View\Components\YourComponent;

use Illuminate\View\Component;
use Illuminate\View\View;

final class YourComponent extends Component
{
    public function __construct(
        public string $title,
        public string $variant = 'default',
        public bool $dismissible = false
    ) {}
    
    public function render(): View
    {
        return view('components.your-component.your-component');
    }
}
```

**3. Component Blade Template:**

```blade
@props([
    'title' => '',
    'variant' => 'default',
    'dismissible' => false,
])

@php
$classes = match($variant) {
    'primary' => 'bg-blue-500 text-white',
    'secondary' => 'bg-gray-500 text-white',
    default => 'bg-white text-gray-900',
};
@endphp

<div {{ $attributes->merge(['class' => "rounded-lg p-4 $classes dark:bg-gray-800"]) }}>
    @if($title)
        <h3 class="text-lg font-semibold">{{ $title }}</h3>
    @endif
    
    <div class="mt-2">
        {{ $slot }}
    </div>
    
    @if($dismissible)
        <button type="button" class="absolute top-2 right-2">
            <svg><!-- close icon --></svg>
        </button>
    @endif
</div>
```

**4. Component Documentation:**

```markdown
# Your Component

Brief description of the component.

## Usage

\`\`\`blade
<x-your-component title="Example" variant="primary">
    Content goes here
</x-your-component>
\`\`\`

## Props

- `title` (string) - Component title
- `variant` (string) - Style variant: primary, secondary, default
- `dismissible` (bool) - Show close button

## Examples

### Basic Usage
...

### With Slots
...
```

**5. Add Demo Page:**

Create `resources/views/your-component/demo.blade.php` showing all variants and use cases.

**6. Dark Mode Support:**

All components must support dark mode:

```blade
<div class="bg-white text-gray-900 dark:bg-gray-800 dark:text-gray-100">
    <!-- content -->
</div>
```

---

## Testing Guidelines

### Writing Tests

```php
<?php

use App\Models\User;

it('displays the component correctly', function () {
    $user = User::factory()->create();
    
    $this->actingAs($user)
        ->get('/your-route')
        ->assertStatus(200)
        ->assertSee('Expected Text');
});

it('validates required fields', function () {
    $this->post('/your-route', [])
        ->assertSessionHasErrors(['field']);
});

it('creates a record successfully', function () {
    $data = ['field' => 'value'];
    
    $this->post('/your-route', $data)
        ->assertRedirect();
    
    $this->assertDatabaseHas('table', $data);
});
```

### Running Tests

```bash
# Run all tests
composer test

# Run specific test
./vendor/bin/pest tests/Feature/YourTest.php

# Run with coverage
./vendor/bin/pest --coverage
```

---

## Documentation Guidelines

### Update Documentation

When adding features, update:
- `README.md` - Add to feature list
- `CUSTOMIZATION.md` - Add customization instructions
- `CHANGELOG.md` - Add to unreleased section
- Component README - Create for new components

### Documentation Style

- Use clear, concise language
- Include code examples
- Add screenshots for UI components
- Link to related documentation
- Keep formatting consistent

---

## Questions?

- Open an issue for bugs
- Start a discussion for questions
- Read existing documentation
- Check Laravel documentation

---

## Recognition

Contributors will be recognized in:
- GitHub contributors list
- Release notes
- Documentation credits

Thank you for contributing! 🎉

