<x-app-layout>
    <x-slot name="title">Charts Demo</x-slot>
    <x-slot name="metaDescription">Explore interactive charts and data visualization components using Chart.js</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Charts', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Charts Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive charts and data visualization components powered by Chart.js
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-8">
        <!-- Line Chart -->
        <x-card.card variant="gradient" title="Line Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Line charts are perfect for displaying trends over time. This example shows monthly sales data with multiple datasets.
            </p>
            
            <x-chart.chart 
                type="line"
                height="400px"
                :data="[
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    'datasets' => [
                        [
                            'label' => 'Sales',
                            'data' => [65, 59, 80, 81, 56, 55, 40, 48, 59, 80, 81, 85],
                            'borderColor' => 'rgb(139, 92, 246)',
                            'backgroundColor' => 'rgba(139, 92, 246, 0.2)',
                            'borderWidth' => 3,
                            'tension' => 0.4,
                            'fill' => true,
                            'pointBackgroundColor' => 'rgb(139, 92, 246)',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 5,
                            'pointHoverRadius' => 7,
                        ],
                        [
                            'label' => 'Revenue',
                            'data' => [28, 48, 40, 19, 86, 27, 90, 45, 60, 70, 75, 80],
                            'borderColor' => 'rgb(236, 72, 153)',
                            'backgroundColor' => 'rgba(236, 72, 153, 0.2)',
                            'borderWidth' => 3,
                            'tension' => 0.4,
                            'fill' => true,
                            'pointBackgroundColor' => 'rgb(236, 72, 153)',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 5,
                            'pointHoverRadius' => 7,
                        ],
                    ],
                ]"
                :options="[
                    'plugins' => [
                        'legend' => [
                            'display' => true,
                            'position' => 'top',
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Bar Chart -->
        <x-card.card variant="gradient" title="Bar Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Bar charts are ideal for comparing values across different categories. This example shows quarterly performance metrics.
            </p>
            
            <x-chart.chart 
                type="bar"
                height="400px"
                :data="[
                    'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
                    'datasets' => [
                        [
                            'label' => '2023',
                            'data' => [65, 59, 80, 81],
                            'backgroundColor' => [
                                'rgba(99, 102, 241, 0.9)',
                                'rgba(139, 92, 246, 0.9)',
                                'rgba(168, 85, 247, 0.9)',
                                'rgba(192, 38, 211, 0.9)',
                            ],
                            'borderColor' => [
                                'rgb(99, 102, 241)',
                                'rgb(139, 92, 246)',
                                'rgb(168, 85, 247)',
                                'rgb(192, 38, 211)',
                            ],
                            'borderWidth' => 2,
                            'borderRadius' => 8,
                        ],
                        [
                            'label' => '2024',
                            'data' => [45, 75, 90, 95],
                            'backgroundColor' => [
                                'rgba(236, 72, 153, 0.9)',
                                'rgba(239, 68, 68, 0.9)',
                                'rgba(251, 146, 60, 0.9)',
                                'rgba(251, 191, 36, 0.9)',
                            ],
                            'borderColor' => [
                                'rgb(236, 72, 153)',
                                'rgb(239, 68, 68)',
                                'rgb(251, 146, 60)',
                                'rgb(251, 191, 36)',
                            ],
                            'borderWidth' => 2,
                            'borderRadius' => 8,
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Pie Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <x-card.card variant="gradient" title="Pie Chart">
                <p class="mb-6 text-gray-600 dark:text-gray-400">
                    Pie charts are great for showing proportions and percentages. This example displays market share distribution.
                </p>
                
                <x-chart.chart 
                    type="pie"
                    height="350px"
                    :data="[
                        'labels' => ['Desktop', 'Mobile', 'Tablet', 'Other'],
                        'datasets' => [
                            [
                                'data' => [45, 30, 15, 10],
                                'backgroundColor' => [
                                    'rgba(99, 102, 241, 0.9)',
                                    'rgba(236, 72, 153, 0.9)',
                                    'rgba(251, 146, 60, 0.9)',
                                    'rgba(34, 197, 94, 0.9)',
                                ],
                                'borderColor' => [
                                    'rgb(99, 102, 241)',
                                    'rgb(236, 72, 153)',
                                    'rgb(251, 146, 60)',
                                    'rgb(34, 197, 94)',
                                ],
                                'borderWidth' => 3,
                                'hoverOffset' => 10,
                            ],
                        ],
                    ]"
                />
            </x-card>

            <!-- Doughnut Chart -->
            <x-card.card variant="gradient" title="Doughnut Chart">
                <p class="mb-6 text-gray-600 dark:text-gray-400">
                    Doughnut charts are similar to pie charts but with a hollow center, perfect for displaying category breakdowns.
                </p>
                
                <x-chart.chart 
                    type="doughnut"
                    height="350px"
                    :data="[
                        'labels' => ['Marketing', 'Sales', 'Development', 'Support', 'Other'],
                        'datasets' => [
                            [
                                'data' => [35, 25, 20, 15, 5],
                                'backgroundColor' => [
                                    'rgba(139, 92, 246, 0.9)',
                                    'rgba(236, 72, 153, 0.9)',
                                    'rgba(59, 130, 246, 0.9)',
                                    'rgba(34, 197, 94, 0.9)',
                                    'rgba(251, 146, 60, 0.9)',
                                ],
                                'borderColor' => [
                                    'rgb(139, 92, 246)',
                                    'rgb(236, 72, 153)',
                                    'rgb(59, 130, 246)',
                                    'rgb(34, 197, 94)',
                                    'rgb(251, 146, 60)',
                                ],
                                'borderWidth' => 3,
                                'hoverOffset' => 12,
                            ],
                        ],
                    ]"
                />
            </x-card>
        </div>

        <!-- Radar Chart -->
        <x-card.card variant="gradient" title="Radar Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Radar charts are excellent for comparing multiple variables. This example shows skill assessments across different areas.
            </p>
            
            <x-chart.chart 
                type="radar"
                height="400px"
                :data="[
                    'labels' => ['Frontend', 'Backend', 'Database', 'DevOps', 'Testing', 'Design'],
                    'datasets' => [
                        [
                            'label' => 'Current Skills',
                            'data' => [85, 75, 70, 60, 80, 65],
                            'borderColor' => 'rgb(139, 92, 246)',
                            'backgroundColor' => 'rgba(139, 92, 246, 0.3)',
                            'pointBackgroundColor' => 'rgb(139, 92, 246)',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 6,
                            'pointHoverRadius' => 8,
                            'borderWidth' => 3,
                        ],
                        [
                            'label' => 'Target Skills',
                            'data' => [90, 90, 85, 80, 85, 80],
                            'borderColor' => 'rgb(236, 72, 153)',
                            'backgroundColor' => 'rgba(236, 72, 153, 0.3)',
                            'pointBackgroundColor' => 'rgb(236, 72, 153)',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 6,
                            'pointHoverRadius' => 8,
                            'borderWidth' => 3,
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Polar Area Chart -->
        <x-card.card variant="gradient" title="Polar Area Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Polar area charts combine elements of pie and radar charts, useful for comparing values across categories.
            </p>
            
            <x-chart.chart 
                type="polarArea"
                height="400px"
                :data="[
                    'labels' => ['North', 'South', 'East', 'West', 'Central'],
                    'datasets' => [
                        [
                            'data' => [300, 250, 200, 180, 150],
                            'backgroundColor' => [
                                'rgba(99, 102, 241, 0.8)',
                                'rgba(236, 72, 153, 0.8)',
                                'rgba(251, 146, 60, 0.8)',
                                'rgba(34, 197, 94, 0.8)',
                                'rgba(139, 92, 246, 0.8)',
                            ],
                            'borderColor' => [
                                'rgb(99, 102, 241)',
                                'rgb(236, 72, 153)',
                                'rgb(251, 146, 60)',
                                'rgb(34, 197, 94)',
                                'rgb(139, 92, 246)',
                            ],
                            'borderWidth' => 3,
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Scatter Chart -->
        <x-card.card variant="gradient" title="Scatter Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Scatter charts are perfect for showing relationships between two variables. This example displays correlation between hours worked and productivity.
            </p>
            
            <x-chart.chart 
                type="scatter"
                height="400px"
                :data="[
                    'datasets' => [
                        [
                            'label' => 'Team A',
                            'data' => [
                                ['x' => 20, 'y' => 65],
                                ['x' => 25, 'y' => 70],
                                ['x' => 30, 'y' => 75],
                                ['x' => 35, 'y' => 80],
                                ['x' => 40, 'y' => 85],
                                ['x' => 45, 'y' => 88],
                                ['x' => 50, 'y' => 90],
                            ],
                            'backgroundColor' => 'rgba(139, 92, 246, 0.7)',
                            'borderColor' => 'rgb(139, 92, 246)',
                            'pointRadius' => 8,
                            'pointHoverRadius' => 10,
                            'borderWidth' => 2,
                        ],
                        [
                            'label' => 'Team B',
                            'data' => [
                                ['x' => 20, 'y' => 60],
                                ['x' => 25, 'y' => 68],
                                ['x' => 30, 'y' => 72],
                                ['x' => 35, 'y' => 78],
                                ['x' => 40, 'y' => 82],
                                ['x' => 45, 'y' => 85],
                                ['x' => 50, 'y' => 87],
                            ],
                            'backgroundColor' => 'rgba(236, 72, 153, 0.7)',
                            'borderColor' => 'rgb(236, 72, 153)',
                            'pointRadius' => 8,
                            'pointHoverRadius' => 10,
                            'borderWidth' => 2,
                        ],
                    ],
                ]"
                :options="[
                    'scales' => [
                        'x' => [
                            'type' => 'linear',
                            'position' => 'bottom',
                            'title' => [
                                'display' => true,
                                'text' => 'Hours Worked',
                            ],
                        ],
                        'y' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Productivity Score',
                            ],
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Bubble Chart -->
        <x-card.card variant="gradient" title="Bubble Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Bubble charts extend scatter charts by adding a third dimension (bubble size). This example shows project metrics with size representing budget.
            </p>
            
            <x-chart.chart 
                type="bubble"
                height="400px"
                :data="[
                    'datasets' => [
                        [
                            'label' => 'Projects',
                            'data' => [
                                ['x' => 20, 'y' => 30, 'r' => 15],
                                ['x' => 40, 'y' => 10, 'r' => 10],
                                ['x' => 30, 'y' => 20, 'r' => 20],
                                ['x' => 50, 'y' => 40, 'r' => 25],
                                ['x' => 60, 'y' => 35, 'r' => 18],
                                ['x' => 70, 'y' => 50, 'r' => 30],
                            ],
                            'backgroundColor' => [
                                'rgba(139, 92, 246, 0.7)',
                                'rgba(236, 72, 153, 0.7)',
                                'rgba(59, 130, 246, 0.7)',
                                'rgba(34, 197, 94, 0.7)',
                                'rgba(251, 146, 60, 0.7)',
                                'rgba(99, 102, 241, 0.7)',
                            ],
                            'borderColor' => [
                                'rgb(139, 92, 246)',
                                'rgb(236, 72, 153)',
                                'rgb(59, 130, 246)',
                                'rgb(34, 197, 94)',
                                'rgb(251, 146, 60)',
                                'rgb(99, 102, 241)',
                            ],
                            'borderWidth' => 2,
                        ],
                    ],
                ]"
                :options="[
                    'scales' => [
                        'x' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Complexity',
                            ],
                        ],
                        'y' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Success Rate',
                            ],
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Mixed Chart -->
        <x-card.card variant="gradient" title="Mixed Chart">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Mixed charts combine different chart types in a single visualization. This example shows revenue (bar) and growth rate (line) together.
            </p>
            
            <x-chart.chart 
                type="bar"
                height="400px"
                :data="[
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    'datasets' => [
                        [
                            'type' => 'bar',
                            'label' => 'Revenue',
                            'data' => [65, 59, 80, 81, 56, 55],
                            'backgroundColor' => [
                                'rgba(99, 102, 241, 0.9)',
                                'rgba(139, 92, 246, 0.9)',
                                'rgba(168, 85, 247, 0.9)',
                                'rgba(192, 38, 211, 0.9)',
                                'rgba(236, 72, 153, 0.9)',
                                'rgba(239, 68, 68, 0.9)',
                            ],
                            'borderColor' => [
                                'rgb(99, 102, 241)',
                                'rgb(139, 92, 246)',
                                'rgb(168, 85, 247)',
                                'rgb(192, 38, 211)',
                                'rgb(236, 72, 153)',
                                'rgb(239, 68, 68)',
                            ],
                            'borderWidth' => 2,
                            'borderRadius' => 8,
                            'yAxisID' => 'y',
                        ],
                        [
                            'type' => 'line',
                            'label' => 'Growth Rate',
                            'data' => [10, 15, 12, 18, 14, 16],
                            'borderColor' => 'rgb(34, 197, 94)',
                            'backgroundColor' => 'rgba(34, 197, 94, 0.2)',
                            'borderWidth' => 3,
                            'yAxisID' => 'y1',
                            'tension' => 0.4,
                            'fill' => true,
                            'pointBackgroundColor' => 'rgb(34, 197, 94)',
                            'pointBorderColor' => '#fff',
                            'pointBorderWidth' => 2,
                            'pointRadius' => 5,
                            'pointHoverRadius' => 7,
                        ],
                    ],
                ]"
                :options="[
                    'scales' => [
                        'y' => [
                            'type' => 'linear',
                            'display' => true,
                            'position' => 'left',
                            'title' => [
                                'display' => true,
                                'text' => 'Revenue ($)',
                            ],
                        ],
                        'y1' => [
                            'type' => 'linear',
                            'display' => true,
                            'position' => 'right',
                            'title' => [
                                'display' => true,
                                'text' => 'Growth Rate (%)',
                            ],
                            'grid' => [
                                'drawOnChartArea' => false,
                            ],
                        ],
                    ],
                ]"
            />
        </x-card>

        <!-- Usage Examples -->
        <x-card.card variant="gradient" title="Usage Examples">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Here are code examples showing how to use the chart component in your Blade templates.
            </p>
            
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic Line Chart --&gt;
&lt;x-chart.chart 
    type="line"
    height="400px"
    :data="[
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        'datasets' => [
            [
                'label' => 'Sales',
                'data' => [65, 59, 80, 81, 56],
                'borderColor' => 'rgb(59, 130, 246)',
                'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
            ],
        ],
    ]"
