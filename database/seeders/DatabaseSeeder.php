<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Branch;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Branch::factory(10)->create();
        Barber::factory(10)->create();
    }
}
