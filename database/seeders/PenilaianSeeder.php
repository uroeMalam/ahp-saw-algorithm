<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_penilaian')->insert([
            'id'=>1,
            'id_alternatif'=>1,
            'id_kriteria'=>1,
            'id_subkriteria'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>2,
            'id_alternatif'=>1,
            'id_kriteria'=>2,
            'id_subkriteria'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>3,
            'id_alternatif'=>1,
            'id_kriteria'=>3,
            'id_subkriteria'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>4,
            'id_alternatif'=>1,
            'id_kriteria'=>4,
            'id_subkriteria'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>5,
            'id_alternatif'=>1,
            'id_kriteria'=>5,
            'id_subkriteria'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);
        DB::table('tb_penilaian')->insert([
            'id'=>6,
            'id_alternatif'=>1,
            'id_kriteria'=>6,
            'id_subkriteria'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>7,
            'id_alternatif'=>1,
            'id_kriteria'=>7,
            'id_subkriteria'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>8,
            'id_alternatif'=>1,
            'id_kriteria'=>8,
            'id_subkriteria'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);
            
        DB::table('tb_penilaian')->insert([
            'id'=>9,
            'id_alternatif'=>1,
            'id_kriteria'=>9,
            'id_subkriteria'=>3,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);

        DB::table('tb_penilaian')->insert([
            'id'=>10,
            'id_alternatif'=>1,
            'id_kriteria'=>10,
            'id_subkriteria'=>2,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ]);
    }
}
