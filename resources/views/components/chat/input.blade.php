@props([
    'placeholder' => 'Type your message...',
    'disabled' => false,
])

<div class="border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 p-4">
    <form 
        x-data="{ message: '', isSubmitting: false }"
        @submit.prevent="
            if (message.trim() && !isSubmitting) {
                isSubmitting = true;
                // Simulate sending message
                setTimeout(() => {
                    isSubmitting = false;
                    message = '';
                }, 500);
            }
        "
        class="flex items-end gap-3"
    >
        <div class="flex-1">
            <textarea
                x-model="message"
                @keydown.enter.prevent="
                    if (!event.shiftKey && message.trim() && !isSubmitting) {
                        $el.form.requestSubmit();
                    }
                "
                :disabled="isSubmitting || {{ $disabled ? 'true' : 'false' }}"
                placeholder="{{ $placeholder }}"
                rows="1"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400 resize-none transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                style="max-height: 120px; overflow-y: auto;"
                x-ref="textarea"
                x-on:input="
                    $refs.textarea.style.height = 'auto';
                    $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
                "
            ></textarea>
        </div>
        <button
            type="submit"
            :disabled="!message.trim() || isSubmitting || {{ $disabled ? 'true' : 'false' }}"
            class="flex-shrink-0 px-4 py-2 rounded-lg bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 shadow-md hover:shadow-lg text-sm font-medium"
        >
            <span x-show="!isSubmitting">Send</span>
            <span x-show="isSubmitting" style="display: none;">Sending...</span>
        </button>
    </form>
</div>

