<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Beneficiary;

new #[Layout('layouts.app')] class extends Component {
    public $user;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $address;



    public $phone_number;

    #[Validate('required')]
    public $support_need;

    #[Validate('required')]
    public $email;

    function updateBeneficiary()
      {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'support_need' => $this->support_need,
            'email' => $this->email,
        ]);
    }

    public function mount(Beneficiary $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->address = $user->address;
        $this->phone_number = $user->phone_number;
        $this->support_need = $user->support_need;
        $this->email = $user->email;
    }
};

?>


<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') . ': ' . $user->phone_number }}
        </h2>
    </x-slot>
    <div class="flex flex-col gap-4 my-8 items-start justify-between max-w-7xl mx-auto">

        <div>{{ $user->name }}</div>
        <div>{{ $user->phone_number }}</div>
        <div>{{ $user->address }}</div>
        <div>{{ $user->support_need }}</div>
        <div>{{ $user->need_status }}</div>
        <div>{{ $user->email }}</div>
        <div class="m-4">
            <div>
                <h2 class="text-2xl text-semibold  my-4">
                    Edit beneficairy
                </h2>
            </div>

            <div class="flex gap-2 flex-col mb-4">
                <label for="name" class="text-bold text-gray-700">Name</label>
                <input wire:model="name" id="name" placeholder="Fullname" type="text" class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="flex gap-2 flex-col mb-4">
                <label for="address" class="text-bold text-gray-700">Address</label>
                <input wire:model="address" id="address" placeholder="Address" type="text" class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="flex gap-2 flex-col mb-4">
                <label for="phone_number" class="text-bold text-gray-700">Phone number</label>
                <input wire:model="phone_number" id="phone_number" placeholder="Phonenumber" type="text"
                    class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('phone_number')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="flex gap-2 flex-col mb-4">
                <label for="support_need" class="text-bold text-gray-700">Support need</label>
                <input wire:model="support_need" id="support_need" placeholder="Support need" type="text"
                    class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('support_need')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="flex gap-2 flex-col mb-4">
                <label for="email" class="text-bold text-gray-700">Email</label>
                <input wire:model="email" id="email" placeholder="Email" type="text" class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div wire:click="updateBeneficiary"
                class="rounded text-center py-2 bg-blue-800 text-bold w-full hover:bg-blue-700 text-blue-200">
                <div wire:loading>
                    Saving...
                </div>
                <div wire:loading.remove>
                    Submit
                </div>
            </div>
        </div>>

    </div>
</div>
