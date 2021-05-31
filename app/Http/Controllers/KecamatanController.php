<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        return view('kecamatan.create',compact('kabupaten'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = Kecamatan::create($request->all());
        $kabupaten = Kabupaten::find($request->get('kabupaten_id'));
        return redirect()->route('kecamatan.show', $kabupaten)->with('sukses','Kecamatan Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        if ($request->ajax()) {
            $data = Kecamatan::where('kabupaten_id', "$id")->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('kecamatan.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editKecamatan"><i class="metismenu-icon pe-7s-pen"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKecamatan"><i class="metismenu-icon pe-7s-trash"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('kecamatan.index',compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.edit',compact('kecamatan'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->update($request->all());
        $kabupaten = Kabupaten::find($request->get('kabupaten_id'));
        return redirect()->route('kecamatan.show', $kabupaten)->with('sukses','Kecamatan Berhasil Dipdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return response()->json($kecamatan);
    }
}
