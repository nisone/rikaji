<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Report;

new #[Layout('layouts.app')] class extends Component
{
    public $report;

    public function mount(Report $report) {
        $this->report = $report;
    }
}; ?>


<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reported by') . ': ' . $report->title }}
        </h2>
    </x-slot>
    <div class="flex flex-col gap-4 my-8 items-start justify-between max-w-7xl mx-auto">

        <div>{{ $report->title }}</div>
        <div>{{ $report->description }}</div>
        <div>{{ $report->created_at }}</div>


    </div>
</div>
