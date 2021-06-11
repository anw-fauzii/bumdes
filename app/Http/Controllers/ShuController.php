<?php

namespace App\Http\Controllers;

use App\Models\Shu;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\ProfilBumdes;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $namaKab = Kabupaten::pluck('nama', 'id');
        $kabupaten = $request->get('namaKab');
        $kecamatan = $request->get('namaKec');
        $tahun = $request->get('tahun');
        $bulan = $request->get('bulan');
        if (!empty($kabupaten) && !empty($kecamatan) && !empty($tahun) && !empty($bulan)){
            $shu = Shu::whereYear('tanggal', "$tahun")->whereMonth('tanggal', "$bulan")->select('bumdes_id','tanggal','nilai')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
            ->where('kecamatan_id', "$kecamatan")->get();
            $nilai = Shu::select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
            ->where('kecamatan_id', "$kecamatan")->sum("nilai");
            $jumlah = Shu::select('bumdes_id')->join('profil_bumdes' ,'shu.bumdes_id','=','profil_bumdes.id')
            ->where('kecamatan_id', "$kecamatan")->selectRaw('count(bumdes_id)')->groupBy('bumdes_id')->count();
        }
        elseif (!empty($kabupaten)){
            $shu = ProfilBumdes::with('shu')->where('kabupaten_id', "$kabupaten")->get();
        }
        elseif (!empty($kecamatan)){
            $shu = ProfilBumdes::where('kecamatan_id', "$kecamatan")->get();
        }
        else{
            $shu = Shu::All();
            $nilai = "0";
            $jumlah = "0";
        }
        return view('shu.show', compact('namaKab','shu','nilai','jumlah'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $bumdes = ProfilBumdes::findOrFail($id);
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
        return view('shu.index', compact('bumdes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shu = Shu::find($id);
        return response()->json($shu);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shu  $shu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shu = Shu::find($id);
        $shu->delete();
        return response()->json($shu);
    }
}
