<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            $kab = NULL;
            $kabupaten = Kabupaten::pluck('nama','id');
            if ($request->ajax()) {
                $data = Kecamatan::with('bumdes')->orderBy('kabupaten_id')->orderBy('nama')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('jumlah', function($data) {
                            $btn = '<a href="'.route('bumdes.show', $data->id).'" data-toggle="tooltip" title="Lihat Bumdes" data-id="'.$data->id.'" data-original-title="Edit" class="btn btn-info btn-sm">Jumlah BUMDes, '.$data->bumdes->count().' Bumdes</a>';
                            return $btn;
                         })
                        ->addColumn('action', function($row){
                               $btn =' <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editKecamatan"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKecamatan"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','jumlah'])
                        ->make(true);
            }
            return view('kecamatan.index', compact('kab','kabupaten'));
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
            $kecamatan = Kecamatan::updateOrCreate(
                ['id' => $request->kecamatan_id],
                [
                    'nama' => $request->nama,
                    'kabupaten_id' => $request->kabupaten_id,
                    'lat' => $request->lat,
                    'long' => $request->long
                ]
            );
            return response()->json($kecamatan);
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
            $kecamatan = Kecamatan::updateOrCreate(
                ['id' => $request->kecamatan_id],
                [
                    'nama' => $request->nama,
                    'kabupaten_id' => $request->kabupaten_id,
                    'lat' => $request->lat,
                    'long' => $request->long
                ]
            );
            return response()->json($kecamatan);
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
            $kab = Kabupaten::findOrFail($id);
            $kabupaten = Kabupaten::pluck('nama','id');
            if ($request->ajax()) {
                $data = Kecamatan::with('bumdes')->where('kabupaten_id', "$id")->orderBy('nama')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('jumlah', function($data) {
                            $aa = '<a href="'.route('bumdes.show', $data->id).'" data-toggle="tooltip" title="Lihat Bumdes" data-id="'.$data->id.'" data-original-title="Edit" class="btn btn-info btn-sm">Jumlah BUMDes, '.$data->bumdes->count().' Bumdes</a>';
                            return $aa;
                         })
                        ->addColumn('action', function($row){
                               $btn = ' <a href="'.route('kecamatan.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editKecamatan"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteKecamatan"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','jumlah'])
                        ->make(true);
            }
            return view('kecamatan.index',compact('kab','kabupaten'));
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
            $kecamatan = Kecamatan::find($id);
            return response()->json($kecamatan); 
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
