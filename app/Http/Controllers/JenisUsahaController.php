<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use Illuminate\Http\Request;
use DataTables;

class JenisUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JenisUsaha::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editJenisUsaha"><i class="metismenu-icon pe-7s-pen"></i></a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteJenisUsaha"><i class="metismenu-icon pe-7s-trash"></i></a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('jenisUsaha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = JenisUsaha::updateOrCreate(
            ['id' => $request->jenis_id],
            ['nama' => $request->nama]
        );
        return response()->json($jenis);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function show(JenisUsaha $jenisUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = JenisUsaha::find($id);
        return response()->json($jenis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisUsaha $jenisUsaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = JenisUsaha::find($id);
        $jenis->delete();
        return response()->json($jenis);
    }
}