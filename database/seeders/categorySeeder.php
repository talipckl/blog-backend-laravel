<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
         ['name'=> 'Spor'],
         ['name'=> 'Haber'],
         ['name'=> 'Sanat'],
         ['name'=> 'Bilgi'],
        ];
        DB::table('blog_categories')->insert($data);
    }
}
