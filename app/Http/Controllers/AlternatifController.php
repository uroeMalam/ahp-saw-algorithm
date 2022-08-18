<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AlternatifController extends Controller
{
    public function index()
    {
        $data['title'] = 'alternatif';
        $dtAlternatif = alternatif::all();
        return view('alternatif.index', compact('dtAlternatif'));
    }

    public function create()
    {
        $data['title'] = 'alternatif';
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        alternatif::create([
            'nama_dosen' => $request->nama_dosen,
        ]);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }


    public function edit($id)
    {
        $data['id'] = $id;
        $data['data'] = alternatif::where('id', $id)->first();
        return view('alternatif.edit', $data);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'nama_dosen' => 'required',
        ]);
        alternatif::where('id', $request->id)->update($validateData);
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

   
    public function destroy(Request $request)
    {
        alternatif::findOrFail($request->id)->delete();
        return response()->json(['status' => true, 'message' => 'berhasil']);
    }

    public function DataTable()
    {
        $table = alternatif::select('*');
        return DataTables::of($table)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn_edit = '<button type="button" class="btn btn-sm btn-info" id="edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>';
                $btn_hapus = '<button type="button" class="btn btn-sm btn-danger" id="hapusData" data-id="' . $row->id . '" data-Text="' . $row->nama_dosen . '"><i class="fas fa-trash"></i></button>';

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
