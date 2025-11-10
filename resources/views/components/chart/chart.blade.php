@props([
    'id' => null,
    'type' => 'line', // line, bar, pie, doughnut, radar, polarArea, bubble, scatter
    'height' => '400px',
    'data' => [],
    'options' => [],
])

@php
    $chartId = $id ?? 'chart-' . uniqid();
@endphp

<div class="w-full" style="height: {{ $height }};">
    <canvas id="{{ $chartId }}"></canvas>
</div>

@push('scripts')
<script>
    (function() {
        function initChart() {
            // Wait for Chart.js to be available
            if (typeof window.Chart === 'undefined') {
                // Retry after a short delay if Chart.js isn't loaded yet
                setTimeout(initChart, 50);
                return;
            }

            const Chart = window.Chart;
            const ctx = document.getElementById('{{ $chartId }}');
            if (!ctx) return;

            const chartData = @json($data);
            const chartOptions = @json($options);

            // Function to check if dark mode is active
            const isDarkMode = () => {
                return document.documentElement.classList.contains('dark') || 
                       (!document.documentElement.classList.contains('light') && 
                        window.matchMedia('(prefers-color-scheme: dark)').matches);
            };

            // Get current theme colors
            const getThemeColors = () => {
                const dark = isDarkMode();
                return {
                    text: dark ? '#e5e7eb' : '#374151',
                    textSecondary: dark ? '#9ca3af' : '#6b7280',
                    grid: dark ? 'rgba(75, 85, 99, 0.2)' : 'rgba(229, 231, 235, 0.5)',
                    tooltipBg: dark ? 'rgba(17, 24, 39, 0.9)' : 'rgba(255, 255, 255, 0.9)',
                    tooltipBorder: dark ? 'rgba(75, 85, 99, 0.5)' : 'rgba(229, 231, 235, 0.5)',
                };
            };

            const colors = getThemeColors();

            // Merge default options with custom options
            const defaultOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: colors.text,
                            usePointStyle: true,
                            padding: 15,
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: colors.tooltipBg,
                        titleColor: colors.text,
                        bodyColor: colors.text,
                        borderColor: colors.tooltipBorder,
                        borderWidth: 1,
                        padding: 12,
                    }
                },
                scales: chartData.datasets && chartData.datasets[0] && chartData.datasets[0].data ? {
                    x: {
                        ticks: {
                            color: colors.textSecondary,
                        },
                        grid: {
                            color: colors.grid,
                        }
                    },
                    y: {
                        ticks: {
                            color: colors.textSecondary,
                        },
                        grid: {
                            color: colors.grid,
                        }
                    }
                } : {}
            };

            // Deep merge function
            const deepMerge = (target, source) => {
                const output = { ...target };
                if (isObject(target) && isObject(source)) {
                    Object.keys(source).forEach(key => {
                        if (isObject(source[key])) {
                            if (!(key in target)) {
                                Object.assign(output, { [key]: source[key] });
                            } else {
                                output[key] = deepMerge(target[key], source[key]);
                            }
                        } else {
                            Object.assign(output, { [key]: source[key] });
                        }
                    });
                }
                return output;
            };

            const isObject = (item) => {
                return item && typeof item === 'object' && !Array.isArray(item);
            };

            const mergedOptions = deepMerge(defaultOptions, chartOptions);

            // Ensure colors are set after merge
            if (mergedOptions.plugins) {
                if (mergedOptions.plugins.legend && mergedOptions.plugins.legend.labels) {
                    if (!mergedOptions.plugins.legend.labels.color) {
                        mergedOptions.plugins.legend.labels.color = colors.text;
                    }
                }
                if (mergedOptions.plugins.tooltip) {
                    if (!mergedOptions.plugins.tooltip.backgroundColor) {
                        mergedOptions.plugins.tooltip.backgroundColor = colors.tooltipBg;
                    }
                    if (!mergedOptions.plugins.tooltip.titleColor) {
                        mergedOptions.plugins.tooltip.titleColor = colors.text;
                    }
                    if (!mergedOptions.plugins.tooltip.bodyColor) {
                        mergedOptions.plugins.tooltip.bodyColor = colors.text;
                    }
                }
            }

            // Ensure colors are set for scales after merge
            if (mergedOptions.scales) {
                Object.keys(mergedOptions.scales).forEach(key => {
                    if (mergedOptions.scales[key].ticks && !mergedOptions.scales[key].ticks.color) {
                        mergedOptions.scales[key].ticks.color = colors.textSecondary;
                    }
                    if (mergedOptions.scales[key].grid && !mergedOptions.scales[key].grid.color) {
                        mergedOptions.scales[key].grid.color = colors.grid;
                    }
                });
            }

            const chart = new Chart(ctx, {
                type: '{{ $type }}',
                data: chartData,
                options: mergedOptions
            });

            // Update chart colors when theme changes
            const observer = new MutationObserver(() => {
                const newColors = getThemeColors();
                if (chart.options.plugins.legend.labels) {
                    chart.options.plugins.legend.labels.color = newColors.text;
                }
                if (chart.options.plugins.tooltip) {
                    chart.options.plugins.tooltip.backgroundColor = newColors.tooltipBg;
                    chart.options.plugins.tooltip.titleColor = newColors.text;
                    chart.options.plugins.tooltip.bodyColor = newColors.text;
                }
                if (chart.options.scales) {
                    Object.keys(chart.options.scales).forEach(key => {
                        if (chart.options.scales[key].ticks) {
                            chart.options.scales[key].ticks.color = newColors.textSecondary;
                        }
                        if (chart.options.scales[key].grid) {
                            chart.options.scales[key].grid.color = newColors.grid;
                        }
                    });
                }
                chart.update('none');
            });

            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['class']
            });
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initChart);
        } else {
            // DOM is already ready
            initChart();
        }
    })();
</script>
@endpush

