<?php

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
//         $this->call(MetaSeeder::class);

         factory(\App\Models\Website::class, 10)->create();
    }
}
