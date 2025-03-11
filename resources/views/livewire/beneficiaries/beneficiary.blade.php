<?php

use Livewire\Volt\Component;
use App\Models\Beneficiary;

new class extends Component {
    public $beneficiaries;

    public function mount() {
        $id = auth()->user()->id;
        $this->beneficiaries = Beneficiary::latest()
            ->where('user_id', $id)
            ->get();
    }
}; ?>

<div>

    <div class="flex flex-col mx-auto py-4">
       @foreach ($beneficiaries as $b)
        <div class="p-4 text-lg text-blue-500 hover:underline">
           <a href={{route('beneficiaries.user', $b->id)}}> {{$b->name}}</a>
        </div>
    @endforeach
    </div>

</div>
