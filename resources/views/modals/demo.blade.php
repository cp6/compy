<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Modals', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Modal Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive showcase of all available modal components, sizes, and variations
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-8">
                <!-- Basic Modal -->
                <x-card.card variant="gradient" title="Basic Modal">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Simple modal with header, body, and footer sections. Click the button to open it.
                    </p>
                    
                    <x-button.button 
                        variant="primary"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'basic-modal')"
                    >
                        Open Basic Modal
                    </x-button>

                    <x-modal.modal name="basic-modal">
                        <x-modal.header title="Basic Modal" modalName="basic-modal" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                This is a basic modal example. You can add any content here. The modal includes a header with a close button, a body for your content, and a footer for actions.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'basic-modal')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'basic-modal')">
                                Confirm
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal Sizes -->
                <x-card.card variant="gradient" title="Modal Sizes">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Modals come in different sizes to accommodate various content types. Choose the size that best fits your content.
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'modal-sm')"
                        >
                            Small Modal
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'modal-md')"
                        >
                            Medium Modal
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'modal-lg')"
                        >
                            Large Modal
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'modal-xl')"
                        >
                            Extra Large Modal
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'modal-2xl')"
                        >
                            2XL Modal
                        </x-button>
                    </div>

                    <x-modal.modal name="modal-sm" maxWidth="sm">
                        <x-modal.header title="Small Modal" modalName="modal-sm" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                This is a small modal, perfect for simple confirmations or short messages.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="primary" size="sm" x-data="" x-on:click="$dispatch('close-modal', 'modal-sm')">
                                OK
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="modal-md" maxWidth="md">
                        <x-modal.header title="Medium Modal" modalName="modal-md" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                This is a medium-sized modal, ideal for forms or content that needs a bit more space.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'modal-md')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'modal-md')">
                                Save
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="modal-lg" maxWidth="lg">
                        <x-modal.header title="Large Modal" modalName="modal-lg" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                This is a large modal, great for detailed forms or content that requires more room.
                            </p>
                            <div class="space-y-3">
                                <div class="p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        You can add multiple sections, forms, or any other content here.
                                    </p>
                                </div>
                            </div>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'modal-lg')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'modal-lg')">
                                Continue
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="modal-xl" maxWidth="xl">
                        <x-modal.header title="Extra Large Modal" modalName="modal-xl" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                This is an extra large modal, perfect for complex forms or detailed content.
                            </p>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Section 1</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Content area 1</p>
                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Section 2</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Content area 2</p>
                                </div>
                            </div>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'modal-xl')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'modal-xl')">
                                Submit
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="modal-2xl" maxWidth="2xl">
                        <x-modal.header title="2XL Modal" modalName="modal-2xl" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                This is the largest modal size, ideal for extensive content, data tables, or complex interfaces.
                            </p>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Column 1</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Wide content area</p>
                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Column 2</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Wide content area</p>
                                </div>
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Column 3</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Wide content area</p>
                                </div>
                            </div>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'modal-2xl')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'modal-2xl')">
                                Save Changes
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal with Form -->
                <x-card.card variant="gradient" title="Modal with Form">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Modals are perfect for forms. Here's an example of a user registration form in a modal.
                    </p>
                    
                    <x-button.button 
                        variant="primary"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'form-modal')"
                    >
                        Open Form Modal
                    </x-button>

                    <x-modal.modal name="form-modal" maxWidth="lg">
                        <x-modal.header title="Create New User" subtitle="Fill in the details below to create a new user account" modalName="form-modal" />
                        <x-modal.body>
                            <form class="space-y-4">
                                <div>
                                    <x-form.label for="name" value="Full Name" />
                                    <x-form.input name="name" id="name" type="text" class="mt-1 block w-full" placeholder="John Doe" />
                                </div>
                                <div>
                                    <x-form.label for="email" value="Email Address" />
                                    <x-form.input name="email" id="email" type="email" class="mt-1 block w-full" placeholder="john@example.com" />
                                </div>
                                <div>
                                    <x-form.label for="role" value="Role" />
                                    <x-form.select name="role" id="role" class="mt-1 block w-full">
                                        <option value="">Select a role</option>
                                        <option value="admin">Administrator</option>
                                        <option value="user">User</option>
                                        <option value="editor">Editor</option>
                                    </x-form.select>
                                </div>
                                <div>
                                    <x-form.checkbox name="terms" id="terms" label="I agree to the terms and conditions" />
                                </div>
                            </form>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'form-modal')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'form-modal')">
                                Create User
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Confirmation Modal -->
                <x-card.card variant="gradient" title="Confirmation Modal">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Use modals to confirm destructive actions or important decisions. This example shows a delete confirmation.
                    </p>
                    
                    <x-button.button 
                        variant="danger"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'confirm-modal')"
                    >
                        Delete Item
                    </x-button>

                    <x-modal.modal name="confirm-modal" maxWidth="sm">
                        <x-modal.header title="Confirm Deletion" modalName="confirm-modal" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                Are you sure you want to delete this item? This action cannot be undone.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'confirm-modal')">
                                Cancel
                            </x-button>
                            <x-button.button variant="danger" x-data="" x-on:click="$dispatch('close-modal', 'confirm-modal')">
                                Delete
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal with Custom Header -->
                <x-card.card variant="gradient" title="Modal with Custom Header">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Customize the modal header with icons, badges, or custom content.
                    </p>
                    
                    <x-button.button 
                        variant="primary"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'custom-header-modal')"
                    >
                        Open Custom Header Modal
                    </x-button>

                    <x-modal.modal name="custom-header-modal" maxWidth="lg">
                        <x-modal.header modalName="custom-header-modal">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        Custom Header
                                    </h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        With icon and subtitle
                                    </p>
                                </div>
                            </div>
                        </x-modal.header>
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                This modal has a custom header with an icon and additional styling. You can customize the header content however you like.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'custom-header-modal')">
                                Got it
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal Footer Alignments -->
                <x-card.card variant="gradient" title="Modal Footer Alignments">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Control the alignment of footer buttons. Options include left, right, center, and space-between.
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'footer-left')"
                        >
                            Left Aligned
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'footer-center')"
                        >
                            Center Aligned
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'footer-right')"
                        >
                            Right Aligned
                        </x-button>
                        <x-button.button 
                            variant="primary"
                            x-data=""
                            x-on:click="$dispatch('open-modal', 'footer-between')"
                        >
                            Space Between
                        </x-button>
                    </div>

                    <x-modal.modal name="footer-left" maxWidth="md">
                        <x-modal.header title="Left Aligned Footer" modalName="footer-left" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                Footer buttons are aligned to the left.
                            </p>
                        </x-modal.body>
                        <x-modal.footer align="left">
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'footer-left')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'footer-left')">
                                Save
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="footer-center" maxWidth="md">
                        <x-modal.header title="Center Aligned Footer" modalName="footer-center" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                Footer buttons are centered.
                            </p>
                        </x-modal.body>
                        <x-modal.footer align="center">
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'footer-center')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'footer-center')">
                                Save
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="footer-right" maxWidth="md">
                        <x-modal.header title="Right Aligned Footer" modalName="footer-right" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                Footer buttons are aligned to the right (default).
                            </p>
                        </x-modal.body>
                        <x-modal.footer align="right">
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'footer-right')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'footer-right')">
                                Save
                            </x-button>
                        </x-modal.footer>
                    </x-modal>

                    <x-modal.modal name="footer-between" maxWidth="md">
                        <x-modal.header title="Space Between Footer" modalName="footer-between" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                Footer buttons are spaced between, useful for secondary actions on the left and primary actions on the right.
                            </p>
                        </x-modal.body>
                        <x-modal.footer align="between">
                            <x-button.button variant="ghost" x-data="" x-on:click="$dispatch('close-modal', 'footer-between')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete
                            </x-button>
                            <div class="flex gap-3">
                                <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'footer-between')">
                                    Cancel
                                </x-button>
                                <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'footer-between')">
                                    Save
                                </x-button>
                            </div>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal Without Close Button -->
                <x-card.card variant="gradient" title="Modal Without Close Button">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Sometimes you want to prevent users from closing the modal by clicking the X button, forcing them to make a choice.
                    </p>
                    
                    <x-button.button 
                        variant="primary"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'no-close-modal')"
                    >
                        Open Modal (No Close Button)
                    </x-button>

                    <x-modal.modal name="no-close-modal" maxWidth="sm">
                        <x-modal.header title="Important Notice" modalName="no-close-modal" :closeButton="false" />
                        <x-modal.body>
                            <p class="text-gray-600 dark:text-gray-400">
                                This modal cannot be closed using the X button. Users must choose one of the action buttons below.
                            </p>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'no-close-modal')">
                                Decline
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'no-close-modal')">
                                Accept
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Modal with Scrollable Content -->
                <x-card.card variant="gradient" title="Modal with Scrollable Content">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Modals automatically handle scrolling when content exceeds the viewport height.
                    </p>
                    
                    <x-button.button 
                        variant="primary"
                        x-data=""
                        x-on:click="$dispatch('open-modal', 'scrollable-modal')"
                    >
                        Open Scrollable Modal
                    </x-button>

                    <x-modal.modal name="scrollable-modal" maxWidth="lg">
                        <x-modal.header title="Long Content Modal" modalName="scrollable-modal" />
                        <x-modal.body>
                            <div class="space-y-4">
                                <p class="text-gray-600 dark:text-gray-400">
                                    This modal contains a lot of content to demonstrate scrolling behavior. Scroll down to see more content.
                                </p>
                                @for($i = 1; $i <= 20; $i++)
                                    <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                            Section {{ $i }}
                                        </h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            This is section {{ $i }} of the scrollable content. The modal will automatically handle scrolling when content exceeds the viewport height.
                                        </p>
                                    </div>
                                @endfor
                            </div>
                        </x-modal.body>
                        <x-modal.footer>
                            <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'scrollable-modal')">
                                Cancel
                            </x-button>
                            <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'scrollable-modal')">
                                Save
                            </x-button>
                        </x-modal.footer>
                    </x-modal>
                </x-card>

                <!-- Real World Examples -->
                <x-card.card variant="gradient" title="Real World Examples">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Common modal patterns used in real applications.
                    </p>
                    
                    <div class="space-y-4">
                        <!-- User Profile Modal -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">User Profile Modal</h4>
                            <x-button.button 
                                variant="outline"
                                x-data=""
                                x-on:click="$dispatch('open-modal', 'profile-modal')"
                            >
                                View Profile
                            </x-button>

                            <x-modal.modal name="profile-modal" maxWidth="lg">
                                <x-modal.header title="User Profile" modalName="profile-modal" />
                                <x-modal.body>
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-20 h-20 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                                <span class="text-2xl font-semibold text-dodger-blue-600 dark:text-dodger-blue-400">JD</span>
                                            </div>
                                        </div>
                                        <div class="flex-1 space-y-4">
                                            <div>
                                                <x-form.label value="Full Name" />
                                                <p class="mt-1 text-gray-900 dark:text-gray-100">John Doe</p>
                                            </div>
                                            <div>
                                                <x-form.label value="Email" />
                                                <p class="mt-1 text-gray-900 dark:text-gray-100">john.doe@example.com</p>
                                            </div>
                                            <div>
                                                <x-form.label value="Role" />
                                                <p class="mt-1 text-gray-900 dark:text-gray-100">Administrator</p>
                                            </div>
                                        </div>
                                    </div>
                                </x-modal.body>
                                <x-modal.footer>
                                    <x-button.button variant="secondary" x-data="" x-on:click="$dispatch('close-modal', 'profile-modal')">
                                        Close
                                    </x-button>
                                    <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'profile-modal')">
                                        Edit Profile
                                    </x-button>
                                </x-modal.footer>
                            </x-modal>
                        </div>

                        <!-- Success Message Modal -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Success Message Modal</h4>
                            <x-button.button 
                                variant="success"
                                x-data=""
                                x-on:click="$dispatch('open-modal', 'success-modal')"
                            >
                                Show Success
                            </x-button>

                            <x-modal.modal name="success-modal" maxWidth="sm">
                                <x-modal.header modalName="success-modal" :closeButton="false">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                                Success!
                                            </h3>
                                        </div>
                                    </div>
                                </x-modal.header>
                                <x-modal.body>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        Your changes have been saved successfully.
                                    </p>
                                </x-modal.body>
                                <x-modal.footer align="center">
                                    <x-button.button variant="primary" x-data="" x-on:click="$dispatch('close-modal', 'success-modal')">
                                        OK
                                    </x-button>
                                </x-modal.footer>
                            </x-modal>
                        </div>
                    </div>
                </x-card>
            </div>
</x-app-layout>

