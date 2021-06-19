<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
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
    public function create()
    {
        $foto = Foto::where('user_id', Auth::user()->id)->first();
        return view('foto.create',compact('foto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);
            if($request->file('foto1')){
                if($foto->foto1 && file_exists(storage_path('app/public/' . $foto->foto1))){
                    \Storage::delete('public/'.$foto->foto1);
                    }
                $file1 = $request->file('foto1')->store('Foto', 'public');
                $foto->foto1 = $file1;
            }
            if($request->file('foto2')){
                if($foto->foto2 && file_exists(storage_path('app/public/' . $foto->foto2))){
                    \Storage::delete('public/'.$foto->foto2);
                    }
                $file2 = $request->file('foto2')->store('Foto', 'public');
                $foto->foto2 = $file2;
            }
            if($request->file('foto3')){
                if($foto->foto3 && file_exists(storage_path('app/public/' . $foto->foto3))){
                    \Storage::delete('public/'.$foto->foto3);
                    }
                $file3 = $request->file('foto3')->store('Foto', 'public');
                $foto->foto3 = $file3;
            }
            if($request->file('foto4')){
                if($foto->foto4 && file_exists(storage_path('app/public/' . $foto->foto4))){
                    \Storage::delete('public/'.$foto->foto4);
                    }
                $file4 = $request->file('foto4')->store('Foto', 'public');
                $foto->foto4 = $file4;
            }
            $foto->save();
            return redirect()->route('profil')->with('sukses','Profil Berhasil Dipdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
