<?php

namespace App\Http\Controllers;

use App\Models\Shu;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\ProfilBumdes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ShuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            $namaKab = Kabupaten::pluck('nama', 'id');
            $kabupaten = $request->get('namaKab');
            $kecamatan = $request->get('namaKec');
            $tahun = $request->get('tahun');
            $bulan = $request->get('bulan');
            if (!empty($kabupaten) && !empty($kecamatan) && !empty($tahun) && !empty($bulan)){
                $shu = Shu::whereYear('tanggal', "$tahun")->whereMonth('tanggal', "$bulan")->select('bumdes_id','tanggal','nilai')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->get();
                $nilai = Shu::whereYear('tanggal', "$tahun")->whereMonth('tanggal', "$bulan")->select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->sum("nilai");
                $jumlah = Shu::whereYear('tanggal', "$tahun")->whereMonth('tanggal', "$bulan")->select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->selectRaw('count(bumdes_id)')->groupBy('bumdes_id')->count();
            }
            elseif (!empty($kabupaten) && !empty($kecamatan) && !empty($tahun)){
                $shu = Shu::whereYear('tanggal', "$tahun")->select('bumdes_id','tanggal','nilai')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->get();
                $nilai = Shu::whereYear('tanggal', "$tahun")->select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->sum("nilai");
                $jumlah = Shu::whereYear('tanggal', "$tahun")->select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->selectRaw('count(bumdes_id)')->groupBy('bumdes_id')->count();
            }
            elseif (!empty($kabupaten) && !empty($kecamatan)){
                $shu = Shu::select('bumdes_id','tanggal','nilai')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->get();
                $nilai = Shu::select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->sum("nilai");
                $jumlah = Shu::select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
                ->where('kecamatan_id', "$kecamatan")->selectRaw('count(bumdes_id)')->groupBy('bumdes_id')->count();
            }
            else{
                $shu = Shu::All();
                $nilai = "0";
                $jumlah = "0";
            }
            return view('shu.show', compact('namaKab','shu','nilai','jumlah'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    public function cari($id)
    {
        $namaKec = Kecamatan::where('kabupaten_id', "$id")
            ->pluck('nama', 'id');
            return json_encode($namaKec);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('errors.404', [abort(404)], 404);
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
            $shu = Shu::updateOrCreate(
                ['id' => $request->shu_id],
                [
                    'bumdes_id' => $request->bumdes_id,
                    'nilai' => $request->nilai,
                    'tanggal' => Carbon::parse($request->tanggal)->format('d-m-Y'),
                ]
            );
            return response()->json($shu);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (Auth::user()->hasRole('bumdes')){
            if ($request->ajax()) {
                $data = Shu::where('bumdes_id', "$id")->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editShu"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteShu"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
            return view('shu.index');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('bumdes')){
            $shu = Shu::find($id);
            return response()->json($shu);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shu $shu)
    {
        return response()->view('errors.404', [abort(404)], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('bumdes')){
            $shu = Shu::find($id);
            $shu->delete();
            return response()->json($shu);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
