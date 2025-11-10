@props([
    'tickets' => [],
    'emptyMessage' => 'No tickets found',
])

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @forelse($tickets as $ticket)
        <x-ticket.item
            :id="$ticket['id'] ?? null"
            :title="$ticket['title'] ?? ''"
            :description="$ticket['description'] ?? null"
            :status="$ticket['status'] ?? 'open'"
            :priority="$ticket['priority'] ?? 'medium'"
            :category="$ticket['category'] ?? null"
            :author="$ticket['author'] ?? null"
            :createdAt="$ticket['createdAt'] ?? null"
            :href="$ticket['href'] ?? null"
        />
    @empty
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $emptyMessage }}</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new ticket.</p>
        </div>
    @endforelse
</div>

