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
        return response()->view('errors.404', [abort(404)], 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kabupaten = Kabupaten::findOrFail($id);
            return view('kecamatan.create',compact('kabupaten'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            $kecamatan = Kecamatan::create($request->all());
            $kabupaten = Kabupaten::find($request->get('kabupaten_id'));
            return redirect()->route('kecamatan.show', $kabupaten)->with('sukses','Kecamatan Berhasil Disimpan');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')){
            $kabupaten = Kabupaten::findOrFail($id);
            if ($request->ajax()) {
                $data = Kecamatan::with('bumdes')->where('kabupaten_id', "$id")->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('jumlah', function($data) {
                            return $data->bumdes->count();
                         })
                        ->addColumn('action', function($row){
                               $btn = '<a href="'.route('bumdes.show', $row->id).'" data-toggle="tooltip" title="Lihat Bumdes" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editKecamatan"><i class="metismenu-icon pe-7s-info"></i></a>';
                               $btn = $btn. ' <a href="'.route('kecamatan.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editKecamatan"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKecamatan"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('kecamatan.index',compact('kabupaten'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kecamatan = Kecamatan::findOrFail($id);
            return view('kecamatan.edit',compact('kecamatan'));  
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
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
        if (Auth::user()->hasRole('admin')){
            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->update($request->all());
            $kabupaten = Kabupaten::find($request->get('kabupaten_id'));
            return redirect()->route('kecamatan.show', $kabupaten)->with('sukses','Kecamatan Berhasil Dipdate');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kecamatan = Kecamatan::find($id);
            $kecamatan->delete();
            return response()->json($kecamatan);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
