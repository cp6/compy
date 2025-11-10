<x-sidebar.sidebar>
    {{-- Brand/Logo Section --}}
    <div class="flex justify-center mb-6 px-2">
        <a href="{{ route('dashboard') }}" class="inline-block transition-transform hover:scale-105">
            <x-application-logo class="w-12 h-12 text-dodger-blue-600 dark:text-dodger-blue-400" />
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
        <x-sidebar.link href="#">
            <x-slot:icon>
                <x-sidebar.icon name="ai" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            AI chat
        </x-sidebar.link>

        {{-- Link with Badge (Alternative) --}}
        <x-sidebar.link href="#">
            <x-slot:icon>
                <x-sidebar.icon name="ecommerce" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            E-store
        </x-sidebar.link>

        {{-- Simple Link --}}
        <x-sidebar.link href="#">
            <x-slot:icon>
                <x-sidebar.icon name="calendar" />
            </x-slot:icon>
            Calendar
        </x-sidebar.link>

        {{-- Profile Link --}}
        <x-sidebar.link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.*')">
            <x-slot:icon>
                <x-sidebar.icon name="user" />
            </x-slot:icon>
            User Profile
        </x-sidebar.link>

        {{-- Dropdown Menu --}}
        <x-sidebar.dropdown 
            label="Task" 
            :active="request()->routeIs('task.*')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="task" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="#" :active="request()->routeIs('task.list')">
                Task List
            </x-sidebar.dropdown-item>
            <x-sidebar.dropdown-item href="#" :active="request()->routeIs('task.create')">
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
            :active="request()->routeIs('sidebar.demo') || request()->routeIs('blank') || request()->routeIs('sample') || request()->routeIs('grid.demo')"
        >
            <x-slot:icon>
                <x-sidebar.icon name="pages" />
            </x-slot:icon>
            <x-sidebar.dropdown-item href="{{ route('sidebar.demo') }}" :active="request()->routeIs('sidebar.demo')">
                Sidebar Demo
            </x-sidebar.dropdown-item>
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
        <x-sidebar.link href="#">
            <x-slot:icon>
                <x-sidebar.icon name="chat" />
            </x-slot:icon>
            Chat
        </x-sidebar.link>

        <x-sidebar.link href="#">
            <x-slot:icon>
                <x-sidebar.icon name="ticket" />
            </x-slot:icon>
            <x-slot:badge>
                <x-sidebar.badge>NEW</x-sidebar.badge>
            </x-slot:badge>
            Support Ticket
        </x-sidebar.link>

        <x-sidebar.link href="#">
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
        <x-sidebar.link href="#">
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

