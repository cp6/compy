@php
    // Demo chat messages
    $messages = [
        [
            'author' => 'AI Assistant',
            'content' => 'Hello! I\'m your AI assistant. How can I help you today?',
            'timestamp' => '10:30 AM',
            'isAi' => true,
            'suggestedResponses' => [
                'What is Laravel?',
                'Show me a code example',
                'How do I create a component?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'Hi! Can you explain what Laravel is?',
            'timestamp' => '10:31 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Laravel is a free, open-source PHP web framework created by Taylor Otwell. It follows the model-view-controller (MVC) architectural pattern and is designed for the development of web applications following best practices and conventions.

Key features of Laravel include:
• Elegant syntax and expressive code
• Built-in authentication and authorization
• Powerful ORM (Eloquent) for database interactions
• Artisan command-line tool for common tasks
• Robust routing system
• Blade templating engine
• Comprehensive testing support

Laravel makes development faster and more enjoyable by providing tools and features that handle common tasks, allowing developers to focus on building their applications.',
            'timestamp' => '10:31 AM',
            'isAi' => true,
            'suggestedResponses' => [
                'Show me a routing example',
                'How do I use Eloquent?',
                'What are Blade components?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'That\'s really helpful! Can you show me a code example of how to create a route?',
            'timestamp' => '10:32 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Absolutely! Here\'s how you can create routes in Laravel. Routes are typically defined in the `routes/web.php` file:',
            'timestamp' => '10:32 AM',
            'isAi' => true,
            'codeBlocks' => [
                [
                    'language' => 'php',
                    'code' => 'use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Basic route
Route::get(\'/users\', [UserController::class, \'index\']);

// Route with parameters
Route::get(\'/users/{id}\', [UserController::class, \'show\']);

// Named route
Route::get(\'/profile\', [UserController::class, \'profile\'])->name(\'profile\');

// Route group with middleware
Route::middleware([\'auth\'])->group(function () {
    Route::get(\'/dashboard\', [DashboardController::class, \'index\']);
});',
                ],
            ],
            'suggestedResponses' => [
                'How do I create a controller?',
                'Show me Eloquent examples',
                'What about API routes?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'Great! Now can you tell me about Blade components?',
            'timestamp' => '10:33 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Blade components are reusable pieces of UI that make your templates more modular and maintainable. They\'re similar to components in frameworks like React or Vue.

In Laravel, you can create Blade components using:
• Class-based components (PHP classes with views)
• Anonymous components (just Blade templates)

Components help you:
• Reuse UI elements across your application
• Keep your code DRY (Don\'t Repeat Yourself)
• Make templates easier to read and maintain
• Encapsulate complex UI logic

Here\'s an example of creating and using a simple button component:',
            'timestamp' => '10:33 AM',
            'isAi' => true,
            'codeBlocks' => [
                [
                    'language' => 'php',
                    'code' => '// resources/views/components/button.blade.php
@props([\'variant\' => \'primary\'])

<button {{ $attributes->merge([\'class\' => \'px-4 py-2 rounded \' . 
    ($variant === \'primary\' ? \'bg-blue-500\' : \'bg-gray-500\')]) }}>
    {{ $slot }}
</button>

// Usage in a view
<x-button variant="primary">Click Me</x-button>
<x-button variant="secondary">Cancel</x-button>',
                ],
            ],
            'suggestedResponses' => [
                'Show me class-based components',
                'How do I pass data to components?',
                'What about component slots?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'How do I use Eloquent to query the database?',
            'timestamp' => '10:35 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Eloquent is Laravel\'s ORM (Object-Relational Mapping) that makes database interactions elegant and intuitive. Here are some common Eloquent operations:',
            'timestamp' => '10:35 AM',
            'isAi' => true,
            'codeBlocks' => [
                [
                    'language' => 'php',
                    'code' => '// Retrieve all records
$users = User::all();

// Find by ID
$user = User::find(1);

// Find or fail (throws exception if not found)
$user = User::findOrFail(1);

// Query with conditions
$activeUsers = User::where(\'status\', \'active\')
    ->where(\'email_verified_at\', \'!= \', null)
    ->get();

// Create a new record
$user = User::create([
    \'name\' => \'John Doe\',
    \'email\' => \'john@example.com\',
    \'password\' => Hash::make(\'password\'),
]);

// Update a record
$user = User::find(1);
$user->update([\'name\' => \'Jane Doe\']);

// Delete a record
User::find(1)->delete();

// Relationships
$user = User::with(\'posts\')->find(1);
$posts = $user->posts;',
                ],
            ],
            'suggestedResponses' => [
                'How do I define relationships?',
                'Show me more query examples',
                'What about eager loading?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'Can you show me how to define relationships between models?',
            'timestamp' => '10:37 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Eloquent relationships make it easy to work with related data. Here are the most common relationship types:',
            'timestamp' => '10:37 AM',
            'isAi' => true,
            'codeBlocks' => [
                [
                    'language' => 'php',
                    'code' => '// One-to-Many: User has many Posts
class User extends Model
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

// Many-to-One: Post belongs to User
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// Many-to-Many: User has many Roles
class User extends Model
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}

// Has One Through
class Supplier extends Model
{
    public function userHistory()
    {
        return $this->hasOneThrough(History::class, User::class);
    }
}

// Usage
$user = User::find(1);
$posts = $user->posts; // Get all posts
$post = Post::find(1);
$author = $post->user; // Get the user who created the post',
                ],
            ],
            'suggestedResponses' => [
                'How do I use migrations?',
                'Show me validation examples',
                'What about form requests?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'This is really helpful! One more question - how do I handle form validation?',
            'timestamp' => '10:39 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Laravel provides powerful validation features. You can validate data in controllers or use Form Request classes for more complex validation. Here are examples:',
            'timestamp' => '10:39 AM',
            'isAi' => true,
            'codeBlocks' => [
                [
                    'language' => 'php',
                    'code' => '// In a controller
public function store(Request $request)
{
    $validated = $request->validate([
        \'name\' => \'required|string|max:255\',
        \'email\' => \'required|email|unique:users\',
        \'password\' => \'required|min:8|confirmed\',
        \'age\' => \'nullable|integer|min:18\',
    ]);
    
    // $validated contains only validated data
    User::create($validated);
}

// Using Form Request (recommended for complex validation)
// php artisan make:request StoreUserRequest

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            \'name\' => [\'required\', \'string\', \'max:255\'],
            \'email\' => [\'required\', \'email\', \'unique:users\'],
            \'password\' => [\'required\', \'min:8\', \'confirmed\'],
        ];
    }
    
    public function messages(): array
    {
        return [
            \'email.unique\' => \'This email is already registered.\',
        ];
    }
}',
                ],
            ],
            'suggestedResponses' => [
                'How do I create custom validation rules?',
                'Show me middleware examples',
                'What about API authentication?',
            ],
        ],
        [
            'author' => 'You',
            'content' => 'Perfect! Thanks for all the help. This has been very informative.',
            'timestamp' => '10:41 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'You\'re very welcome! I\'m glad I could help. Feel free to ask if you have any more questions about Laravel or web development. Happy coding! 🚀',
            'timestamp' => '10:41 AM',
            'isAi' => true,
            'suggestedResponses' => [
                'Tell me about Laravel queues',
                'How do I use caching?',
                'Show me testing examples',
            ],
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="title">AI Chat Demo</x-slot>
    <x-slot name="metaDescription">Interactive AI chat interface demo showcasing modern chat components with real-time messaging capabilities.</x-slot>
    <x-slot name="metaKeywords">ai chat, chat interface, messaging, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'AI Chat Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        AI Chat Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive chat interface with AI assistant
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Main Chat Interface --}}
        <x-card.card variant="gradient" class="overflow-hidden p-0">
            <x-chat.container :messages="$messages" height="h-[600px]">
                <x-chat.input placeholder="Ask me anything..." />
            </x-chat.container>
        </x-card.card>

        {{-- Features Section --}}
        <x-card.card variant="gradient" title="Chat Features">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Real-time Messaging</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Send and receive messages instantly with a smooth, responsive interface
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">AI-Powered</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Intelligent responses powered by advanced AI technology
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Dark Mode</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Full dark mode support for comfortable viewing in any lighting
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Fast & Responsive</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Optimized for speed and works seamlessly on all devices
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Customizable</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Easily customize colors, styles, and behavior to match your brand
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Secure</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Built with security best practices and data protection in mind
                    </p>
                </div>
            </div>
        </x-card.card>

        {{-- Component Usage --}}
        <x-card.card variant="gradient" title="Component Usage">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Chat Container with Messages --&gt;
&lt;x-chat.container :messages="$messages" height="h-[600px]"&gt;
    &lt;x-chat.input placeholder="Type your message..." /&gt;
&lt;/x-chat.container&gt;

&lt;!-- Individual Message --&gt;
&lt;x-chat.message
    author="AI Assistant"
    content="Hello! How can I help you?"
    timestamp="10:30 AM"
    :isAi="true"
/&gt;

&lt;x-chat.message
    author="You"
    content="Hi there!"
    timestamp="10:31 AM"
    :isAi="false"
/&gt;

&lt;!-- Typing Indicator --&gt;
&lt;x-chat.message
    author="AI Assistant"
    content=""
    :isAi="true"
    :isTyping="true"
/&gt;</code></pre>
            </div>
        </x-card.card>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-scroll to bottom when new messages arrive
            const container = document.querySelector('[x-ref="messagesContainer"]');
            if (container) {
                const observer = new MutationObserver(() => {
                    container.scrollTop = container.scrollHeight;
                });
                observer.observe(container, { childList: true, subtree: true });
            }
        });
    </script>
    @endpush
</x-app-layout>

