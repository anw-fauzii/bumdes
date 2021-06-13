<?php

namespace App\Http\Controllers;

use App\Models\ProfilBumdes;
use App\Models\JenisUsahaBumdes;
use App\Models\JenisUsaha;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfilBumdesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        if (Auth::user()->hasRole('bumdes')){
            $jenis =[];
            $id = Auth::user()->profil_bumdes_id;
            $bumdes = ProfilBumdes::find("$id");
            $jenis = $bumdes->jenis->pluck('nama')->toArray();
            return view('bumdes.show', compact('bumdes','jenis'));
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
    public function create($id)
    {
        if (Auth::user()->hasRole('admin')){
            $kecamatan = Kecamatan::findOrFail($id);
            $jenis = JenisUsaha::orderBy('nama','ASC')->get();
            return view('bumdes.create',compact('kecamatan','jenis'));
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
    
            $id_bumdes = ProfilBumdes::max('id');
            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make("12345678");
            $user->profil_bumdes_id = "$id_bumdes";
            $user->assignRole('bumdes');
            $user->save();
    
            $kecamatan = Kecamatan::find($request->get('kecamatan_id'));
    
            return redirect()->route('bumdes.show', $kecamatan)->with('sukses','Bumdes Berhasil Disimpan');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (Auth::user()->hasRole('admin')){
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
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('bumdes')){
            $jenisTerpilih =[];
            $bumdes = ProfilBumdes::findOrFail($id);
            $jenisTerpilih = $bumdes->jenis->pluck('id')->toArray();
            $jenis = JenisUsaha::orderBy('nama','ASC')->get();
            return view('bumdes.edit',compact('bumdes','jenis','jenisTerpilih'));  
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
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
        if (Auth::user()->hasRole('bumdes')){
            $bumdes = ProfilBumdes::findOrFail($id);
            $bumdes->nama = $request->get('nama');
            $bumdes->kabupaten_id = $request->get('kabupaten_id');
            $bumdes->kecamatan_id = $request->get('kecamatan_id');
            $bumdes->alamat = $request->get('alamat');
            $bumdes->desa = $request->get('desa');
            $bumdes->telepon = $request->get('telepon');
            $bumdes->lat = $request->get('lat');
            $bumdes->long = $request->get('long');
            if($request->file('foto1')){
                if($bumdes->foto1 && file_exists(storage_path('app/public/' . $bumdes->foto1))){
                    \Storage::delete('public/'.$bumdes->foto1);
                    }
                $file1 = $request->file('foto1')->store('Foto', 'public');
                $bumdes->foto1 = $file1;
            }
            if($request->file('foto2')){
                if($bumdes->foto2 && file_exists(storage_path('app/public/' . $bumdes->foto2))){
                    \Storage::delete('public/'.$bumdes->foto2);
                    }
                $file1 = $request->file('foto2')->store('Foto', 'public');
                $bumdes->foto2 = $file1;
            }            
            if($request->file('foto3')){
                if($bumdes->foto3 && file_exists(storage_path('app/public/' . $bumdes->foto3))){
                    \Storage::delete('public/'.$bumdes->foto3);
                    }
                $file1 = $request->file('foto3')->store('Foto', 'public');
                $bumdes->foto3 = $file1;
            } 
            $bumdes->save();
            $id_user = Auth::user()->id;
            $user=User::findOrFail("$id_user");
            if($request->file('logo')){
                if($user->profile_photo_path && file_exists(storage_path('app/public/' . $user->profile_photo_path))){
                    \Storage::delete('public/'.$user->logo);
                    }
                $file1 = $request->file('logo')->store('Logo', 'public');
                $user->profile_photo_path = $file1;
            } 
            $user->save();
            if(isset($request->jenis_id)){
                $bumdes->jenis()->sync($request->jenis_id);
            } else{
                $bumdes->jenis()->sync(array());
            }
            return redirect()->route('profil', $bumdes)->with('sukses','Bumdes Berhasil Dipdate');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilBumdes  $profilBumdes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $bumdes = ProfilBumdes::find($id);
            $bumdes->delete();
            return response()->json($bumdes);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
