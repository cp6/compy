@props([
    'parentId' => null,
    'placeholder' => 'Write a comment...',
    'submitText' => 'Post',
    'showAvatar' => true,
])

<div class="comment-form">
    <form 
        x-data="{ 
            content: '',
            submitting: false,
            submitForm() {
                if (!this.content.trim()) return;
                this.submitting = true;
                // Simulate form submission
                setTimeout(() => {
                    this.submitting = false;
                    this.content = '';
                    // In a real app, you'd handle the response here
                }, 500);
            }
        }"
        @submit.prevent="submitForm()"
        class="space-y-3"
    >
        <div class="flex gap-3">
            @if($showAvatar)
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-gradient-to-br from-dodger-blue-400 to-dodger-blue-600 flex items-center justify-center text-white font-semibold text-sm sm:text-base ring-2 ring-gray-200 dark:ring-gray-700">
                        {{ strtoupper(substr(auth()->check() ? auth()->user()->name : 'U', 0, 1)) }}
                    </div>
                </div>
            @endif

            <div class="flex-1">
                <textarea
                    x-model="content"
                    placeholder="{{ $placeholder }}"
                    rows="3"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-dodger-blue-500 focus:border-dodger-blue-500 transition-all duration-200 resize-none text-sm sm:text-base"
                ></textarea>

                <div class="flex items-center justify-between mt-2">
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        <span x-text="content.length"></span> characters
                    </div>
                    <button
                        type="submit"
                        :disabled="submitting || !content.trim()"
                        class="px-4 py-2 bg-dodger-blue-600 hover:bg-dodger-blue-700 disabled:bg-gray-400 disabled:cursor-not-allowed text-white rounded-lg font-medium text-sm sm:text-base transition-colors duration-200 flex items-center gap-2"
                    >
                        <svg 
                            x-show="submitting"
                            class="animate-spin h-4 w-4"
                            fill="none" 
                            viewBox="0 0 24 24"
                        >
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span x-text="submitting ? 'Posting...' : '{{ $submitText }}'"></span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

