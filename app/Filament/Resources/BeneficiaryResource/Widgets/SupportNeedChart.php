<?php

namespace App\Filament\Resources\BeneficiaryResource\Widgets;

use Filament\Widgets\ChartWidget;

class SupportNeedChart extends ChartWidget
{
    protected static ?string $heading = 'Support needs status';

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
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
            'datasets' => [
                [
                    'label' => 'Support needs status',
                    'data' => [$pendingCount, $approvedCount, $rejectedCount],
                ],
            ],
            'labels' => array_values(\App\BeneficiaryNeedStatusEnum::labels()),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
