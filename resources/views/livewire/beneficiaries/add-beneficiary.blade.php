<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use App\Models\Beneficiary;
use App\Models\User;
use App\Mail\WelcomeBeneficiary;
use Illuminate\Support\Facades\Mail;

new class extends Component {

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $address;

    #[Validate('required|unique:beneficiaries')]
    public $phone_number;

    #[Validate('required')]
    public $support_need;

     #[Validate('required')]
     public $email;

    public function createBeneficiary() {
        $this->validate();

        $id = auth()->user()->id;

        // $user = User::find($id);

    //     $user->beneficiaries()->create([
    //         'name'=> $this->name,
    //         'address'=> $this->address,
    //         'phone_number'=> $this->phone_number,
    //         'support_need'=> $this->support_need,
    // ]);

        Beneficiary::create([
            'user_id' => $id,
            'name'=> $this->name,
            'address'=> $this->address,
            'phone_number'=> $this->phone_number,
            'support_need'=> $this->support_need,
            'email'=> $this->email,
    ]);
    Mail::to($this->email)->send(new WelcomeBeneficiary());
    }

}; ?>

<div class="m-4">
    <div>
        <h2 class="text-2xl text-semibold  my-4">
            Add beneficairy
        </h2>
    </div>

    <div class="flex gap-2 flex-col mb-4">
        <label for="name" class="text-bold text-gray-700">Name</label>
        <input wire:model="name" id="name" placeholder="Fullname" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('name') {{ $message }} @enderror</div>
    </div>

    <div class="flex gap-2 flex-col mb-4">
        <label for="address" class="text-bold text-gray-700">Address</label>
        <input wire:model="address" id="address" placeholder="Address" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('address') {{ $message }} @enderror</div>
    </div>
    <div class="flex gap-2 flex-col mb-4">
        <label for="phone_number" class="text-bold text-gray-700">Phone number</label>
        <input wire:model="phone_number" id="phone_number" placeholder="Phonenumber" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('phone_number') {{ $message }} @enderror</div>
    </div>
    <div class="flex gap-2 flex-col mb-4">
        <label for="support_need" class="text-bold text-gray-700">Support need</label>
        <input wire:model="support_need" id="support_need" placeholder="Support need" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('support_need') {{ $message }} @enderror</div>
    </div>
    <div class="flex gap-2 flex-col mb-4">
        <label for="email" class="text-bold text-gray-700">Email</label>
        <input wire:model="email" id="email" placeholder="Email" type="text" class="p-2 rounded">
        <div class="text-rose-500 text-xs">@error('email') {{ $message }} @enderror</div>
    </div>


    <div wire:click="createBeneficiary" class="rounded text-center py-2 bg-blue-800 text-bold w-full hover:bg-blue-700 text-blue-200">
        <div wire:loading>
            Saving...
        </div>
        <div wire:loading.remove>
        Submit
        </div>
    </div>
</div>
