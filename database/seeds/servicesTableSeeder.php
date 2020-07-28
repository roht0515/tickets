<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class servicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new DateTime();
        DB::table('services')->insert([
        'id' => 1,
        'name' => "Caja",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('services')->insert([
        'id' => 2,
        'name' => "Renta",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('services')->insert([
        'id' => 3,
        'name' => "Plataforma",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
        DB::table('services')->insert([
        'id' => 4,
        'name' => "Renta dignidad",
        'created_at' => $now,
        'updated_at' => $now,
        ]);
    }
}
