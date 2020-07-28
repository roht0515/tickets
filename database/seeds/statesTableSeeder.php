<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        DB::table('states')->insert([
        'id' => 1,
        'name' => "pendiente",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('states')->insert([
        'id' => 2,
        'name' => "en progreso",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('states')->insert([
        'id' => 3,
        'name' => "atendido",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('states')->insert([
        'id' => 4,
        'name' => "sin atender",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
    }
}
