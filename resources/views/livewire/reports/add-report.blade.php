<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Report;
use App\Models\User;

new class extends Component {

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $description;


    public function createReport() {
        $this->validate();

        $id = auth()->user()->id;

        // $user = User::find($id);

    //     $user->reports()->create([
    //         'name'=> $this->title,
    //         'address'=> $this->description,
    // ]);

        Report::create([
            'user_id' => $id,
            'title'=> $this->title,
            'description'=> $this->description,
    ]);
    }
}; ?>

<div class="m-4">
    <div>
        <h2 class="text-2xl text-semibold  my-4">
            Add report
        </h2>
    </div>

    <div class="flex gap-2 flex-col mb-4">
        <label for="title" class="text-bold text-gray-700">Title</label>
        <input wire:model="title" id="title" placeholder="title" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('title') {{ $message }} @enderror</div>
    </div>

    <div class="flex gap-2 flex-col mb-4">
        <label for="description" class="text-bold text-gray-700">Description</label>
        <input wire:model="description" id="description" placeholder="description" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('description') {{ $message }} @enderror</div>
    </div>

    <div wire:click="createReport" class="rounded text-center py-2 bg-blue-800 text-bold w-full hover:bg-blue-700 text-blue-200">
        <div wire:loading>
            Saving...
        </div>
        <div wire:loading.remove>
        Submit
        </div>
    </div>
</div>
