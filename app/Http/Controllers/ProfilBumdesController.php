<?php

namespace App\Http\Controllers;

use App\Models\ProfilBumdes;
use App\Models\JenisUsaha;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\User;
use App\Models\Foto;
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
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            $kec = User::all();
            if ($request->ajax()) {
                $data = User::role('bumdes')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('kecamatan', function($data){
                            return $data->kecamatan->nama;
                        })
                        ->addColumn('usaha', function ($data) {
                            return json_decode($data->jenis_usaha);
                        })
                        ->addColumn('action', function($row){
                               $btn = '<a href="'.route('bumdes.edit', $row->id).'" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editBumdes"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBumdes"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('bumdes.index', compact('kec'));
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
            $namaKab = Kabupaten::pluck('nama', 'id');
            return view('bumdes.create', compact('namaKab'));
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
            $bumdes = new User; 
            $bumdes->nama = $request->nama;
            $bumdes->email = $request->email;
            $bumdes->password = Hash::make("12345678");
            $bumdes->rtrw = $request->rtrw;
            $bumdes->dusun = $request->dusun;
            $bumdes->desa = $request->desa;
            $bumdes->kecamatan_id = $request->namaKec;
            $bumdes->kabupaten_id = $request->namaKab;
            $bumdes->jenis_usaha = json_decode("Belum Diupdate");
            $bumdes->perdes = $request->perdes;
            $bumdes->tahun = $request->tahun;
            $bumdes->lat = $request->lat;
            $bumdes->long = $request->long;
            $bumdes->kontak = $request->kontak;
            $bumdes->ketua = $request->ketua;
            $bumdes->status = "Tidak Aktif";
            $file = $request->file('logo')->store('Logo', 'public');
            $bumdes->logo = $file;
            $bumdes->assignRole('bumdes');
            $bumdes->save();
            
            $foto = User::max('id'); 
            $newfoto = Foto::create([
                'user_id' => $foto,
            ]); 

            $kecamatan = Kecamatan::find($request->get('namaKec'));
    
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
            $kec = User::all();
            if ($request->ajax()) {
                $data = User::where('kecamatan_id', "$id")->role('bumdes')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('kecamatan', function($data){
                            return $data->kecamatan->nama;
                        })
                        ->addColumn('usaha', function ($data) {
                            return json_decode($data->jenis_usaha);
                        })
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editUser"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('bumdes.index', compact('kec'));
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
            $bumdes = User::findOrFail(Auth::user()->id);
            $namaKab = Kabupaten::pluck('nama', 'id');
            $namaKec = Kecamatan::pluck('nama', 'id');
            return view('bumdes.edit',compact('bumdes','namaKab','namaKec'));  
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
            $bumdes = User::findOrFail(Auth::user()->id);
            $bumdes->nama = $request->nama;
            $bumdes->email = $request->email;
            $bumdes->rtrw = $request->rtrw;
            $bumdes->dusun = $request->dusun;
            $bumdes->desa = $request->desa;
            $bumdes->kecamatan_id = $request->namaKec;
            $bumdes->kabupaten_id = $request->namaKab;
            $bumdes->perdes = $request->perdes;
            $bumdes->tahun = $request->tahun;
            $bumdes->lat = $request->lat;
            $bumdes->long = $request->long;
            $bumdes->kontak = $request->kontak;
            $bumdes->ketua = $request->ketua;
            $bumdes->status = "Tidak Aktif";
            if($request->file('logo')){
                if($bumdes->logo && file_exists(storage_path('app/public/' . $bumdes->logo))){
                    \Storage::delete('public/'.$bumdes->logo);
                    }
                $file = $request->file('logo')->store('Logo', 'public');
                $bumdes->logo = $file;
            }
            $bumdes->save();
            Auth::login($bumdes);
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
            $bumdes = User::find($id);
            $bumdes->delete();
            return response()->json($bumdes);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    public function profil(Request $request)
    {
        if (Auth::user()->hasRole('bumdes')){
            $bumdes = User::find(Auth::user()->id);
            $bumdes_foto = Foto::where('user_id', Auth::user()->id)->first();
            return view('bumdes.show', compact('bumdes', 'bumdes_foto'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
