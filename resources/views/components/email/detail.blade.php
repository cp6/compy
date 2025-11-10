@props([
    'id' => null,
    'from' => '',
    'to' => null,
    'subject' => '',
    'content' => '',
    'timestamp' => null,
    'important' => false,
    'attachments' => [],
])

<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    {{-- Email Header --}}
    <div class="bg-white dark:bg-gray-800 border border-gray-200/60 dark:border-gray-700/60 rounded-xl p-6 shadow-md shadow-gray-200/30 dark:shadow-gray-900/50">
        <div class="flex items-start gap-4 mb-4">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-semibold">
                    {{ strtoupper(substr($from, 0, 1)) }}
                </div>
            </div>
            
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-2">
                    <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $subject }}
                    </h1>
                </div>
                
                <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center gap-2">
                        <span class="font-medium text-gray-700 dark:text-gray-300">From:</span>
                        <span>{{ $from }}</span>
                    </div>
                    @if($to)
                        <div class="flex items-center gap-2">
                            <span class="font-medium text-gray-700 dark:text-gray-300">To:</span>
                            <span>{{ $to }}</span>
                        </div>
                    @endif
                    @if($timestamp)
                        <div class="flex items-center gap-2">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Date:</span>
                            <span>{{ $timestamp }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Attachments --}}
        @if(count($attachments) > 0)
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Attachments</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($attachments as $attachment)
                        <a href="#" class="inline-flex items-center gap-2 px-3 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                            {{ $attachment['name'] ?? 'Attachment' }}
                            @if(isset($attachment['size']))
                                <span class="text-xs text-gray-500 dark:text-gray-400">({{ $attachment['size'] }})</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
        
        {{-- Email Content --}}
        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="prose prose-sm dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                <div class="whitespace-pre-wrap">{{ $content }}</div>
            </div>
        </div>
    </div>
</div>

