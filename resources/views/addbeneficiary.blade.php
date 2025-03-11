<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beneficiaries') }}
        </h2>
        </x-slot>
<div class="flex flex-col md:flex-row items-start justify-between max-w-7xl mx-auto">

    <livewire:beneficiaries.beneficiary />

    <div>
        <livewire:beneficiaries.add-beneficiary />
    </div>
</div>
</x-app-layout>
