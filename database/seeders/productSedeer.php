<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 3 ; $i++) { 
            DB::table('product')->insert([
                'nm_product' => 'zymuno',
                'file' => 'zyo-1',
            ]);
        }
    }
}
