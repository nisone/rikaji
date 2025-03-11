<?php

namespace Database\Seeders;

use App\Filament\Resources\BeneficiaryResource\Pages\ListBeneficiaries;
use App\Models\Beneficiary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beneficiary::factory(5)->create();
    }
}
