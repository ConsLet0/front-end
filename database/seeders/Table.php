<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            ['no_table' => '1'],
            ['no_table' => '2'],
            ['no_table' => '3'],
            ['no_table' => '4'],
            ['no_table' => '5'],
            ['no_table' => '6'],
            ['no_table' => '7'],
            ['no_table' => '8'],
        ]);
    }
}
