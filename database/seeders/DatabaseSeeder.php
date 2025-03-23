<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Report;
use App\Models\Beneficiary;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Admin::factory(1)->create(['email'=>'admin@example.com']);
        User::factory(10)->create();
        $this->call([
            ReportSeeder::class
        ]);
        User::factory(10)->create();
        $this->call([
            BeneficiarySeeder::class
        ]);
    }
}
