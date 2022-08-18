<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_kriteria')->insert([
            'id'=>1,
            'kode_kriteria'=>'C01',
            'nama_kriteria'=>'Absensi',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:08',
            'updated_at'=>'2022-07-10 09:06:08',
            'deleted_at'=>NULL
            ] );
                        
        DB::table('tb_kriteria')->insert([
            'id'=>2,
            'kode_kriteria'=>'C02',
            'nama_kriteria'=>'Kinerja',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:27',
            'updated_at'=>'2022-07-10 09:06:27',
            'deleted_at'=>NULL
            ] );
                        
        DB::table('tb_kriteria')->insert([
            'id'=>3,
            'kode_kriteria'=>'C03',
            'nama_kriteria'=>'Prestasi',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:37',
            'updated_at'=>'2022-07-10 09:06:37',
            'deleted_at'=>NULL
            ] );
                        
        DB::table('tb_kriteria')->insert([
            'id'=>4,
            'kode_kriteria'=>'C04',
            'nama_kriteria'=>'Akademik',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );
        DB::table('tb_kriteria')->insert([
            'id'=>5,
            'kode_kriteria'=>'C05',
            'nama_kriteria'=>'Kreatifitas',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );
        DB::table('tb_kriteria')->insert([
            'id'=>6,
            'kode_kriteria'=>'C06',
            'nama_kriteria'=>'Pengalaman',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );

        DB::table('tb_kriteria')->insert([
            'id'=>7,
            'kode_kriteria'=>'C07',
            'nama_kriteria'=>'Kompetensi',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );

        DB::table('tb_kriteria')->insert([
            'id'=>8,
            'kode_kriteria'=>'C08',
            'nama_kriteria'=>'Konsistensi',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );

        DB::table('tb_kriteria')->insert([
            'id'=>9,
            'kode_kriteria'=>'C09',
            'nama_kriteria'=>'Pengabdian',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );

        DB::table('tb_kriteria')->insert([
            'id'=>10,
            'kode_kriteria'=>'C10',
            'nama_kriteria'=>'Kedisiplinan',
            'bobot'=>NULL,
            'jenis'=>'Benefit',
            'keterangan'=>NULL,
            'created_at'=>'2022-07-10 09:06:48',
            'updated_at'=>'2022-07-10 09:06:48',
            'deleted_at'=>NULL
            ] );
        
    }
}
