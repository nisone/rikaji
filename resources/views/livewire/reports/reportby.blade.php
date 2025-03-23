<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Report;

new #[Layout('layouts.app')] class extends Component {
    public $report;
    public $user_id;
    public $title;
    public $description;

    protected function rules()
    {
        return [
            'title' => 'required|unique:reports,title,' . $this->report->id,
            'description' => 'min:25',
        ];
    }

    function updateReport()
    {
        $this->validate();
        $this->report->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Report updated successfully.');
    }

    public function mount(Report $report)
    {
        $this->report = $report;
        $this->title = $report->title;
        $this->description = $report->description;
        $this->user_id = $report->user_id;
    }
}; ?>


<div>
    <div>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute z-10 top-0 right-0 m-8"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                    </svg>
                </span>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded absolute z-10 top-0 right-0 m-8"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                    </svg>
                </span>
            </div>
        @endif
    </div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reported by') . ': ' . $report->user->name }}
        </h2>
    </x-slot>
    <div class="flex flex-col gap-4 my-8 items-start justify-between max-w-4xl mx-auto">
        <div class="flex gap-2 flex-col mb-4 w-full">
            <label for="title" class="text-bold text-gray-700">Title</label>
            <input wire:model="title" id="title" placeholder="Report Title" type="text" class="p-2 rounded">
            <div class="text-rose-500 text-xs">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="flex gap-2 flex-col mb-4 w-full">
            <label for="description" class="text-bold text-gray-700">Description</label>
            <textarea wire:model="description" id="description" placeholder="Report Description" type="text" class="p-2 rounded"></textarea>
            <div class="text-rose-500 text-xs">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>



        <div wire:click="updateReport"
            class="rounded text-center py-2 bg-blue-800 text-bold w-full hover:bg-blue-700 text-blue-200">
            <div wire:loading>
                Saving...
            </div>
            <div wire:loading.remove>
                Save
            </div>
        </div>


    </div>
</div>
