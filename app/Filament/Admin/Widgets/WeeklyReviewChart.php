<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Counter;

// Make sure to import the Counter model
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Carbon\Carbon;

class WeeklyReviewChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'weeklyReviewChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Visitor Review Chart';

    /**
     * Sort
     */
    protected static ?int $sort = 2;

    /**
     * Widget content height
     */
    protected static ?int $contentHeight = 275;

    /**
     * Get weekly visit data and prepare chart options
     *
     * @return array
     */
    protected function getOptions(): array
    {
// Get weekly visit counts using the Counter model
        $weeklyData = $this->getWeeklyVisitCounts();

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
            ],
            'series' => [
                [
                    'name' => 'WeeklyVisits',
                    'data' => $weeklyData, // Pass the weekly data here
                ],
            ],
            'xaxis' => [
                'categories' => $this->getWeekLabels(), // Get the weeks of the year
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#f59e0b'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
    }

    /**
     * Helper method to get weekly visit counts from the Counter model
     *
     * @return array
     */
    protected function getWeeklyVisitCounts(): array
    {
        // Use WEEK() in MySQL to get the week number
        $weeklyVisits = Counter::query()
            ->selectRaw("WEEK(created_at, 3) as week, COUNT(*) as visits")
            // mode 3 = ISO 8601 week numbering (weeks start on Monday)
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Fill the data with zero for missing weeks
        $data = [];
        for ($week = 1; $week <= 12; $week++) { // You’re mapping to months (12 slots)
            $weekData = $weeklyVisits->firstWhere('week', $week);
            $data[] = $weekData ? $weekData->visits : 0;
        }

        return $data;
    }



    /**
     * Helper method to get labels for each week of the year
     *
     * @return array
     */
    protected function getWeekLabels(): array
    {
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        return $months; // We can use the months for simplicity
    }
}
