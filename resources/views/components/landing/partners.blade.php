@props([
    'companies' => ['Company A', 'Company B', 'Company C', 'Company D', 'Company E', 'Company F'],
])

<section class="py-12 bg-gray-100 dark:bg-gray-900 border-y border-gray-200 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-medium text-gray-500 dark:text-gray-400 mb-8">
            Trusted by employees at:
        </p>
        <div class="flex flex-wrap items-center justify-center gap-8 md:gap-12">
            @foreach($companies as $company)
                <div class="partner-logo flex items-center justify-center w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full">
                    <span class="text-gray-400 dark:text-gray-600 font-semibold text-sm">{{ $company }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

