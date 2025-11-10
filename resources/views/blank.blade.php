<x-app-layout :spinner="true" :spinnerTime="1000">
    <x-slot name="title">Blank Page</x-slot>
    <x-slot name="metaDescription">A clean blank page template ready for your content. Use this page as a starting point for building new features.</x-slot>
    <x-slot name="metaKeywords">blank page, template, starter</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Blank Page', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Blank Page
    </x-slot>

    <x-slot name="pageSubtitle">
        A clean blank page template ready for your content
    </x-slot>

    <!-- Your content goes here -->
</x-app-layout>

