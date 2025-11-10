@props([
    'tasks' => [],
    'emptyMessage' => 'No tasks found',
])

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @forelse($tasks as $task)
        <x-task.item
            :id="$task['id'] ?? null"
            :title="$task['title'] ?? ''"
            :description="$task['description'] ?? null"
            :status="$task['status'] ?? 'todo'"
            :priority="$task['priority'] ?? 'medium'"
            :category="$task['category'] ?? null"
            :assignee="$task['assignee'] ?? null"
            :dueDate="$task['dueDate'] ?? null"
            :tags="$task['tags'] ?? []"
            :progress="$task['progress'] ?? null"
            :href="$task['href'] ?? null"
        />
    @empty
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $emptyMessage }}</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new task.</p>
        </div>
    @endforelse
</div>

