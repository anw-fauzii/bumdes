<?php

namespace App\Http\Controllers;

use App\Models\ProfilBumdes;
use App\Models\JenisUsahaBumdes;
use App\Models\JenisUsaha;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use DataTables;

class ProfilBumdesController extends Controller
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
        $kecamatan = Kecamatan::findOrFail($id);
        $jenis = JenisUsaha::orderBy('nama','ASC')->get();
        return view('bumdes.create',compact('kecamatan','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bumdes = new ProfilBumdes; 
        $bumdes->nama = $request->nama;
        $bumdes->alamat = $request->alamat;
        $bumdes->desa = $request->desa;
        $bumdes->lat = $request->lat;
        $bumdes->long = $request->long;
        $bumdes->kabupaten_id = $request->kabupaten_id;
        $bumdes->kecamatan_id = $request->kecamatan_id;
        $bumdes->telepon = $request->telepon;
        $bumdes->foto1 = $request->foto1;
        $bumdes->foto2 = $request->foto2;
        $bumdes->foto3 = $request->foto3;
        $bumdes->save();
        $bumdes->jenis()->attach($request->jenis_id);

        $kecamatan = Kecamatan::find($request->get('kecamatan_id'));


        return redirect()->route('bumdes.show', $kecamatan)->with('sukses','Bumdes Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        if ($request->ajax()) {
            $data = ProfilBumdes::with('jenis')->selectRaw('distinct profil_bumdes.*')->where('kecamatan_id', "$id")->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('usaha', function ($data) {
                        return implode(', ', $data->jenis->pluck('nama')->toArray());
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('bumdes.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editBumdes"><i class="metismenu-icon pe-7s-pen"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBumdes"><i class="metismenu-icon pe-7s-trash"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('bumdes.index',compact('kecamatan'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisTerpilih =[];
        $bumdes = ProfilBumdes::findOrFail($id);
        $jenisTerpilih = $bumdes->jenis->pluck('id')->toArray();
        $jenis = JenisUsaha::orderBy('nama','ASC')->get();
        return view('bumdes.edit',compact('bumdes','jenis','jenisTerpilih'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bumdes = ProfilBumdes::findOrFail($id);
        $bumdes->update($request->all());
        $bumdes->jenis()->detach($request->jenis_id);
        $kecamatan = Kecamatan::find($request->get('kecamatan_id'));
        return redirect()->route('bumdes.show', $kecamatan)->with('sukses','Bumdes Berhasil Dipdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bumdes = ProfilBumdes::find($id);
        $bumdes->delete();
        return response()->json($bumdes);
    }
}
