<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use App\Models\ProfilBumdes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            if ($request->ajax()) {
                $data = Kabupaten::with('kecamatan')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('jumlah', function($data) {
                            $btn = '<a href="'.route('kecamatan.show', $data->id).'" data-toggle="tooltip" title="Lihat Kecamatan" data-id="'.$data->id.'" data-original-title="Edit" class="btn btn-info btn-sm">Jumlah Kecamatan, '.$data->kecamatan->count().' Kecamatan</a>';
                            return $btn;
                            })
                        ->addColumn('action', function($row){
                            $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-info btn-sm editKabupaten"><i class="metismenu-icon pe-7s-pen"></i></a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKabupaten"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action', 'jumlah'])
                        ->make(true);
            }
            return view('kabupaten.index');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin')){
            return view('kabupaten.create');
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
            $kabupaten = Kabupaten::updateOrCreate(
                ['id' => $request->kabupaten_id],
                [
                    'nama' => $request->nama,
                    'lat' => $request->lat,
                    'long' => $request->long
                ]
            );
            return response()->json($kabupaten);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function show(Kabupaten $kabupaten)
    {
        return response()->view('errors.404', [abort(404)], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kabupaten = Kabupaten::find($id);
            return response()->json($kabupaten); 
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')){
            $kabupaten = Kabupaten::findOrFail($id);
            $kabupaten->update($request->all());
            return redirect('kabupaten')->with('sukses','Kabupaten Berhasil Diupdate');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabupaten  $kabupaten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kabupaten = Kabupaten::find($id);
            $kabupaten->delete();
            return response()->json($kabupaten);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
