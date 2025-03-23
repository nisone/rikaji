<?php

use Livewire\Volt\Component;
use App\Models\Beneficiary;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $search = '';
    // public $beneficiaries;

    // public function mount() {
    //     $id = auth()->user()->id;
    //     $this->beneficiaries = Beneficiary::latest()
    //         ->where('user_id', $id)
    //         ->paginate(3);

    // }

    public function with()
    {
        $id = auth()->user()->id;
        return  [
            'beneficiaries' => Beneficiary::search($this->search)
            ->latest()
            ->where('user_id', $id)
            ->paginate(3),
        ];
    }
}; ?>

<div>
    <div class="pt-6">
        <x-input-label for="search" :value="__('Search')" />
        <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="search" name="search" required autofocus autocomplete="search" />
        <x-input-error :messages="$errors->get('search')" class="mt-2" />
    </div>


    <div class="flex flex-col mx-auto py-4">
       @foreach ($beneficiaries as $b)
        <div class="p-4  flex flex-col space-y-2">
           <a class="text-lg text-blue-500 hover:underline" href={{route('beneficiaries.user', $b->id)}}> {{$b->name}}</a>
           <p class="text-sm text-gray-500 font-semibold">
            {{ $b->phone_number }} <br >
            {{ $b->email }}
           </p>
            <span class="text-xs text-gray-500 font-semibold">{{$b->created_at->diffForHumans()}}</span>
        </div>
    @endforeach
    </div>

    <div>{{$beneficiaries->links()}}</div>

</div>
