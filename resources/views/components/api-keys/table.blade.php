@props([
    'apiKeys' => [],
])

<div class="overflow-x-auto -mx-5 sm:-mx-6">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 dark:text-emerald-500 focus:ring-emerald-500 dark:focus:ring-emerald-400 dark:bg-gray-700">
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    PLATFORM
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    API KEY
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    RENEWAL DATE
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    STATUS
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    DISABLE/ENABLE
                </th>
                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    ACTIONS
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
            @foreach($apiKeys as $apiKey)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <!-- Checkbox -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <input type="checkbox" class="rounded border-gray-300 dark:border-gray-600 text-emerald-600 dark:text-emerald-500 focus:ring-emerald-500 dark:focus:ring-emerald-400 dark:bg-gray-700">
                    </td>
                    
                    <!-- Platform -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $apiKey['platform'] }}
                    </td>
                    
                    <!-- API Key -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        <div class="flex items-center space-x-2">
                            <span class="font-mono text-xs">{{ $apiKey['key'] }}</span>
                            <button 
                                type="button"
                                data-copy="{{ $apiKey['key'] }}"
                                class="inline-flex items-center p-1 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors"
                                title="Copy to clipboard"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                    
                    <!-- Renewal Date -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $apiKey['renewal_date'] }}
                    </td>
                    
                    <!-- Status -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @if($apiKey['status'] === 'active')
                            <span class="inline-flex items-center text-blue-600 dark:text-blue-400">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                Inactive
                            </span>
                        @endif
                    </td>
                    
                    <!-- Disable/Enable Toggle -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div x-data="{ enabled: {{ $apiKey['enabled'] ? 'true' : 'false' }} }">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative flex items-center">
                                    <input 
                                        type="checkbox" 
                                        x-model="enabled"
                                        class="sr-only"
                                    >
                                    <div 
                                        class="w-11 h-6 rounded-full transition-all duration-300 ease-in-out relative"
                                        :class="enabled ? 'bg-emerald-600 dark:bg-emerald-500' : 'bg-gray-300 dark:bg-gray-600'"
                                    >
                                        <div 
                                            class="absolute left-1 top-1 w-4 h-4 bg-white dark:bg-gray-200 rounded-full shadow-md transform transition-transform duration-300 ease-in-out"
                                            :class="enabled ? 'translate-x-5' : 'translate-x-0'"
                                        ></div>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </td>
                    
                    <!-- Actions -->
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            <button 
                                type="button"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                            >
                                Regenerate
                            </button>
                            <button 
                                type="button"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </button>
                            <button 
                                type="button"
                                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-600 dark:text-red-400 bg-white dark:bg-gray-800 border border-red-300 dark:border-red-600 rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-red-400 transition-colors"
                            >
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

