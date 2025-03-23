<?php

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Beneficiary;

new #[Layout('layouts.app')] class extends Component {
    public $user;

    public $name;
    public $address;
    public $phone_number;
    public $support_need;
    public $email;

    protected function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|unique:beneficiaries,phone_number,' . $this->user->id,
            'support_need' => 'required',
            'email' => 'required',
        ];
    }

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

        session()->flash('success', 'Beneficiary updated successfully.');
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
    <div>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded absolute z-10 top-0 right-0 m-8" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
                    </svg>
                </span>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded absolute z-10 top-0 right-0 m-8" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.914l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.934-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
                    </svg>
                </span>
            </div>
        @endif
    </div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') . ': ' . $user->phone_number }}
        </h2>
    </x-slot>
    <div class="flex gap-4 my-8 items-start justify-between max-w-7xl mx-auto">
        <div class="flex flex-col">
        <div>{{ $user->name }}</div>
        <div>{{ $user->phone_number }}</div>
        <div>{{ $user->address }}</div>
        <div>{{ $user->support_need }}</div>
        <div>{{ $user->need_status }}</div>
        <div>{{ $user->email }}</div>
        </div>
        <div class="m-4 w-1/2">
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
                <label for="email" class="text-bold text-gray-700">Email</label>
                <input wire:model="email" id="email" placeholder="Email" type="text" class="p-2 rounded">
                <div class="text-rose-500 text-xs">
                    @error('email')
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
                <label for="address" class="text-bold text-gray-700">Address</label>
                <textarea wire:model="address" id="address" placeholder="Address" type="text" class="p-2 rounded"></textarea>
                <div class="text-rose-500 text-xs">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            
            <div class="flex gap-2 flex-col mb-4">
                <label for="support_need" class="text-bold text-gray-700">Support need</label>
                <textarea wire:model="support_need" id="support_need" placeholder="Support need" type="text"
                    class="p-2 rounded"></textarea>
                <div class="text-rose-500 text-xs">
                    @error('support_need')
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
