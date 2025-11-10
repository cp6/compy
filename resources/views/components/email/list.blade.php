@props([
    'emails' => [],
    'emptyMessage' => 'No emails found',
])

<div {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @forelse($emails as $email)
        <x-email.item
            :id="$email['id'] ?? null"
            :from="$email['from'] ?? ''"
            :subject="$email['subject'] ?? ''"
            :preview="$email['preview'] ?? null"
            :timestamp="$email['timestamp'] ?? null"
            :unread="$email['unread'] ?? false"
            :important="$email['important'] ?? false"
            :attachments="$email['attachments'] ?? false"
            :href="$email['href'] ?? null"
        />
    @empty
        <div class="text-center py-12">
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $emptyMessage }}</h3>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Your inbox is empty.</p>
        </div>
    @endforelse
</div>

