<?php

namespace Database\Factories;

use App\BeneficiaryNeedStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->name('male'),
            'address' => fake()->address(),
            'phone_number' => fake()->phonenumber(),
            'support_need' => fake()->paragraph(),
            'need_status' => BeneficiaryNeedStatusEnum::Pending->value
        ];
    }
}
