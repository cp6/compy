# Compy - Laravel 12 Admin Panel Starter Kit

<p align="center">
  <strong>A comprehensive Laravel 12 admin panel starter kit with 100+ pre-built components, authentication, and dark mode support.</strong>
</p>

<p align="center">
  <a href="#quick-start">Quick Start</a> •
  <a href="#features">Features</a> •
  <a href="#documentation">Documentation</a> •
  <a href="#component-library">Components</a> •
  <a href="#requirements">Requirements</a>
</p>

---

## Quick Start

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

### Building Assets

For production builds, use:
```bash
npm run build
```

This compiles and optimizes all CSS and JavaScript assets using Vite.

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

# Install Node dependencies
npm install

# Build assets for production
npm run build

# Start servers separately
php artisan serve    # Terminal 1
npm run dev          # Terminal 2
```

---

## Features

### Complete Authentication System
- User registration and login (Laravel Breeze)
- Password reset with email notifications
- Email verification
- Profile management (update info, change password, delete account)

### 100+ Pre-built Components
- **Landing Page**: Complete SaaS landing page with 10 reusable sections (navbar, hero, partners, benefits, how-it-works, pricing, testimonials, FAQ, CTA, footer)
- **Alerts & Notifications**: Success, error, warning, info alerts + toast notifications
- **Buttons**: Primary, secondary, danger variants with groups and dropdowns
- **Cards**: Image cards, profile cards, action cards, and dynamic card grids with API integration
- **Forms**: 30+ input types including autocomplete, tags, rich text, color picker
- **Tables**: Sortable, responsive tables with pagination and dynamic API-powered tables
- **Modals**: Customizable modal dialogs with headers and footers
- **File Manager**: Upload, browse, and manage files
- **Comments**: Nested comment system with replies
- **Chat**: Team chat interface with conversations, message bubbles, input area, and typing indicators
- **Email**: Email inbox interface with list view, detail view, and compose functionality
- **Support Tickets**: Complete ticket management system with status tracking, priorities, categories, and replies
- **E-store**: E-commerce product cards and grid layouts with ratings, badges, and pricing
- **Video Player**: Modern video player with custom controls, playlists, fullscreen support, and auto-hide controls
- **Navigation**: Sidebar, dropdowns, breadcrumbs
- **Timeline**: Event timeline display
- **Calendar**: Full calendar system with month, week, and day views with event management
- **Tabs & Accordions**: Content organization
- **Lists**: Various list styles with avatars, badges, and actions
- **Typography**: Comprehensive typography system with headings, paragraphs, lists, quotes, and text utilities
- **Spinners & Loaders**: Multiple spinner variants (default, gradient, pulse) with various sizes and loading text support
- **API Documentation**: Complete API documentation components for documenting REST endpoints (GET, POST, PATCH, DELETE) with request/response examples, parameter tables, and method badges

### Dark Mode Support
- Automatic system preference detection
- Manual toggle switch
- Persistent user preference
- Fully styled dark mode for all components

### Developer Experience
- **Laravel Pail**: Real-time log monitoring
- **Pest Testing**: Modern testing framework
- **Laravel Pint**: Automatic code styling
- **Vite**: Fast HMR (Hot Module Replacement)
- **Concurrently Scripts**: Run all dev services with one command
- **Email Preview**: Preview emails in browser (dev only)

### Responsive Design
- Mobile-first approach
- Responsive layouts for all screen sizes
- Touch-friendly navigation

### Production Ready
- Optimized asset building
- Database migrations
- Proper error pages (401, 403, 404, 419, 500, 503)
- Email templates
- Security best practices

---

## Documentation

Comprehensive guides to help you get started and customize your application:

- **[Installation Guide](INSTALLATION.md)** - Detailed setup instructions, deployment, troubleshooting
- **[Customization Guide](CUSTOMIZATION.md)** - Branding, colors, layouts, adding features
- **[Starter Kit Guide](STARTER_KIT_GUIDE.md)** - How to use this as a template for new projects
  - **[Component Library](#component-library)** - Full list of available components (below)

---

## Requirements

- **PHP**: 8.3 or higher
- **Composer**: Latest version
- **Node.js**: 18+ and npm
- **Database**: SQLite (default), MySQL, or PostgreSQL
- **Git**: For version control

---

## Component Library

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

#### Chat Components
- `chat/message.blade.php` - Individual chat message with user/AI styling, avatars, and typing indicators
- `chat/input.blade.php` - Chat input area with auto-resizing textarea and send button
- `chat/container.blade.php` - Chat container component that holds messages and input area

#### Email Components
- `email/item.blade.php` - Individual email item with sender, subject, preview, and status indicators
- `email/list.blade.php` - Email list container for displaying multiple emails
- `email/detail.blade.php` - Detailed email view with full content and attachments
- `email/compose.blade.php` - Email composition form with recipient, subject, and message fields

#### Ticket Components
- `ticket/status-badge.blade.php` - Ticket status badge (open, pending, resolved, closed, urgent)
- `ticket/priority-badge.blade.php` - Ticket priority badge (low, medium, high, urgent)
- `ticket/item.blade.php` - Individual ticket card component with status, priority, and metadata
- `ticket/list.blade.php` - Ticket list container for displaying multiple tickets
- `ticket/detail.blade.php` - Detailed ticket view with description and replies
- `ticket/form.blade.php` - Form component for creating new support tickets

#### Task Components
- `task/status-badge.blade.php` - Task status badge (todo, in_progress, review, done)
- `task/priority-badge.blade.php` - Task priority badge (low, medium, high, urgent)
- `task/item.blade.php` - Individual task card component with status, priority, progress, tags, assignee, and due date
- `task/list.blade.php` - Task list container for displaying multiple tasks

#### E-store Components
- `estore/product-card.blade.php` - Product card component with image, price, rating, badges, and hover effects
- `estore/product-grid.blade.php` - Product grid container with responsive column layouts

#### Video Components
- `video/player.blade.php` - Video player component with custom controls, progress bar, volume control, and fullscreen support
- `video/playlist.blade.php` - Video playlist component with thumbnail previews, duration badges, and active state indicators

#### Bitcoin Components
- `bitcoin/price-display.blade.php` - Bitcoin price display component with current price, 24h change, and percentage change
- `bitcoin/wallet-balance.blade.php` - Wallet balance component showing BTC balance, USD equivalent, and wallet address
- `bitcoin/transaction-item.blade.php` - Individual transaction item component with type (sent/received), amount, confirmations, and timestamp
- `bitcoin/transaction-list.blade.php` - Transaction list container for displaying multiple Bitcoin transactions

#### API Keys Components
- `api-keys/table.blade.php` - API keys management table with copy-to-clipboard, regenerate, enable/disable toggle, and action buttons

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

#### Text Viewer Components
- `text-viewer/viewer.blade.php` - Text file viewer component with line numbers, syntax highlighting, and copy functionality

#### API Documentation Components
- `api-doc/endpoint.blade.php` - Complete endpoint documentation component with method, path, parameters, request/response examples
- `api-doc/method-badge.blade.php` - HTTP method badge component (GET, POST, PATCH, DELETE) with color coding
- `api-doc/parameter-table.blade.php` - Parameters table component displaying parameter details
- `api-doc/request-example.blade.php` - Request example component with URL, headers, and body
- `api-doc/response-example.blade.php` - Response example component with status code and body

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

#### Pagination Components
- `pagination/text.blade.php` - Pagination with text-only Previous/Next buttons
- `pagination/text-icon.blade.php` - Pagination with text and icon buttons
- `pagination/icon.blade.php` - Pagination with icon-only Previous/Next buttons

#### Landing Page Components
- `landing/navbar.blade.php` - Sticky navigation bar with logo, menu links, theme switcher, and CTA button
- `landing/hero.blade.php` - Hero section with title, subtitle, social proof, CTAs, and product showcase
- `landing/partners.blade.php` - Partners/companies section displaying trusted brands
- `landing/benefits.blade.php` - Benefits/services section with icon cards highlighting key features
- `landing/how-it-works.blade.php` - Step-by-step process section with numbered cards
- `landing/pricing.blade.php` - Pricing plans section with multiple tiers and feature lists
- `landing/testimonials.blade.php` - Customer testimonials carousel with ratings and author info
- `landing/faq.blade.php` - Frequently asked questions section using accordion components
- `landing/cta-section.blade.php` - Call-to-action section with customizable title, subtitle, and CTA button
- `landing/footer.blade.php` - Footer with logo, menu links, legal links, newsletter signup, and social media icons

#### Chart Components
- `chart/chart.blade.php` - Chart component wrapper for Chart.js supporting line, bar, pie, doughnut, radar, polar area, scatter, and bubble charts with dark mode support

#### Utility Components
- `application-logo.blade.php` - Application logo
- `auth-session-status.blade.php` - Authentication session status
- `breadcrumb.blade.php` - Breadcrumb navigation
- `pagination.blade.php` - Pagination component (legacy)
- `spinner.blade.php` - Loading spinner
- `theme-switcher.blade.php` - Dark/light theme switcher
- `usage.blade.php` - Component usage documentation

### Demo Pages

Component demonstration pages located in `resources/views/`:

- `buttons/demo.blade.php` - Button components demo (Route: `/buttons/demo`)
- `cards/demo.blade.php` - Card components demo (Route: `/cards/demo`)
- `cards/dynamic-demo.blade.php` - Dynamic cards demo with async API loading, pagination, filtering, searching, and sorting powered by Mock Data API (Route: `/cards/dynamic`)
- `comments-demo.blade.php` - Nested comments system demo (Route: `/comments/demo`)
- `ai-chat-demo.blade.php` - AI chat interface demo with interactive messaging (Route: `/ai-chat/demo`)
- `chat-demo.blade.php` - Team chat interface demo with conversations and messaging (Route: `/chat/demo`)
- `email-demo.blade.php` - Email inbox demo with list view, detail view, and compose functionality (Route: `/email/demo`)
- `support-ticket-demo.blade.php` - Support ticket management system demo with status tracking, priorities, and replies (Route: `/support-ticket/demo`)
- `task-list-demo.blade.php` - Task list management demo with status tracking, priorities, progress bars, and filters (Route: `/task/list`)
- `task-create-demo.blade.php` - Task creation form demo with comprehensive task fields (Route: `/task/create`)
- `profile-demo.blade.php` - User profile demo showcasing various profile layouts, cards, and information displays (Route: `/profile/demo`)
- `estore-demo.blade.php` - E-commerce store demo with product cards, grids, ratings, and badges (Route: `/estore/demo`)
- `charts-demo.blade.php` - Interactive charts and data visualization demo with Chart.js (Route: `/charts/demo`)
- `tabs-demo.blade.php` - Tab navigation components demo (Route: `/tabs/demo`)
- `accordion-demo.blade.php` - Accordion components demo (Route: `/accordion/demo`)
- `toast-demo.blade.php` - Toast notification components demo (Route: `/toast/demo`)
- `timeline-demo.blade.php` - Timeline components demo (Route: `/timeline/demo`)
- `calendar-demo.blade.php` - Calendar components demo with month, week, and day views (Route: `/calendar/demo`)
- `files/demo.blade.php` - File components demo (Route: `/files/demo`)
- `text-viewer-demo.blade.php` - Text file viewer demo with line numbers, syntax highlighting, and copy functionality (Route: `/text-viewer/demo`)
- `api-doc-demo.blade.php` - API documentation demo showcasing GET, POST, PATCH, and DELETE endpoints with request/response examples (Route: `/api-doc/demo`)
- `forms/demo.blade.php` - Form components demo (Route: `/forms/demo`)
- `lists/demo.blade.php` - List components demo (Route: `/lists/demo`)
- `modals/demo.blade.php` - Modal components demo (Route: `/modals/demo`)
- `tables/demo.blade.php` - Table components demo (Route: `/tables/demo`)
- `tables/dynamic-demo.blade.php` - Dynamic table demo with async API loading, pagination, filtering, searching, and sorting powered by Mock Data API (Route: `/tables/dynamic`)
- `misc-demo.blade.php` - Miscellaneous components demo including spinners/loaders, badges, alerts, progress bars, and more (Route: `/misc/demo`)
- `typography-demo.blade.php` - Typography demo showcasing headings, paragraphs, lists, quotes, text utilities, and responsive typography (Route: `/typography/demo`)
- `video-player-demo.blade.php` - Video player demo with custom controls, playlists, and various player configurations (Route: `/video-player/demo`)
- `api-keys/demo.blade.php` - API keys management demo (Route: `/api-keys/demo`)
- `carbon-demo.blade.php` - Carbon date formatting demo showcasing 100+ date/time format strings (Route: `/carbon/demo`)
- `weather-demo.blade.php` - Weather demo with current conditions, hourly forecast, and 7-day outlook (Route: `/weather/demo`)
- `currency-exchange-demo.blade.php` - Currency exchange demo with converter, live rates, and popular pairs (Route: `/currency-exchange/demo`)
- `bitcoin-demo.blade.php` - Bitcoin demo with price tracking, wallet balance, transaction history, and price charts (Route: `/bitcoin/demo`)
- `premium-demo.blade.php` - Premium components demo (Route: `/premium-demo`)
- `usage-demo.blade.php` - Component usage examples (Route: `/usage-demo`)

### Main Pages

Core application pages:

- `welcome.blade.php` - High-converting SaaS landing page with all sections (Route: `/`)
  - Uses all landing page components: navbar, hero, partners, benefits, how-it-works, pricing, testimonials, FAQ, CTA, and footer
  - Fully responsive with dark mode support
  - Customizable through component props
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
- `GET /tables/dynamic` - Dynamic table with async API loading, pagination, filtering, searching, and sorting
- `GET /lists/demo` - Lists demo
- `GET /cards/demo` - Cards demo
- `GET /cards/dynamic` - Dynamic cards demo with async API loading, pagination, filtering, searching, and sorting
- `GET /buttons/demo` - Buttons demo
- `GET /comments/demo` - Comments demo (nested comment system)
- `GET /ai-chat/demo` - AI chat interface demo
- `GET /chat/demo` - Team chat interface demo
- `GET /email/demo` - Email inbox demo
- `GET /support-ticket/demo` - Support ticket management system demo
- `GET /task/list` - Task list management demo with status tracking, priorities, and progress bars
- `GET /task/create` - Task creation form demo with comprehensive task fields
- `GET /profile/demo` - User profile demo showcasing various profile layouts and components
- `GET /estore/demo` - E-store demo with product cards and grids
- `GET /tabs/demo` - Tabs demo
- `GET /accordion/demo` - Accordion demo
- `GET /toast/demo` - Toast notifications demo
- `GET /timeline/demo` - Timeline demo
- `GET /calendar/demo` - Calendar demo (month, week, day views with events)
- `GET /files/demo` - Files demo
- `GET /text-viewer/demo` - Text file viewer demo with line numbers, syntax highlighting, and copy functionality
- `GET /api-doc/demo` - API documentation demo showcasing GET, POST, PATCH, and DELETE endpoints with request/response examples
- `GET /modals/demo` - Modals demo
- `GET /misc/demo` - Miscellaneous demo
- `GET /typography/demo` - Typography demo
- `GET /video-player/demo` - Video player demo with custom controls and playlists
- `GET /carbon/demo` - Carbon date formatting demo with 100+ format examples
- `GET /weather/demo` - Weather demo with current conditions and forecasts
- `GET /currency-exchange/demo` - Currency exchange demo with converter and rates
- `GET /bitcoin/demo` - Bitcoin demo with price tracking, wallet balance, transaction history, and charts

### Development Routes (Local/Development only)
- `GET /email-preview` - Email preview index
- `GET /email-preview/verify-email` - Verify email preview
- `GET /email-preview/reset-password` - Reset password email preview

### API Routes
- `GET /api/mock-data` - Generate generic mock data with pagination, filtering, and search
- `GET /api/mock-data/{resource}` - Generate resource-specific mock data (users, products, orders, posts, tasks)

#### Mock Data API Usage

The Mock Data API provides endpoints for generating fake data to use in tables for testing pagination, filtering, and search functionality.

**Base Endpoint:**
```
GET /api/mock-data
```

**Resource-Specific Endpoints:**
```
GET /api/mock-data/users
GET /api/mock-data/products
GET /api/mock-data/orders
GET /api/mock-data/posts
GET /api/mock-data/tasks
```

**Query Parameters:**

- `page` - Page number (default: 1)
- `per_page` - Items per page (default: 15, max: 100)
- `search` - Search across searchable fields (name, email, phone, company, job_title, address, city, state, country, department)
- `sort_by` - Field to sort by (default: id)
- `sort_dir` - Sort direction: `asc` or `desc` (default: asc)
- `total_items` - Total items to generate (default: 1000 for generic, 500 for resources)
- Any field name - Filter by that field (e.g., `status=active`, `department[]=IT&department[]=Sales`)
- `{field}_min` / `{field}_max` - Range filters (e.g., `salary_min=50000&salary_max=100000`)

**Example Requests:**

```bash
# Get paginated mock data
GET /api/mock-data?page=1&per_page=20

