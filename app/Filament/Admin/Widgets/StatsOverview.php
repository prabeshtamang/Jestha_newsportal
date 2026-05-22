<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count()),
            Stat::make('Total Articles', Article::count()),
            Stat::make('Total Advertisement', Advertise::count()),
        ];
    }
}
