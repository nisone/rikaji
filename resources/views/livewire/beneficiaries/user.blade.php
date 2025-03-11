<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use App\Models\Beneficiary;

new #[Layout('layouts.app')] class extends Component
{
    public $user;

    public function mount(Beneficiary $user) {
        $this->user = $user;
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') .': '. $user->phone_number }}
        </h2>
        </x-slot>
<div class="flex flex-col gap-4 my-8 items-start justify-between max-w-7xl mx-auto">

    <div>{{ $user->name}}</div>
    <div>{{ $user->phone_number}}</div>
    <div>{{ $user->address}}</div>
    <div>{{ $user->support_need}}</div>
    <div>{{ $user->need_status}}</div>

</div>
</div>

