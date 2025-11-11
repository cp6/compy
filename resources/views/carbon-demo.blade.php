<x-app-layout>
    <x-slot name="title">Carbon Date Format Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo showcasing PHP Carbon date formatting capabilities with various format strings.</x-slot>
    <x-slot name="metaKeywords">carbon, date, formatting, php, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Carbon Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Carbon Date Format Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Formatting 2025-11-11 14:35:50 into various string formats
    </x-slot>

    <x-alert.alerts />

    @php
        $originalDate = '2025-11-11 14:35:50';
        $carbon = \Carbon\Carbon::parse($originalDate);
        
        $formats = [
            // Basic Date Formats
            'Basic Date Formats' => [
                'Y-m-d H:i:s' => $carbon->format('Y-m-d H:i:s'),
                'Y/m/d H:i:s' => $carbon->format('Y/m/d H:i:s'),
                'd-m-Y H:i:s' => $carbon->format('d-m-Y H:i:s'),
                'm/d/Y H:i:s' => $carbon->format('m/d/Y H:i:s'),
                'd.m.Y H:i:s' => $carbon->format('d.m.Y H:i:s'),
                'Ymd His' => $carbon->format('Ymd His'),
            ],
            
            // ISO Formats
            'ISO Formats' => [
                'c (ISO 8601)' => $carbon->format('c'),
                'Y-m-d\TH:i:sP' => $carbon->format('Y-m-d\TH:i:sP'),
                'Y-m-d\TH:i:s\Z' => $carbon->format('Y-m-d\TH:i:s\Z'),
                'Y-m-d\TH:i:s.u\Z' => $carbon->toIso8601String(),
                'RFC3339' => $carbon->toRfc3339String(),
                'RFC822' => $carbon->toRfc822String(),
                'RFC850' => $carbon->toRfc850String(),
                'ATOM' => $carbon->toAtomString(),
                'COOKIE' => $carbon->toCookieString(),
                'RSS' => $carbon->toRssString(),
                'W3C' => $carbon->toW3cString(),
            ],
            
            // Human Readable Formats
            'Human Readable Formats' => [
                'F j, Y, g:i a' => $carbon->format('F j, Y, g:i a'),
                'F j, Y, g:i A' => $carbon->format('F j, Y, g:i A'),
                'l, F j, Y' => $carbon->format('l, F j, Y'),
                'D, M j, Y' => $carbon->format('D, M j, Y'),
                'jS F Y' => $carbon->format('jS F Y'),
                'jS \of F Y' => $carbon->format('jS \of F Y'),
                'toDateTimeString()' => $carbon->toDateTimeString(),
                'toDateString()' => $carbon->toDateString(),
                'toTimeString()' => $carbon->toTimeString(),
                'toDayDateTimeString()' => $carbon->toDayDateTimeString(),
                'toFormattedDateString()' => $carbon->toFormattedDateString(),
                'diffForHumans()' => $carbon->diffForHumans(),
            ],
            
            // Time Formats
            'Time Formats' => [
                'H:i:s' => $carbon->format('H:i:s'),
                'h:i:s A' => $carbon->format('h:i:s A'),
                'g:i a' => $carbon->format('g:i a'),
                'G:i' => $carbon->format('G:i'),
                'H:i' => $carbon->format('H:i'),
                'h:i A' => $carbon->format('h:i A'),
                'U (Unix timestamp)' => $carbon->format('U'),
                'timestamp' => $carbon->timestamp,
            ],
            
            // Date Only Formats
            'Date Only Formats' => [
                'Y-m-d' => $carbon->format('Y-m-d'),
                'm/d/Y' => $carbon->format('m/d/Y'),
                'd/m/Y' => $carbon->format('d/m/Y'),
                'Ymd' => $carbon->format('Ymd'),
                'd-m-Y' => $carbon->format('d-m-Y'),
                'F j, Y' => $carbon->format('F j, Y'),
                'l, F j, Y' => $carbon->format('l, F j, Y'),
                'D, M j, Y' => $carbon->format('D, M j, Y'),
                'j M Y' => $carbon->format('j M Y'),
                'jS M Y' => $carbon->format('jS M Y'),
            ],
            
            // Year Formats
            'Year Formats' => [
                'Y (4-digit)' => $carbon->format('Y'),
                'y (2-digit)' => $carbon->format('y'),
                'o (ISO week-numbering year)' => $carbon->format('o'),
            ],
            
            // Month Formats
            'Month Formats' => [
                'F (Full name)' => $carbon->format('F'),
                'M (Short name)' => $carbon->format('M'),
                'm (Numeric with leading zero)' => $carbon->format('m'),
                'n (Numeric without leading zero)' => $carbon->format('n'),
                't (Days in month)' => $carbon->format('t'),
            ],
            
            // Day Formats
            'Day Formats' => [
                'd (Day with leading zero)' => $carbon->format('d'),
                'j (Day without leading zero)' => $carbon->format('j'),
                'D (Short day name)' => $carbon->format('D'),
                'l (Full day name)' => $carbon->format('l'),
                'N (ISO-8601 numeric)' => $carbon->format('N'),
                'w (Numeric day of week)' => $carbon->format('w'),
                'z (Day of year)' => $carbon->format('z'),
                'S (English ordinal suffix)' => $carbon->format('S'),
            ],
            
            // Week Formats
            'Week Formats' => [
                'W (ISO-8601 week number)' => $carbon->format('W'),
                'w (Numeric day of week)' => $carbon->format('w'),
            ],
            
            // Hour Formats
            'Hour Formats' => [
                'H (24-hour with leading zero)' => $carbon->format('H'),
                'G (24-hour without leading zero)' => $carbon->format('G'),
                'h (12-hour with leading zero)' => $carbon->format('h'),
                'g (12-hour without leading zero)' => $carbon->format('g'),
            ],
            
            // Minute & Second Formats
            'Minute & Second Formats' => [
                'i (Minutes with leading zero)' => $carbon->format('i'),
                's (Seconds with leading zero)' => $carbon->format('s'),
                'v (Milliseconds)' => $carbon->format('v'),
                'u (Microseconds)' => $carbon->format('u'),
            ],
            
            // AM/PM Formats
            'AM/PM Formats' => [
                'a (lowercase am/pm)' => $carbon->format('a'),
                'A (uppercase AM/PM)' => $carbon->format('A'),
            ],
            
            // Timezone Formats
            'Timezone Formats' => [
                'e (Timezone identifier)' => $carbon->format('e'),
                'T (Timezone abbreviation)' => $carbon->format('T'),
                'P (Timezone offset with colon)' => $carbon->format('P'),
                'O (Timezone offset)' => $carbon->format('O'),
                'Z (Timezone offset in seconds)' => $carbon->format('Z'),
            ],
            
            // Special Formats
            'Special Formats' => [
                'r (RFC 2822)' => $carbon->format('r'),
                'U (Unix timestamp)' => $carbon->format('U'),
                'B (Swatch Internet Time)' => $carbon->format('B'),
                'I (Daylight Saving Time)' => $carbon->format('I'),
                'L (Leap year)' => $carbon->format('L'),
            ],
            
            // Custom Combinations
            'Custom Combinations' => [
                'Y-m-d H:i' => $carbon->format('Y-m-d H:i'),
                'd/m/Y H:i' => $carbon->format('d/m/Y H:i'),
                'F j, Y \a\t g:i A' => $carbon->format('F j, Y \a\t g:i A'),
                'l, F jS, Y' => $carbon->format('l, F jS, Y'),
                'Y-m-d\TH:i:s.v\Z' => $carbon->format('Y-m-d\TH:i:s.v\Z'),
                'D M j G:i:s T Y' => $carbon->format('D M j G:i:s T Y'),
                'Y-m-d H:i:s.u' => $carbon->format('Y-m-d H:i:s.u'),
                'Ymd_His' => $carbon->format('Ymd_His'),
                'Y-m-d_H-i-s' => $carbon->format('Y-m-d_H-i-s'),
                'Y/m/d H:i' => $carbon->format('Y/m/d H:i'),
            ],
            
            // Carbon Specific Methods
            'Carbon Specific Methods' => [
                'toDateTimeString()' => $carbon->toDateTimeString(),
                'toDateString()' => $carbon->toDateString(),
                'toTimeString()' => $carbon->toTimeString(),
                'toDayDateTimeString()' => $carbon->toDayDateTimeString(),
                'toFormattedDateString()' => $carbon->toFormattedDateString(),
                'toIso8601String()' => $carbon->toIso8601String(),
                'toRfc3339String()' => $carbon->toRfc3339String(),
                'toRfc822String()' => $carbon->toRfc822String(),
                'toRfc850String()' => $carbon->toRfc850String(),
                'toAtomString()' => $carbon->toAtomString(),
                'toCookieString()' => $carbon->toCookieString(),
                'toRssString()' => $carbon->toRssString(),
                'toW3cString()' => $carbon->toW3cString(),
                'toJson()' => $carbon->toJson(),
                'toString()' => $carbon->toString(),
            ],
        ];
    @endphp

    <div class="space-y-6">
        <!-- Original Date Display -->
        <x-card.card title="Original Date" variant="gradient">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4">
                <p class="text-lg font-mono text-gray-900 dark:text-gray-100">
                    {{ $originalDate }}
                </p>
            </div>
        </x-card.card>

        <!-- Format Groups -->
        @foreach($formats as $category => $formatGroup)
            <x-card.card :title="$category" variant="gradient">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Format String
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                    Output
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($formatGroup as $format => $output)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <code class="text-sm font-mono text-dodger-blue-600 dark:text-dodger-blue-400 bg-dodger-blue-50 dark:bg-dodger-blue-900/20 px-2 py-1 rounded">
                                            {{ $format }}
                                        </code>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-900 dark:text-gray-100 font-mono">
                                            {{ $output }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card.card>
        @endforeach

        <!-- Code Example -->
        <x-card.card title="Code Example" variant="gradient">
            <div class="bg-gray-900 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-100"><code>@php
$carbon = \Carbon\Carbon::parse('2025-11-11 14:35:50');

// Basic format
$carbon->format('Y-m-d H:i:s'); // 2025-11-11 14:35:50

// Human readable
$carbon->format('F j, Y, g:i A'); // November 11, 2025, 2:35 PM

// ISO formats
$carbon->toIso8601String(); // 2025-11-11T14:35:50+00:00
$carbon->toRfc3339String(); // 2025-11-11T14:35:50+00:00

// Carbon specific methods
$carbon->toDateTimeString(); // 2025-11-11 14:35:50
$carbon->toFormattedDateString(); // Nov 11, 2025
$carbon->diffForHumans(); // 1 year ago (relative to now)
@endphp</code></pre>
            </div>
        </x-card.card>
    </div>
</x-app-layout>

