@props([
    'parameters' => [],
])

@if(!empty($parameters))
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800/50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Parameter</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Type</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Required</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Description</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($parameters as $param)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                        <td class="px-4 py-3 text-sm">
                            <code class="px-2 py-1 bg-gray-100 dark:bg-gray-900 rounded text-dodger-blue-600 dark:text-dodger-blue-400 font-mono text-xs">
                                {{ $param['name'] }}
                            </code>
                            @if(isset($param['default']))
                                <span class="ml-2 text-xs text-gray-500 dark:text-gray-400">(default: {{ $param['default'] }})</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-700 dark:text-gray-300">
                            <span class="px-2 py-1 bg-gray-100 dark:bg-gray-900 rounded text-xs font-mono">
                                {{ $param['type'] ?? 'string' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($param['required'] ?? false)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                    Required
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                    Optional
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600 dark:text-gray-400">
                            {{ $param['description'] ?? '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

