<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_aturan')->insert([    
            'id'=>7,
            'kelompok_aturan'=>1657769418,
            'id_kriteria'=>1,
            'id_gejala'=>1,
            'nilai'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'deleted_at'=>NULL
            ] );
                        
    }
}
