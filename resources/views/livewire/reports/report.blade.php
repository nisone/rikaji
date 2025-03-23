<?php

use Livewire\Volt\Component;
use App\Models\Report;
use Livewire\WithPagination;

new class extends Component {
    use Withpagination;
    public $search = '';
    //     public $reports;

    //     public function mount() {
    //         $id = auth()->user()->id;
    //         $this->reports = Report::latest()
    //             ->where('user_id', $id)
    //             ->get();
    //     }

    public function with()
    {
        $id = auth()->user()->id;
        return [
            'reports' => Report::search($this->search)->latest()->where('user_id', $id)->paginate(5),
        ];
    }
}; ?>
<div>
    <div>
        <div class="pt-6">
            <x-input-label for="search" :value="__('Search')" />
            <x-text-input wire:model.live="search" id="search" class="block mt-1 w-full" type="search" name="search"
                required autofocus autocomplete="search" />
            <x-input-error :messages="$errors->get('search')" class="mt-2" />
        </div>
    </div>

    <div>

        <div class="flex flex-col mx-auto py-4">
            @foreach ($reports as $r)
                <div class="p-4 text-lg ">
                    <a class="text-blue-500 hover:underline" href={{ route('reports.reportby', $r->id) }}>
                        {{ $r->title }}</a>
                    <p class="text-sm text-gray-500 font-semibold">
                        Reported by: {{ $r->user->name }} <br>
                    </p>
                    <span class="text-xs text-gray-500 font-semibold">{{ $r->created_at->diffForHumans() }}</span>
                </div>
            @endforeach
        </div>

    </div>

    <div>{{ $reports->links() }}</div>
</div>
