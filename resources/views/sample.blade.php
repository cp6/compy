<x-app-layout :spinner="true" :spinnerTime="1000">
    <x-slot name="title">Sample Page</x-slot>
    <x-slot name="metaDescription">A sample page with a full-width card component featuring title and subtitle.</x-slot>
    <x-slot name="metaKeywords">sample page, card, template</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Sample Page', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Sample Page
    </x-slot>

    <x-slot name="pageSubtitle">
        A sample page with a full-width card component
    </x-slot>

    <!-- Full-width card component with title and subtitle -->
    <x-card.card 
        title="Sample Card Title" 
        subtitle="This is a sample subtitle for the card component"
        class="w-full"
    >
        <form method="POST" action="#" class="space-y-6">
            @csrf

            <x-form.group>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-form.input 
                        name="first_name" 
                        label="First Name" 
                        type="text"
                        placeholder="Enter your first name"
                        required
                    />

                    <x-form.input 
                        name="last_name" 
                        label="Last Name" 
                        type="text"
                        placeholder="Enter your last name"
                        required
                    />
                </div>

                <x-form.input 
                    name="email" 
                    label="Email Address" 
                    type="email"
                    placeholder="you@example.com"
                    help="We'll never share your email with anyone else"
                    required
                />

                <x-form.select 
                    name="country" 
                    label="Country"
                    :options="[
                        'us' => 'United States',
                        'ca' => 'Canada',
                        'uk' => 'United Kingdom',
                        'au' => 'Australia',
                        'de' => 'Germany',
                        'fr' => 'France',
                    ]"
                    placeholder="Select your country"
                    required
                />

                <x-form.textarea 
                    name="message" 
                    label="Message" 
                    rows="4"
                    placeholder="Enter your message here..."
                    help="Please provide any additional information"
                />

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-4">
                    <x-button.secondary type="button" variant="outline" class="w-full sm:w-auto">
                        Cancel
                    </x-button.secondary>
                    <x-button.primary type="submit" variant="gradient" class="w-full sm:w-auto">
                        Submit
                    </x-button.primary>
                </div>
            </x-form.group>
        </form>
    </x-card.card>
</x-app-layout>

