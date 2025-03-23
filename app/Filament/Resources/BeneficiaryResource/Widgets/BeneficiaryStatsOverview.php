<?php

namespace App\Filament\Resources\BeneficiaryResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BeneficiaryStatsOverview extends BaseWidget
{
    protected ?string $heading = 'Beneficiaries Analytics';

protected ?string $description = 'An overview of Beneficiaries analytics.';
    protected function getStats(): array
    {
        $statusCounts = \App\Models\Beneficiary::selectRaw('need_status, COUNT(*) as count')
            ->whereIn('need_status', array_keys(\App\BeneficiaryNeedStatusEnum::labels()))
            ->groupBy('need_status')
            ->pluck('count', 'need_status');

        $pendingCount = $statusCounts['pending'] ?? 0;
        $approvedCount = $statusCounts['approved'] ?? 0;
        $rejectedCount = $statusCounts['rejected'] ?? 0;

        $total = $pendingCount + $approvedCount + $rejectedCount;
        return [
            Stat::make('Pending', ($pendingCount > 1000 ? ($pendingCount / 1000).'k' : $pendingCount))
            ->description(($pendingCount / 1000).'k increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        Stat::make('Approved', $approvedCount)
            ->description((($approvedCount / $total) * 100).'% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
        Stat::make('Rejected', $rejectedCount)
            ->description((($rejectedCount / $total) * 100).'% increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
        ];
    }
}
