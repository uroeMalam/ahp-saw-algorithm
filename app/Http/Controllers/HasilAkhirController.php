<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\kriteria;
use App\Models\penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class HasilAkhirController extends Controller
{
    public function index()
    {
        $data['kriteria'] = kriteria::all();
        $data['data'] = alternatif::all();
        $data['isi'] = penilaian::select('tb_penilaian.*','tb_subkriteria.bobot')->join('tb_subkriteria', 'tb_subkriteria.id', '=', 'tb_penilaian.id_subkriteria')->get();

        // ngambil data normalisasi
        $data['normalisasi'] = DB::select('SELECT get_bobot.*,tb_subkriteria.bobot FROM (SELECT tb_penilaian.id,tb_penilaian.id_alternatif,tb_penilaian.id_kriteria,tb_penilaian.id_subkriteria,get_maxmin.jenis,get_maxmin.max_data,get_maxmin.min_data FROM `tb_penilaian` JOIN (SELECT tb_kriteria.id,tb_kriteria.kode_kriteria,tb_kriteria.nama_kriteria,tb_kriteria.jenis,maxmin.* FROM `tb_kriteria` JOIN (SELECT id_kriteria,MAX(bobot) AS max_data, MIN(bobot) AS min_data FROM `tb_subkriteria` GROUP BY id_kriteria) AS maxmin ON maxmin.id_kriteria = tb_kriteria.id) as get_maxmin ON get_maxmin.id = tb_penilaian.id_kriteria) as get_bobot join tb_subkriteria on tb_subkriteria.id = get_bobot.id_subkriteria');

        // ngambil data ahp
        $data['hasil'] = DB::select('SELECT tb_kriteria.*,toJoin.vector,toJoin.bobot as bobot_total FROM (SELECT hasil.*,(hasil.vector / hasil.total) as bobot FROM (SELECT get_vektor.id_kriteria_b,SUM(get_vektor.eigen) AS vector, COUNT(id_kriteria_a) as total FROM (SELECT *, (bobot/total) AS eigen FROM (SELECT tb_nilaiahp.*,a.total from (SELECT id_kriteria_a,SUM(bobot) as total FROM `tb_nilaiahp` GROUP BY id_kriteria_a) a JOIN tb_nilaiahp ON tb_nilaiahp.id_kriteria_a = a.id_kriteria_a) get_eigen) get_vektor GROUP BY get_vektor.id_kriteria_b) hasil) toJoin JOIN tb_kriteria ON tb_kriteria.id = toJoin.id_kriteria_b');

        return view('hasilAkhir.index', $data);
    }
}
