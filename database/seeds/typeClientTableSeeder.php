<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class typeClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        DB::table('type_client')->insert([
        'id' => 1,
        'priority_id' => 1,
        'name' => "Tercera edad",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('type_client')->insert([
        'id' => 2,
        'priority_id' => 2,
        'name' => "Mujeres en Gestacion",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('type_client')->insert([
        'id' => 3,
        'priority_id' => 3,
        'name' => "Discapacitados",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('type_client')->insert([
        'id' => 4,
        'priority_id' => 4,
        'name' => "Mujeres con niños en edad palvularia",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('type_client')->insert([
            'id' => 5,
            'priority_id' => 5,
            'name' => "Operaciones en caja",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
