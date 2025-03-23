<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="flex flex-col md:flex-row items-start justify-between max-w-7xl mx-auto">

        <div>
            <livewire:reports.report />
        </div>

        <div class="w-1/3">
            <livewire:reports.add-report />
        </div>
    </div>
</x-app-layout>
