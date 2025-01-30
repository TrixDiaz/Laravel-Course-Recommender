<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Counter;
use App\Models\Feedback;
use App\Models\RecommenderResult;

class StatsOverview extends BaseWidget
{
    /**
     * Sort
     */
    protected static ?int $sort = 2;
    protected function getStats(): array
    {
        $visitors = Counter::all()->count();
        $feedback = Feedback::all()->count();
        $participant = RecommenderResult::all()->count();
        return [
            Stat::make('Visitor', $visitors)
                ->description('Total count of Visitors')
                ->color('success'),
            Stat::make('Feedback', $feedback)
                ->description('Total Feedback from User')
                ->color('warning'),
            Stat::make('Participant', $participant)
                ->description('Total Participant')
                ->color('success'),
        ];
    }
}
