<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class priorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        DB::table('priorities')->insert([
        'id' => 1,
        'level_priority' => 1,
        'name' => "Alta",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('priorities')->insert([
        'id' => 2,
        'level_priority' => 2,
        'name' => "Moderada",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('priorities')->insert([
        'id' => 3,
        'level_priority' => 3,
        'name' => "Media",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('priorities')->insert([
        'id' => 4,
        'level_priority' => 4,
        'name' => "normal",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('priorities')->insert([
            'id' => 5,
            'level_priority' => 5,
            'name' => "Baja",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('priorities')->insert([
            'id' => 6,
            'level_priority' => 6,
            'name' => "Super Baja",
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
