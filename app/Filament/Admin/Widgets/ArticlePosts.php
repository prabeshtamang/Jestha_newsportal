<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ArticlePosts extends ChartWidget
{
    protected ?string $heading = 'Article Posts';

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public ?string $filter = 'this_year';

    protected function getFilters(): ?array
    {
        return [
            'this_year' => 'This Year',
            'last_year' => 'Last Year',
            'last_6_months' => 'Last 6 Months',
            'last_30_days' => 'Last 30 Days',
        ];
    }

    protected function getData(): array
    {
        $query = Article::query();

        $data = match ($this->filter) {
            'last_year' => $this->getMonthlyData(now()->subYear()),
            'last_6_months' => $this->getLastMonthsData(6),
            'last_30_days' => $this->getDailyData(30),
            default => $this->getMonthlyData(now()), // this_year
        };

        return [
            'datasets' => [
                [
                    'label' => 'Articles Published',
                    'data' => $data['values'],
                    'backgroundColor' => '#3b82f6',
                    'borderColor' => '#2563eb',
                    'borderWidth' => 2,
                    'borderRadius' => 6,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return match ($this->filter) {
            'last_30_days' => 'line',
            default => 'bar',
        };
    }

    private function getMonthlyData(Carbon $date): array
    {
        $year = $date->year;
        $labels = [];
        $values = [];

        for ($month = 1; $month <= 12; $month++) {
            $labels[] = Carbon::create($year, $month, 1)->format('M');

            $count = Article::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $values[] = $count;
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }

    private function getLastMonthsData(int $months): array
    {
        $labels = [];
        $values = [];
        $start = now()->subMonths($months - 1);

        for ($i = 0; $i < $months; $i++) {
            $date = $start->copy()->addMonths($i);
            $labels[] = $date->format('M Y');

            $count = Article::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $values[] = $count;
        }

        return ['labels' => $labels, 'values' => $values];
    }

    private function getDailyData(int $days): array
    {
        $labels = [];
        $values = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $labels[] = $date->format('d M');

            $count = Article::whereDate('created_at', $date->toDateString())
                ->count();

            $values[] = $count;
        }

        return ['labels' => $labels, 'values' => $values];
    }
}