# Search for specific term
GET /api/mock-data?search=john

# Filter by status
GET /api/mock-data?status=active

# Filter by multiple values
GET /api/mock-data?status[]=active&status[]=pending

# Sort by name descending
GET /api/mock-data?sort_by=name&sort_dir=desc

# Get users resource with filters
GET /api/mock-data/users?status=active&role=admin&page=1&per_page=10

# Range filter
GET /api/mock-data/products?price_min=50&price_max=200
```

**Response Format:**

The API returns Laravel-style paginated responses:

```json
{
  "data": [...],
  "meta": {
    "current_page": 1,
    "per_page": 15,
    "total": 1000,
    "last_page": 67,
    "from": 1,
    "to": 15
  },
  "links": {
    "first": "...",
    "last": "...",
    "prev": null,
    "next": "..."
  }
}
```

**Available Resources:**

- **users** - User data with name, email, username, avatar, role, status, last_login
- **products** - Product data with name, description, SKU, price, stock, category, brand, rating
- **orders** - Order data with order_number, customer info, totals, status, payment info
- **posts** - Post data with title, content, author, category, tags, views, likes
- **tasks** - Task data with title, description, assignee, status, priority, progress, due_date

## Technical Stack

- **Framework**: Laravel 12.0+
- **PHP**: 8.3+
- **Frontend**: Tailwind CSS
- **Features**: Dark mode support, Component-based architecture

---

## Architecture & Best Practices

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

## Usage

### Accessing Demo Pages

After logging in, you can access component demos from the sidebar:

- **Forms Demo**: `/forms/demo` - All form components with examples
- **Tables Demo**: `/tables/demo` - Data table examples
- **Dynamic Table Demo**: `/tables/dynamic` - Fully interactive table with async API loading, pagination, filtering, searching, and sorting
- **Buttons Demo**: `/buttons/demo` - Button variants and styles
- **Cards Demo**: `/cards/demo` - Card component examples
- **Dynamic Cards Demo**: `/cards/dynamic` - Fully interactive card grid with async API loading, pagination, filtering, searching, and sorting
- **Files Demo**: `/files/demo` - File components demo
- **Text Viewer Demo**: `/text-viewer/demo` - Text file viewer with line numbers, syntax highlighting, and copy functionality
- **API Documentation Demo**: `/api-doc/demo` - API documentation demo showcasing GET, POST, PATCH, and DELETE endpoints with request/response examples, parameter tables, and method badges
- **Modals Demo**: `/modals/demo` - Modal dialog examples
- **Calendar Demo**: `/calendar/demo` - Calendar system with month, week, and day views
- **AI Chat Demo**: `/ai-chat/demo` - Interactive AI chat interface with message bubbles and input
- **Chat Demo**: `/chat/demo` - Team chat interface with conversations, messaging, and notifications
- **Email Demo**: `/email/demo` - Email inbox with list view, detail view, compose, and attachments
- **Support Ticket Demo**: `/support-ticket/demo` - Complete ticket management system with status tracking, priorities, categories, and replies
- **Task List Demo**: `/task/list` - Task list management with status tracking, priorities, progress bars, filters, and statistics
- **Create Task Demo**: `/task/create` - Comprehensive task creation form with all task fields
- **Profile Demo**: `/profile/demo` - User profile demo showcasing various profile layouts, cards, stats, social links, and information displays
- **E-store Demo**: `/estore/demo` - E-commerce store with product cards, grids, ratings, badges, and pricing
- **Charts Demo**: `/charts/demo` - Interactive charts and data visualization with Chart.js including line, bar, pie, doughnut, radar, polar area, scatter, and bubble charts
- **Video Player Demo**: `/video-player/demo` - Modern video player with custom controls, playlists, fullscreen support, and auto-hide controls
- **Misc Demo**: `/misc/demo` - Spinners/loaders, badges, alerts, progress bars, status indicators, and more
- **Typography Demo**: `/typography/demo` - Typography showcase with headings, paragraphs, lists, quotes, text utilities, and responsive typography
- **Carbon Demo**: `/carbon/demo` - PHP Carbon date formatting demo showcasing 100+ different date/time format strings
- **Weather Demo**: `/weather/demo` - Weather dashboard with current conditions, hourly forecast, and 7-day outlook
- **Currency Exchange Demo**: `/currency-exchange/demo` - Currency converter with live exchange rates and popular currency pairs
- **Bitcoin Demo**: `/bitcoin/demo` - Bitcoin dashboard with real-time price tracking, wallet balance, transaction history, price charts, and market statistics
- **Product CRUD Demo**: `/products` - Complete CRUD (Create, Read, Update, Delete) example with Product model, form validation, and blade components
- And many more...

### Product CRUD Demo

A complete CRUD (Create, Read, Update, Delete) implementation demonstrating Laravel best practices:

**Features:**
- **Model**: `Product` model with UUID (GUID) generation, proper casts, and fillable attributes
- **Migration**: Database migration with all required fields including `guid`, `name`, `description`, `sku`, `price`, `stock_quantity`, `sold_amount`, `status`, and `image_url`
- **Form Requests**: `StoreProductRequest` and `UpdateProductRequest` with comprehensive validation rules
- **Controller**: `ProductController` following Laravel best practices with type hints, final class, and proper return types
- **Views**: Complete set of views using blade components:
  - `index.blade.php` - Product listing with table component, pagination, and action buttons
  - `show.blade.php` - Product detail view with card components
  - `create.blade.php` - Product creation form using form components
  - `edit.blade.php` - Product editing form using form components

**Routes:**
- `GET /products` - List all products
- `GET /products/create` - Show create form
- `POST /products` - Store new product
- `GET /products/{product}` - Show product details
- `GET /products/{product}/edit` - Show edit form
- `PUT /products/{product}` - Update product
- `DELETE /products/{product}` - Delete product

**Database Schema:**
```php
- id (bigint, primary key)
- guid (uuid, unique, indexed)
- name (string, required)
- description (text, nullable)
- sku (string, unique, indexed)
- price (decimal 10,2, required)
- stock_quantity (integer, default 0)
- sold_amount (decimal 10,2, default 0)
- status (enum: 'active'|'inactive', default 'active', indexed)
- image_url (string, nullable)
- timestamps
```

**Usage:**
1. Run migrations: `php artisan migrate`
2. Access `/products` after logging in
3. Create, view, edit, and delete products using the interface

This serves as a reference implementation for building CRUD functionality in Laravel applications.

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

{{-- Profile Card --}}
<x-card.profile
    name="John Doe"
    role="Senior Developer"
    bio="Passionate developer with 8+ years of experience..."
    avatarText="JD"
    variant="gradient"
    :showStats="true"
    :stats="[['label' => 'Projects', 'value' => '42']]"
    :showSocial="true"
    :socialLinks="[...]"
/>

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

{{-- Pagination Components --}}
{{-- Pagination with Text --}}
<div x-data="{ currentPage: 1, lastPage: 10 }">
    <x-pagination.text 
        :currentPage="currentPage" 
        :lastPage="lastPage"
        onPrevious="currentPage--"
        onNext="currentPage++"
        onPage="(page) => currentPage = page"
    />
</div>

{{-- Pagination with Text and Icon --}}
<div x-data="{ currentPage: 1, lastPage: 10 }">
    <x-pagination.text-icon 
        :currentPage="currentPage" 
        :lastPage="lastPage"
        onPrevious="currentPage--"
        onNext="currentPage++"
        onPage="(page) => currentPage = page"
    />
</div>

{{-- Pagination with Icon --}}
<div x-data="{ currentPage: 1, lastPage: 10 }">
    <x-pagination.icon 
        :currentPage="currentPage" 
        :lastPage="lastPage"
        onPrevious="currentPage--"
        onNext="currentPage++"
        onPage="(page) => currentPage = page"
    />
</div>

{{-- Chat Components --}}
<x-chat.container :messages="$messages" height="h-[600px]">
    <x-chat.input placeholder="Type your message..." />
</x-chat.container>

<x-chat.message
    author="AI Assistant"
    content="Hello! How can I help you?"
    timestamp="10:30 AM"
    :isAi="true"
/>

{{-- Calendar Components --}}
{{-- Month View --}}
<x-calendar.month-view :events="$events" />

{{-- Week View --}}
<x-calendar.week-view :events="$events" />

{{-- Day View --}}
<x-calendar.day-view :events="$events" />

{{-- Event Item --}}
<x-calendar.event-item 
    :event="['title' => 'Meeting', 'time' => '10:00 AM', 'color' => 'dodger-blue']"
    size="default"
/>

{{-- Ticket Components --}}
{{-- Ticket List --}}
<x-ticket.list :tickets="$tickets" />

{{-- Individual Ticket Item --}}
<x-ticket.item
    id="1001"
    title="Ticket Title"
    description="Ticket description..."
    status="open"
    priority="high"
    category="Technical Support"
    author="John Doe"
    createdAt="2 hours ago"
    href="#"
/>

{{-- Ticket Detail View --}}
<x-ticket.detail
    :id="$ticket['id']"
    :title="$ticket['title']"
    :description="$ticket['description']"
    :status="$ticket['status']"
    :priority="$ticket['priority']"
    :category="$ticket['category']"
    :author="$ticket['author']"
    :createdAt="$ticket['createdAt']"
    :replies="$ticket['replies']"
/>

{{-- Status and Priority Badges --}}
<x-ticket.status-badge status="open" />
<x-ticket.priority-badge priority="high" />

{{-- Task Components --}}
{{-- Task List --}}
<x-task.list :tasks="$tasks" />

{{-- Individual Task Item --}}
<x-task.item
    id="1001"
    title="Task Title"
    description="Task description..."
    status="in_progress"
    priority="high"
    category="Development"
    assignee="John Doe"
    dueDate="2024-12-20"
    :tags="['backend', 'feature']"
    progress="65"
    href="#"
/>

{{-- Status and Priority Badges --}}
<x-task.status-badge status="in_progress" />
<x-task.priority-badge priority="high" />

{{-- Create Ticket Form --}}
<x-ticket.form action="#" method="POST" />

{{-- Email Components --}}
{{-- Email List --}}
<x-email.list :emails="$emails" />

{{-- Individual Email Item --}}
<x-email.item
    id="1"
    from="John Doe"
    subject="Email Subject"
    preview="Email preview text..."
    timestamp="2 hours ago"
    :unread="true"
    :important="false"
    :attachments="true"
    href="#"
/>

{{-- Email Detail View --}}
<x-email.detail
    :id="$email['id']"
    :from="$email['from']"
    :to="$email['to']"
    :subject="$email['subject']"
    :content="$email['content']"
    :timestamp="$email['timestamp']"
    :important="$email['important']"
    :attachments="$email['attachments']"
/>

{{-- Compose Email Form --}}
<x-email.compose action="#" method="POST" />

{{-- E-store Components --}}
{{-- Product Card --}}
<x-estore.product-card
    id="1"
    name="Product Name"
    :price="99.99"
    :originalPrice="129.99"
    badge="sale"
    :rating="4.5"
    :reviews="234"
    href="/products/1"
    variant="gradient"
    hover
/>

{{-- Product Grid --}}
<x-estore.product-grid 
    :products="$products" 
    :columns="4"
/>

{{-- Video Components --}}
{{-- Basic Video Player --}}
<x-video.player 
    src="https://example.com/video.mp4"
    poster="https://example.com/poster.jpg"
    :controls="true"
    preload="metadata"
/>

{{-- Video Player with Autoplay --}}
<x-video.player 
    src="https://example.com/video.mp4"
    :autoplay="true"
    :muted="true"
    :controls="true"
    preload="auto"
/>

{{-- Video Player with Playlist --}}
<div x-data="{ currentVideo: {...}, videos: [...] }">
    <x-video.player 
        :src="currentVideo.src"
        :poster="currentVideo.poster"
        :controls="true"
    />
    
    <x-video.playlist 
        :videos="$videos"
        :currentIndex="0"
    />
</div>

{{-- Bitcoin Components --}}
{{-- Price Display --}}
<x-bitcoin.price-display
    :price="43250.75"
    :change="1250.50"
    :changePercent="2.98"
    currency="USD"
    size="large"
/>

{{-- Wallet Balance --}}
<x-bitcoin.wallet-balance
    :balance="0.05234123"
    :balanceUsd="2264.50"
    address="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh"
    :showAddress="true"
/>

{{-- Transaction List --}}
<x-bitcoin.transaction-list :transactions="$transactions" />

{{-- Individual Transaction Item --}}
<x-bitcoin.transaction-item
    hash="a1b2c3d4e5f6789012345678901234567890abcdef1234567890abcdef123456"
    type="received"
    :amount="0.00123456"
    :amountUsd="53.42"
    :fee="0"
    :confirmations="12"
    :timestamp="now()"
    address="bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh"
/>

{{-- Landing Page Components --}}
{{-- Navbar --}}
<x-landing.navbar />

{{-- Hero Section --}}
<x-landing.hero 
    title="Your Amazing Product"
    subtitle="Transform your business with our powerful platform"
    socialProof="1000+ active users"
/>

{{-- Benefits Section --}}
<x-landing.benefits :benefits="[
    ['title' => 'Feature 1', 'description' => 'Description here', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
    ['title' => 'Feature 2', 'description' => 'Description here', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
]" />

{{-- CTA Section --}}
<x-landing.cta-section 
    title="Ready to Get Started?"
    subtitle="Join thousands of teams already using our platform"
    ctaText="Start Your Free Trial"
/>

{{-- API Documentation Components --}}
{{-- Complete Endpoint Documentation --}}
<x-api-doc.endpoint
    method="GET"
    path="/api/products"
    title="Get All Products"
    description="Retrieve a paginated list of all products"
    :parameters="[
        ['name' => 'page', 'type' => 'integer', 'required' => false, 'description' => 'Page number'],
        ['name' => 'per_page', 'type' => 'integer', 'required' => false, 'description' => 'Items per page'],
    ]"
    :requestExample="['url' => '/api/products', 'queryParams' => ['page' => 1]]"
    :responseExample="['data' => [...], 'meta' => [...]]"
    authentication="Bearer token required"
/>

{{-- Method Badge --}}
<x-api-doc.method-badge method="POST" />

{{-- Parameter Table --}}
<x-api-doc.parameter-table :parameters="$parameters" />

{{-- Request Example --}}
<x-api-doc.request-example
    method="POST"
    url="/api/products"
    :headers="['Authorization' => 'Bearer token']"
    :body="['name' => 'Product Name']"
/>

{{-- Response Example --}}
<x-api-doc.response-example
    :statusCode="201"
    :body="['data' => [...], 'message' => 'Success']"
/>
```

---

## Testing

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

## Customization Quick Tips

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

## Deployment

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

## Creating Your First Feature

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

## Contributing

Contributions are welcome! If you find a bug or have a feature request, please open an issue.

---

## License

This starter kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Acknowledgments

Built with:
- [Laravel 12](https://laravel.com) - The PHP Framework for Web Artisans
- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Your new lightweight JavaScript framework
- [Laravel Breeze](https://laravel.com/docs/12.x/starter-kits#breeze) - Minimal, simple authentication scaffolding

---

## Support

- **Documentation**: See guides in this repository
- **Laravel Docs**: https://laravel.com/docs/12.x
- **Issues**: Open an issue on GitHub
- **Discussions**: Use GitHub Discussions for questions

---

<p align="center">Made with love for the Laravel community</p>
