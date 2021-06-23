<?php

namespace App\Http\Controllers;

use App\Models\JenisUsaha;
use App\Models\ProfilBumdes;
use App\Models\Shu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = ProfilBumdes::where('user_id', Auth::user()->id)->first();
        $shu = Shu::where('user_id', Auth::user()->id)->get();
        return view('jenisUsaha.index', compact('user','shu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->hasRole('bumdes')){
            $user = ProfilBumdes::where('user_id', Auth::user()->id)->first();
            $user->jenis_usaha  = json_encode($request->get('nama_jenis_usaha'));
            $user->status = $request->get('status');
            $user->save();
            if (!empty($request->status)){
                $shu = Shu::create($request->all());
            }

            return redirect()->route('jenisUsaha.index')->with('sukses','Sisa Hasil Usaha Berhasil Dipdate');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function show(JenisUsaha $jenisUsaha)
    {
        return response()->view('errors.404', [abort(404)], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('admin')){
            $jenis = JenisUsaha::find($id);
            return response()->json($jenis);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
        
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
        return response()->view('errors.404', [abort(404)], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisUsaha  $jenisUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $jenis = JenisUsaha::find($id);
            $jenis->delete();
            return response()->json($jenis);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}