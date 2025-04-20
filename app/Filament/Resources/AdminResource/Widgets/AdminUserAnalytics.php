<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Admin;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminUserAnalytics extends BaseWidget
{
    protected function getStats(): array
    {
        $count = Admin::count();

        return [
            Stat::make('Number of Admins', $count)
            ->description('Total number of admin users')
            ->descriptionIcon('heroicon-m-user')
            ->color('success'),
        ];
    }
}
