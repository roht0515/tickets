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
        $this->call(servicesTableSeeder::class);
        $this->call(statesTableSeeder::class);
        $this->call(priorityTableSeeder::class);
        $this->call(typeClientTableSeeder::class);
    }
}
