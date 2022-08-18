<?php

namespace App\Http\Controllers;

use App\Models\nilaiahp;
use App\Models\kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class NilaiahpController extends Controller
{
    public function index()
    {
        // $data['title'] = 'nilaiahp';
        // $dtNilaiahp = nilaiahp::all();
        // return view('nilaiahp.index', compact('dtNilaiahp'));
        $data['data'] = kriteria::all();
        $data['nilai'] = nilaiahp::all();
        return view('nilaiahp.index', $data);
    }

    public function create()
    {
        // $data['title'] = 'nilaiahp';
        // $data['kriteria'] = kriteria::all();
        // $data['nilaiahp'] = nilaiahp::all();
        $data['data'] = kriteria::all();
        $data['nilai'] = nilaiahp::all();
        return view('nilaiahp.create',$data);
    }

    public function store(Request $request)
    {
        // $data=$request ->validate([
        //     'id_kriteria_a' => 'required',
        //     'id_kriteria_b' => 'required',
        //     'bobot' => 'required',
        // ]);

        // nilaiahp::create($data);

        $len = kriteria::all()->count() * kriteria::all()->count();
        $data = [];
        for ($i=1; $i <= $len; $i++) { 
            if ($request->input("data_$i")) {
                $temp = [];
                $temp['id_kriteria_a'] =$request->input("id_kriteria_a_$i");
                $temp['id_kriteria_b'] =$request->input("id_kriteria_b_$i");
                $temp['bobot'] =$request->input("data_$i");
                array_push($data, $temp);
            }
        }
        DB::table('tb_nilaiahp')->delete();
        nilaiahp::insert($data);
        return response()->json(['status' => true, 'message' => 'berhasil','data'=>$data]);
    }


    public function edit($id)
    {
        $data['id'] = $id;     
        $data['nilaiahp'] = nilaiahp::all();   
        $data['kriteria'] = kriteria::all();
        $data['data'] = nilaiahp::where('id', $id)->first();
        return view('nilaiahp.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'id_kriteria_a' => 'required',
            'id_kriteria_b' => 'required',
            'bobot' => 'required',
        ]);
        nilaiahp::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function destroy(Request $request)
    {
        nilaiahp::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = new nilaiahp;
        return DataTables::of($table->AllData())
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-info" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->id_kriteria_a . '" ><i class="fas fa-trash"></i></button>';

                $btn = '<div class="btn-group" role="group" aria-label="LihatData">' .
                    $btn_edit .
                    $btn_hapus .
                    '</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
