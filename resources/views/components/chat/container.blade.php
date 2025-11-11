@props([
    'height' => 'h-[600px]',
    'messages' => [],
])

<div 
    class="flex flex-col {{ $height }} bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden"
    x-data="{ 
        messages: @js($messages ?? []),
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$refs.messagesContainer;
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        }
    }"
    x-init="
        scrollToBottom();
        $watch('messages', () => scrollToBottom());
    "
>
    {{-- Messages Container --}}
    <div 
        x-ref="messagesContainer"
        class="flex-1 overflow-y-auto p-4 space-y-4"
        style="scroll-behavior: smooth;"
    >
        @if(!empty($messages) && is_array($messages))
            @foreach($messages as $message)
                <x-chat.message
                    :author="$message['author'] ?? 'User'"
                    :content="$message['content'] ?? ''"
                    :timestamp="$message['timestamp'] ?? null"
                    :isAi="$message['isAi'] ?? false"
                    :isTyping="$message['isTyping'] ?? false"
                    :codeBlocks="$message['codeBlocks'] ?? []"
                    :suggestedResponses="$message['suggestedResponses'] ?? []"
                />
            @endforeach
        @endif
    </div>

    {{-- Input Area --}}
    {{ $slot }}
</div>

