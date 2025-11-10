<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Forms', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Form Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of all available form input components
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card variant="gradient">
                <form method="POST" action="{{ route('forms.demo.submit') }}" class="space-y-4 sm:space-y-6">
                    @csrf

                    <x-form.group>
                        <!-- Personal Information Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                            <div class="space-y-4 sm:space-y-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-2">
                                    Personal Information
                                </h3>
                                
                                <x-form.input 
                                    name="name" 
                                    label="Full Name" 
                                    type="text"
                                    placeholder="Enter your full name"
                                    help="This is your display name"
                                />

                                <x-form.input 
                                    name="email" 
                                    label="Email Address" 
                                    type="email"
                                    placeholder="you@example.com"
                                />

                                <x-form.url 
                                    name="website" 
                                    label="Website URL" 
                                    placeholder="https://example.com"
                                    help="Your personal or company website"
                                />

                                <x-form.tel 
                                    name="phone" 
                                    label="Phone Number" 
                                    placeholder="+1 (555) 123-4567"
                                    help="Include country code"
                                />

                                <x-form.input 
                                    name="password" 
                                    label="Password" 
                                    type="password"
                                    placeholder="Enter a secure password"
                                />

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                    <x-form.number 
                                        name="age" 
                                        label="Age" 
                                        min="18"
                                        max="100"
                                        placeholder="Enter your age"
                                        help="Must be between 18 and 100"
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
                                        ]"
                                        placeholder="Select country"
                                    />
                                </div>

                                <!-- Inline Prefix Examples -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <h4 class="text-md font-semibold text-gray-900 dark:text-gray-100 mb-4">
                                        Inline Prefix Examples
                                    </h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                                        <x-form.input-prefix 
                                            name="website_url" 
                                            label="Website URL" 
                                            prefix="http://"
                                            placeholder="www.example.com"
                                            help="Enter your website URL"
                                        />
                                        <x-form.number-prefix 
                                            name="price" 
                                            label="Price" 
                                            prefix="$"
                                            placeholder="0.00"
                                            min="0"
                                            step="0.01"
                                            help="Enter the price"
                                        />
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-3 sm:mt-4">
                                        <x-form.input-prefix 
                                            name="email_domain" 
                                            label="Email Domain" 
                                            prefix="@"
                                            placeholder="example.com"
                                        />
                                        <x-form.number-prefix 
                                            name="weight" 
                                            label="Weight" 
                                            prefix="kg"
                                            placeholder="0"
                                            min="0"
                                            help="Enter weight in kilograms"
                                        />
                                    </div>
                                </div>

                                <x-form.textarea 
                                    name="bio" 
                                    label="Biography" 
                                    rows="4"
                                    placeholder="Tell us about yourself..."
                                    help="Write a brief description about yourself"
                                />

                                <x-form.tags
                                    name="skills"
                                    label="Skills"
                                    :suggestions="['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React', 'Python', 'Ruby', 'Java', 'TypeScript', 'Tailwind CSS', 'Alpine.js', 'MySQL', 'PostgreSQL', 'MongoDB', 'Docker', 'Git', 'AWS', 'Linux']"
                                    placeholder="Add your skills..."
                                    help="Type to search and press Enter to add"
                                    :maxTags="10"
                                />

                                <x-form.multiselect
                                    name="languages"
                                    label="Languages Spoken"
                                    :options="[
                                        'en' => 'English',
                                        'es' => 'Spanish',
                                        'fr' => 'French',
                                        'de' => 'German',
                                        'it' => 'Italian',
                                        'pt' => 'Portuguese',
                                        'zh' => 'Chinese',
                                        'ja' => 'Japanese',
                                        'ko' => 'Korean',
                                        'ar' => 'Arabic',
                                    ]"
                                    placeholder="Select languages"
                                    help="Select all languages you speak"
                                    :maxSelections="5"
                                />

                                <x-form.autocomplete
                                    name="city"
                                    label="City"
                                    :suggestions="[
                                        'New York' => 'New York, NY',
                                        'Los Angeles' => 'Los Angeles, CA',
                                        'Chicago' => 'Chicago, IL',
                                        'Houston' => 'Houston, TX',
                                        'Phoenix' => 'Phoenix, AZ',
                                        'Philadelphia' => 'Philadelphia, PA',
                                        'San Antonio' => 'San Antonio, TX',
                                        'San Diego' => 'San Diego, CA',
                                        'Dallas' => 'Dallas, TX',
                                        'San Jose' => 'San Jose, CA',
                                    ]"
                                    placeholder="Start typing your city..."
                                    help="Type to see suggestions"
                                />
                            </div>

                            <div class="space-y-4 sm:space-y-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-2">
                                    Preferences & Settings
                                </h3>

                                <x-form.radio 
                                    name="gender" 
                                    label="Gender"
                                    :options="[
                                        'male' => 'Male',
                                        'female' => 'Female',
                                        'other' => 'Other',
                                        'prefer_not_to_say' => 'Prefer not to say',
                                    ]"
                                    value="prefer_not_to_say"
                                />

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-3">
                                        Interests
                                    </label>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <x-form.checkbox 
                                            name="interests[]" 
                                            label="Technology"
                                            value="technology"
                                        />
                                        <x-form.checkbox 
                                            name="interests[]" 
                                            label="Sports"
                                            value="sports"
                                        />
                                        <x-form.checkbox 
                                            name="interests[]" 
                                            label="Music"
                                            value="music"
                                        />
                                        <x-form.checkbox 
                                            name="interests[]" 
                                            label="Travel"
                                            value="travel"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-3">
                                        Notification Settings
                                    </label>
                                    <div class="space-y-3">
                                        <x-form.toggle 
                                            name="email_notifications" 
                                            label="Email Notifications"
                                            checked
                                            help="Receive notifications via email"
                                        />
                                        <x-form.toggle 
                                            name="push_notifications" 
                                            label="Push Notifications"
                                            help="Receive push notifications on your device"
                                        />
                                        <x-form.toggle 
                                            name="sms_notifications" 
                                            label="SMS Notifications"
                                            size="sm"
                                            help="Receive notifications via SMS"
                                        />
                                        <x-form.toggle 
                                            name="marketing_emails" 
                                            label="Marketing Emails"
                                            size="lg"
                                            help="Receive marketing and promotional emails"
                                        />
                                    </div>
                                </div>

                                <x-form.rating
                                    name="experience_level"
                                    label="Experience Level"
                                    :max="5"
                                    value="3"
                                    help="Rate your overall experience level"
                                />

                                <x-form.search
                                    name="search_interests"
                                    label="Search Interests"
                                    placeholder="Search for topics..."
                                    help="Search for topics you're interested in"
                                />
                            </div>
                        </div>

                        <!-- Date & Time Section -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 sm:col-span-2 lg:col-span-3">
                                Scheduling
                            </h3>
                            
                            <x-form.date 
                                name="birthday" 
                                label="Date of Birth"
                            />

                            <x-form.time 
                                name="preferred_time" 
                                label="Preferred Contact Time"
                                help="What time do you prefer to be contacted?"
                            />

                            <x-form.datetime 
                                name="appointment" 
                                label="Appointment Date & Time"
                            />

                            <x-form.month 
                                name="start_month" 
                                label="Start Month"
                                help="Select a month"
                            />

                            <x-form.week 
                                name="preferred_week" 
                                label="Preferred Week"
                                help="Select a week"
                            />
                        </div>

                        <!-- Additional Options Section -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="space-y-4 sm:space-y-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Additional Options
                                </h3>

                                <x-form.range 
                                    name="satisfaction" 
                                    label="Satisfaction Level"
                                    min="0"
                                    max="100"
                                    step="1"
                                    value="50"
                                    help="Rate your satisfaction from 0 to 100"
                                />

                                <x-form.range-dual
                                    name="price_range"
                                    label="Price Range"
                                    :min="0"
                                    :max="1000"
                                    :step="10"
                                    :minValue="100"
                                    :maxValue="500"
                                    help="Select your preferred price range"
                                />

                                <x-form.color 
                                    name="favorite_color" 
                                    label="Favorite Color"
                                    value="#10b981"
                                />
                            </div>

                            <div class="space-y-4 sm:space-y-6">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    File Upload
                                </h3>

                                <x-form.file 
                                    name="avatar" 
                                    label="Profile Picture"
                                    type="file"
                                    accept="image/*"
                                    :maxSize="2"
                                    help="Upload a profile picture (JPG, PNG, GIF)"
                                />
                            </div>
                        </div>

                        <!-- Rich Text Editor Section -->
                        <div class="pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 sm:mb-6">
                                Content Editor
                            </h3>

                            <x-form.rich-text
                                name="description"
                                label="Detailed Description"
                                placeholder="Start typing your description here..."
                                help="Use the toolbar to format your text"
                                height="200px"
                            />
                        </div>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 sm:gap-4 pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                            <x-button.secondary type="button" variant="outline" class="w-full sm:w-auto">
                                Cancel
                            </x-button.secondary>
                            <x-button.primary type="submit" variant="gradient" class="w-full sm:w-auto">
                                Submit Form
                            </x-button.primary>
                        </div>
                    </x-form.group>
                </form>
            </x-card>
</x-app-layout>
