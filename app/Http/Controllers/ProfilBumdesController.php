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
            $kec = NULL;
            if ($request->ajax()) {
                $data = User::role('bumdes')->join('bumdes','bumdes.user_id','=','users.id')->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('nama', function($data){
                            if($data->nama != NULL){
                                return $data->nama;
                            }else{
                                return "Belum Diupdate";
                            }
                        })
                        ->addColumn('kecamatan', function($data){
                            if($data->kecamatan_id != NULL){
                                return $data->kecamatan->nama;
                            }else{
                                return "Belum Diupdate";
                            }
                        })
                        ->addColumn('desa', function($data){
                            if($data->desa != NULL){
                                return $data->desa;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('lat', function($data){
                            if($data->lat != NULL){
                                return $data->lat;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('long', function($data){
                            if($data->long != NULL){
                                return $data->long;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('status', function($data){
                            if($data->status != NULL){
                                return $data->status;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('usaha', function ($data) {
                            if($data->jenis_usaha != NULL){
                                return json_decode($data->jenis_usaha);
                            }else{
                                return "Belum Diupdate";
                            } 
                        })
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBumdes"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
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
        $kec = Kecamatan::find($id);
        if (Auth::user()->hasRole('admin')){
            if ($request->ajax()) {
                $data = User::role('bumdes')->join('bumdes','bumdes.user_id','=','users.id')->where('kecamatan_id', "$id")->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('nama', function($data){
                            if($data->nama != NULL){
                                return $data->nama;
                            }else{
                                return "Belum Diupdate";
                            }
                        })
                        ->addColumn('kecamatan', function($data){
                            if($data->kecamatan_id != NULL){
                                return $data->kecamatan->nama;
                            }else{
                                return "Belum Diupdate";
                            }
                        })
                        ->addColumn('desa', function($data){
                            if($data->desa != NULL){
                                return $data->desa;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('lat', function($data){
                            if($data->lat != NULL){
                                return $data->lat;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('long', function($data){
                            if($data->long != NULL){
                                return $data->long;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('status', function($data){
                            if($data->status != NULL){
                                return $data->status;
                            }else{
                                return "Belum Diupdate";
                            }  
                        })
                        ->addColumn('usaha', function ($data) {
                            if($data->jenis_usaha != NULL){
                                return json_decode($data->jenis_usaha);
                            }else{
                                return "Belum Diupdate";
                            } 
                        })
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBumdes"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
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
            $bumdes = ProfilBumdes::where("user_id",Auth::user()->id)
            ->join('users','bumdes.user_id','=','users.id')->first();
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
            $bumdes = ProfilBumdes::where('user_id', Auth::user()->id)->first();
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
            $bumdes->save();
            $user = User::findOrFail(Auth::user()->id);
            $user->nama = $request->nama;
            $user->email = $request->email;
            if($request->file('logo')){
                if($user->logo && file_exists(storage_path('app/public/' . $user->logo))){
                    \Storage::delete('public/'.$user->logo);
                    }
                $file = $request->file('logo')->store('Logo', 'public');
                $user->logo = $file;
            }
            $user->save();
            return redirect()->route('profil')->with('sukses','Bumdes Berhasil Dipdate');
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
            $bumdes = User::with('bumdes')->join('bumdes','bumdes.user_id','=','users.id')->find(Auth::user()->id);
            $bumdes_foto = Foto::where('user_id', Auth::user()->id)->first();
            return view('bumdes.show', compact('bumdes', 'bumdes_foto'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
