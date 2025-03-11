<?php
use Livewire\Volt\Component;
use App\Models\Report;

new class extends Component {
    public $reports;
    public function mount(){
        $id = auth()->user()->id;
        $this->reports = Report::with('user')->latest()
            ->where('user_id', $id)
            ->get();
    }

}; ?>

<div>
    <div>

        <div class="flex flex-col mx-auto py-4">
           @foreach ($reports as $report)
           <div class="p-4 text-sm text-gray-400 ">
           Reported by: {{$report->user->name}}
        </div>
            <div class="p-4 text-lg text-blue-500 hover:underline">
                {{$report->title}}
            </div>
        @endforeach
        </div>

    </div>
</div>
