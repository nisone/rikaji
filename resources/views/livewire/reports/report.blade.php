<?php

use Livewire\Volt\Component;
use App\Models\Report;

new class extends Component {
    public $reports;

    public function mount() {
        $id = auth()->user()->id;
        $this->reports = Report::latest()
            ->where('user_id', $id)
            ->get();
    }
}; ?>

<div>

    <div class="flex flex-col mx-auto py-4">
       @foreach ($reports as $r)
        <div class="p-4 text-lg text-blue-500 hover:underline">
           <a href={{route('reports.reportby', $r->id)}}> {{$r->title}}</a>
        </div>
    @endforeach
    </div>

</div>
