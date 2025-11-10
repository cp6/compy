<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Task', 'url' => '#'],
            ['label' => 'Create Task'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Create Task
    </x-slot>

    <x-slot name="pageSubtitle">
        Create a new task and assign it to your team
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card variant="gradient">
        <form method="POST" action="#" class="space-y-4 sm:space-y-6">
            @csrf

            <x-form.group>
                <!-- Basic Information Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6">
                    <div class="space-y-4 sm:space-y-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-2">
                            Task Details
                        </h3>
                        
                        <x-form.input 
                            name="title" 
                            label="Task Title" 
                            type="text"
                            placeholder="Enter task title"
                            help="A clear and concise title for your task"
                            required
                        />

                        <x-form.textarea 
                            name="description" 
                            label="Description" 
                            rows="6"
                            placeholder="Describe the task in detail..."
                            help="Provide a detailed description of what needs to be done"
                        />

                        <x-form.tags
                            name="tags"
                            label="Tags"
                            :suggestions="['urgent', 'important', 'bug', 'feature', 'documentation', 'design', 'backend', 'frontend', 'testing', 'review', 'deployment', 'maintenance']"
                            placeholder="Add tags..."
                            help="Add tags to categorize and organize your task"
                            :maxTags="8"
                        />
                    </div>

                    <div class="space-y-4 sm:space-y-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 border-b border-gray-200 dark:border-gray-700 pb-2">
                            Assignment & Priority
                        </h3>

                        <x-form.select 
                            name="priority" 
                            label="Priority"
                            :options="[
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'urgent' => 'Urgent',
                            ]"
                            placeholder="Select priority"
                            help="Set the priority level for this task"
                        />

                        <x-form.select 
                            name="status" 
                            label="Status"
                            :options="[
                                'todo' => 'To Do',
                                'in_progress' => 'In Progress',
                                'review' => 'In Review',
                                'done' => 'Done',
                            ]"
                            placeholder="Select status"
                            value="todo"
                            help="Current status of the task"
                        />

                        <x-form.autocomplete
                            name="assignee"
                            label="Assign To"
                            :suggestions="[
                                'John Doe' => 'John Doe - Developer',
                                'Jane Smith' => 'Jane Smith - Designer',
                                'Bob Johnson' => 'Bob Johnson - QA',
                                'Alice Williams' => 'Alice Williams - PM',
                                'Charlie Brown' => 'Charlie Brown - Developer',
                            ]"
                            placeholder="Start typing to search team members..."
                            help="Assign this task to a team member"
                        />

                        <x-form.date 
                            name="due_date" 
                            label="Due Date"
                            help="Set a deadline for this task"
                        />

                        <x-form.time 
                            name="due_time" 
                            label="Due Time"
                            help="Set a specific time for the deadline"
                        />
                    </div>
                </div>

                <!-- Additional Information Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="space-y-4 sm:space-y-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Additional Information
                        </h3>

                        <x-form.select 
                            name="category" 
                            label="Category"
                            :options="[
                                'development' => 'Development',
                                'design' => 'Design',
                                'marketing' => 'Marketing',
                                'sales' => 'Sales',
                                'support' => 'Support',
                                'other' => 'Other',
                            ]"
                            placeholder="Select category"
                            help="Categorize the task"
                        />

                        <x-form.number 
                            name="estimated_hours" 
                            label="Estimated Hours" 
                            min="0"
                            max="1000"
                            step="0.5"
                            placeholder="0.0"
                            help="Estimated time to complete (in hours)"
                        />

                        <x-form.range 
                            name="progress" 
                            label="Progress"
                            min="0"
                            max="100"
                            step="1"
                            value="0"
                            help="Current progress percentage"
                        />
                    </div>

                    <div class="space-y-4 sm:space-y-6">
                        <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Attachments & Links
                        </h3>

                        <x-form.file 
                            name="attachments" 
                            label="Attachments"
                            type="file"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.gif"
                            :maxSize="10"
                            help="Upload files related to this task (max 10MB)"
                            :multiple="true"
                        />

                        <x-form.url 
                            name="related_link" 
                            label="Related Link" 
                            placeholder="https://example.com"
                            help="Link to related documentation or resources"
                        />
                    </div>
                </div>

                <!-- Notifications Section -->
                <div class="pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 sm:mb-6">
                        Notifications
                    </h3>

                    <div class="space-y-3">
                        <x-form.toggle 
                            name="notify_assignee" 
                            label="Notify Assignee"
                            checked
                            help="Send notification to the assigned team member"
                        />
                        <x-form.toggle 
                            name="notify_team" 
                            label="Notify Team"
                            help="Send notification to all team members"
                        />
                        <x-form.toggle 
                            name="email_notification" 
                            label="Email Notification"
                            checked
                            help="Send email notification when task is created"
                        />
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 sm:gap-4 pt-4 sm:pt-6 border-t border-gray-200 dark:border-gray-700">
                    <x-button.secondary type="button" variant="outline" class="w-full sm:w-auto">
                        Cancel
                    </x-button.secondary>
                    <x-button.primary type="submit" variant="gradient" class="w-full sm:w-auto">
                        Create Task
                    </x-button.primary>
                </div>
            </x-form.group>
        </form>
    </x-card>
</x-app-layout>

