<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class penilaian extends Model
{
    use HasFactory;
    use Timestamp;
    use SoftDeletes;

    protected $table = 'tb_penilaian';
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_alternatif', 'id_kriteria', 'id_subkriteria'
    ];

    public function AllData()
    {
        return DB::table($this->table)
                    ->select(
                        'tb_penilaian.id',
                        'tb_penilaian.id_alternatif',
                        'tb_alternatif.nama_dosen',
                        'tb_kriteria.nama_kriteria',
                        'tb_subkriteria.nama_subkriteria',
                        )
                    ->join('tb_alternatif', 'tb_penilaian.id_alternatif', '=', 'tb_alternatif.id')
                    ->join('tb_kriteria', 'tb_penilaian.id_kriteria', '=', 'tb_kriteria.id')
                    ->join('tb_subkriteria', 'tb_penilaian.id_subkriteria', '=', 'tb_subkriteria.id')
                    ->where('tb_penilaian.deleted_at', null)
                    ->groupBy('tb_penilaian.id_alternatif')
                    ->get();
    }

    public function OneData($id)
    {
        return DB::table($this->table)
                    ->select(
                        'tb_penilaian.id',
                        'tb_penilaian.id_alternatif',
                        'tb_alternatif.nama_dosen',
                        'tb_kriteria.kode_kriteria',
                        'tb_kriteria.nama_kriteria',
                        'tb_subkriteria.nama_subkriteria',
                        )
                    ->join('tb_alternatif', 'tb_penilaian.id_alternatif', '=', 'tb_alternatif.id')
                    ->join('tb_kriteria', 'tb_penilaian.id_kriteria', '=', 'tb_kriteria.id')
                    ->join('tb_subkriteria', 'tb_penilaian.id_subkriteria', '=', 'tb_subkriteria.id')
                    ->where('tb_penilaian.deleted_at', null)
                    ->where('tb_penilaian.id_alternatif', $id)
                    ->get();
    }
}
