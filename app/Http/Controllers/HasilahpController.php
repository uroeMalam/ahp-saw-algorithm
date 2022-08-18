<?php

namespace App\Http\Controllers;

use App\Models\nilaiahp;
use App\Models\kriteria;
use Illuminate\Support\Facades\DB;

class HasilahpController extends Controller
{
    public function index()
    {
        $data['data'] = kriteria::all();

        $data['nilai'] = DB::select('SELECT *, (bobot/total) AS eigen FROM (SELECT tb_nilaiahp.*,a.total from (SELECT id_kriteria_a,SUM(bobot) as total FROM `tb_nilaiahp` GROUP BY id_kriteria_a) a JOIN tb_nilaiahp ON tb_nilaiahp.id_kriteria_a = a.id_kriteria_a) get_eigen');

        $data['hasil'] = DB::select('SELECT tb_kriteria.*,toJoin.vector,toJoin.bobot as bobot_total FROM (SELECT hasil.*,(hasil.vector / hasil.total) as bobot FROM (SELECT get_vektor.id_kriteria_b,SUM(get_vektor.eigen) AS vector, COUNT(id_kriteria_a) as total FROM (SELECT *, (bobot/total) AS eigen FROM (SELECT tb_nilaiahp.*,a.total from (SELECT id_kriteria_a,SUM(bobot) as total FROM `tb_nilaiahp` GROUP BY id_kriteria_a) a JOIN tb_nilaiahp ON tb_nilaiahp.id_kriteria_a = a.id_kriteria_a) get_eigen) get_vektor GROUP BY get_vektor.id_kriteria_b) hasil) toJoin JOIN tb_kriteria ON tb_kriteria.id = toJoin.id_kriteria_b');

        return view('hasilahp.index', $data);
    }
}
