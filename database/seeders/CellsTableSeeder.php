<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($row = 1; $row <= 3; $row++) {
            for ($col = 1; $col <= 3; $col++) {
                DB::table('cells')->insert([
                    'row' => $row,
                    'col' => $col,
                    'color' => null,
                    'link' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