/&gt;

&lt;!-- Bar Chart with Custom Options --&gt;
&lt;x-chart.chart 
    type="bar"
    height="400px"
    :data="[
        'labels' => ['Q1', 'Q2', 'Q3', 'Q4'],
        'datasets' => [
            [
                'label' => 'Revenue',
                'data' => [65, 59, 80, 81],
                'backgroundColor' => 'rgba(59, 130, 246, 0.8)',
            ],
        ],
    ]"
    :options="[
        'plugins' => [
            'legend' => [
                'display' => true,
                'position' => 'top',
            ],
        ],
    ]"
/&gt;

&lt;!-- Pie Chart --&gt;
&lt;x-chart.chart 
    type="pie"
    height="350px"
    :data="[
        'labels' => ['Desktop', 'Mobile', 'Tablet'],
        'datasets' => [
            [
                'data' => [45, 30, 25],
                'backgroundColor' => [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(251, 191, 36, 0.8)',
                ],
            ],
        ],
    ]"
/&gt;

&lt;!-- Chart Inside Card --&gt;
&lt;x-card.card variant="gradient" title="Sales Chart"&gt;
    &lt;x-chart.chart 
        type="line"
        height="400px"
        :data="$chartData"
    /&gt;
&lt;/x-card&gt;</code></pre>
            </div>
        </x-card>
    </div>
</x-app-layout>

