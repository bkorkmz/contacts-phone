<?php

namespace Database\Seeders;

use App\Models\Rehber;
use Illuminate\Database\Seeder;

class RehberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rehber::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();
    }
}
