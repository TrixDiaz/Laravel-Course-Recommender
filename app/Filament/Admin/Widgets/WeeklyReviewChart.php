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
        // Use strftime to get the week number (in the format 00 to 52)
        $weeklyVisits = Counter::query()
            ->selectRaw("strftime('%W', created_at) as week, COUNT(*) as visits")
            ->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        // Fill the data with zero for missing weeks
        $data = [];
        for ($week = 0; $week < 12; $week++) { // Use week numbers from 0 to 11 (12 months)
            $weekData = $weeklyVisits->firstWhere('week', str_pad($week, 2, '0', STR_PAD_LEFT)); // Ensure the week number is 2 digits
            $data[] = $weekData ? $weekData->visits : 0; // Add visits or 0 if no visits in that week
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
