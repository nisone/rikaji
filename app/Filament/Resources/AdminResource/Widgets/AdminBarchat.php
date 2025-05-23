<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use Filament\Widgets\ChartWidget;

class AdminBarchat extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Admin count per day',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
