<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $categories=[[
            'name' => 'Immobili',
        ],
        [
            'name' => 'Auto',
        ],
        [
            'name' => 'Lavoro',
        ],
        [
            'name' => 'Elettronica',
        ],
        [
            'name' => 'Moda',
        ],
        [
            'name' => 'Arredamento',
        ],
        [
            'name' => 'Sport',
        ],
        [
            'name' => 'Viaggi',
        ],
        [
            'name' => 'Animali',
        ],
        [
            'name' => 'Altro',
        ]];

        foreach($categories as $category){
            DB::table('categories')->insert(['name' => $category['name']]);
        }
    }

}
