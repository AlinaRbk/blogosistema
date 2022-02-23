<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaginationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagination_settings')->insert([
            'title' => '5',
            'value' => 5,
            'visible' => 1
        ]);
        DB::table('pagination_settings')->insert([
            'title' => '20',
            'value' => 20,
            'visible' => 0
        ]);
        DB::table('pagination_settings')->insert([
            'title' => 'All',
            'value' => 1,
            'visible' => 1
        ]);

    }
}
