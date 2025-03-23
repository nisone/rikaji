<?php

namespace App\Filament\Resources\ReportResource\Widgets;

use App\Models\Report;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReportStatsOverview extends BaseWidget
{

    protected int|string|array $columnSpan = 1;
    protected ?string $heading = 'Report Analytics';

    protected ?string $description = 'An overview of report analytics.';
    protected function getStats(): array
    {
        $count = Report::count();
        return [
            Stat::make('Unique reports', ($count > 1000 ? ($count / 1000).'k' : $count))
            ->description(($count / 1000).'k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
