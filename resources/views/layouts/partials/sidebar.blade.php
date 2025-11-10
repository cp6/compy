<x-sidebar.sidebar>
    {{-- Brand/Logo Section --}}
    <div class="flex justify-center mb-8 px-2">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 shadow-lg shadow-dodger-blue-500/25 dark:shadow-dodger-blue-900/50 transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-dodger-blue-500/30 dark:hover:shadow-dodger-blue-900/60">
            <x-application-logo class="w-8 h-8 text-white" />
        </a>
    </div>

    {{-- Search Input --}}
    <x-sidebar.search />
    <x-sidebar.section title="MENU">
        {{-- Simple Link --}}
        <x-sidebar.link 
            href="{{ route('dashboard') }}" 
            :active="request()->routeIs('dashboard')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="dashboard" />
            </x-slot:icon>
            Dashboard
        </x-sidebar.link>

        {{-- Link with Badge --}}
        <x-sidebar.link href="{{ route('ai-chat.demo') }}" :active="request()->routeIs('ai-chat.*')">
            <x-slot:icon>
                <x-sidebar.icon name="ai" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            AI chat
        </x-sidebar.link>

        {{-- Link with Badge (Alternative) --}}
        <x-sidebar.link href="{{ route('estore.demo') }}" :active="request()->routeIs('estore.*')">
            <x-slot:icon>
                <x-sidebar.icon name="ecommerce" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            E-store
        </x-sidebar.link>

        {{-- Simple Link --}}
        <x-sidebar.link href="{{ route('calendar.demo') }}" :active="request()->routeIs('calendar.*')">
            <x-slot:icon>
                <x-sidebar.icon name="calendar" />
            </x-slot:icon>
            Calendar
        </x-sidebar.link>

        {{-- Profile Link --}}
        <x-sidebar.link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
            <x-slot:icon>
                <x-sidebar.icon name="user" />
            </x-slot:icon>
            User Profile
        </x-sidebar.link>

        {{-- Profile Demo Link --}}
        <x-sidebar.link href="{{ route('profile.demo') }}" :active="request()->routeIs('profile.demo')">
            <x-slot:icon>
                <x-sidebar.icon name="user" />
            </x-slot:icon>
            Profile Demo
        </x-sidebar.link>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Task" 
            :active="request()->routeIs('task.*')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="task" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('task.list') }}" :active="request()->routeIs('task.list')">
                Task List
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="{{ route('task.create') }}" :active="request()->routeIs('task.create')">
                Create Task
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Forms" 
            :active="request()->routeIs('forms.*')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="forms" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('forms.demo') }}" :active="request()->routeIs('forms.demo')">
                Form Demo
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Tables" 
            :active="request()->routeIs('tables.*')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="tables" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('tables.demo') }}" :active="request()->routeIs('tables.demo')">
                Table Demo
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Lists" 
            :active="request()->routeIs('lists.*')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="ui" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('lists.demo') }}" :active="request()->routeIs('lists.demo')">
                List Demo
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Pages" 
            :active="request()->routeIs('blank') || request()->routeIs('sample') || request()->routeIs('grid.demo')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="pages" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('grid.demo') }}" :active="request()->routeIs('grid.demo')">
                Grid Demo
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="{{ route('blank') }}" :active="request()->routeIs('blank')">
                Blank Page
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="{{ route('sample') }}" :active="request()->routeIs('sample')">
                Sample Page
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="{{ route('sample') }}/404">
                Error 404
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>
    </x-sidebar.section>

    {{-- Spacer --}}
    <x-sidebar.spacer size="md" />

    {{-- Support Section --}}
    <x-sidebar.section title="SUPPORT">
        <x-sidebar.link href="{{ route('chat.demo') }}" :active="request()->routeIs('chat.*')">
            <x-slot:icon>
                <x-sidebar.icon name="chat" />
            </x-slot:icon>
            Chat
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('support-ticket.demo') }}" :active="request()->routeIs('support-ticket.*')">
            <x-slot:icon>
                <x-sidebar.icon name="ticket" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            Support Ticket
        </x-sidebar.link>

        <x-sidebar.link href="{{ route('email.demo') }}" :active="request()->routeIs('email.*')">
            <x-slot:icon>
                <x-sidebar.icon name="email" />
            </x-slot:icon>
            Email
        </x-sidebar.link>
    </x-sidebar.section>

    {{-- Spacer --}}
    <x-sidebar.spacer size="md" />

    {{-- Others Section --}}
    <x-sidebar.section title="OTHERS">
        <x-sidebar.link href="{{ route('charts.demo') }}" :active="request()->routeIs('charts.*')">
            <x-slot:icon>
                <x-sidebar.icon name="charts" />
            </x-slot:icon>
            Charts
        </x-sidebar.link>

        <x-sidebar.dropdown label="UI Elements">
            <x-slot:icon>
                <x-sidebar.icon name="ui" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="#">
                Buttons
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="#">
                Cards
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="#">
                Modals
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>

        <x-sidebar.dropdown label="Authentication">
            <x-slot:icon>
                <x-sidebar.icon name="auth" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('login') }}">
                Login
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="{{ route('register') }}">
                Register
            </x-sidebar.dropdown-item>
        </x-sidebar.dropdown>
    </x-sidebar.section>
    
    {{-- Sidebar Footer with Theme Switcher --}}
    <x-slot:footer>
        <x-sidebar.footer />
    </x-slot:footer>
</x-sidebar>

