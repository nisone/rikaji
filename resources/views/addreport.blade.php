<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
        </x-slot>
<div class="flex flex-col md:flex-row items-start justify-between max-w-7xl mx-auto">

    <livewire:reports.report />

    <div>
        <livewire:reports.add-report />
    </div>
</div>
</x-app-layout>
