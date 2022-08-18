<?php

namespace App\Http\Controllers;

use App\Models\penilaian;
use App\Models\alternatif;
use App\Models\subkriteria;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenilaianController extends Controller
{
    public function index()
    {
        $data['title'] = 'penilaian';
        $dtPenilaian = penilaian::all();
        return view('penilaian.index', compact('dtPenilaian'));
    }

    public function create()
    {
        $data['alternatif'] = alternatif::all();
        $data['kriteria'] = kriteria::all();
        $data['subkriteria'] = subkriteria::all();
        return view('penilaian.create',$data); 
    }

    public function store(Request $request)
    {
        $request ->validate([
            'id_alternatif' => 'required'
        ]);

        $data = [];
        $len = count($request->id_subkriteria);
        for ($i=1; $i <= $len; $i++) { 
            $temp = [];
            $temp['id_alternatif'] = $request->id_alternatif;
            $temp['id_kriteria'] = $request->id_kriteria[$i];
            $temp['id_subkriteria'] = $request->id_subkriteria[$i];
            array_push($data, $temp);
        }
        penilaian::insert($data);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function show($id)
    {
        $data['id'] = $id;     
        $table = new penilaian;
        $data['data'] = $table->OneData($id);
        return view('penilaian.show', $data);
    }

    public function destroy(Request $request)
    {
        penilaian::where('id_alternatif',$request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = new penilaian;
        return DataTables::of($table->AllData())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_show = '<button type="button" class="btn btn-sm btn-success" id="show" data-id="' . $row->id_alternatif . '"><i class="fas fa-eye"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id_alternatif . '" data-Text="' . $row->nama_dosen . '"><i class="fas fa-trash"></i></button>';

                $btn = '<div class="btn-group" role="group" aria-label="LihatData">' .
                    $btn_show .
                    $btn_hapus .
                    '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
