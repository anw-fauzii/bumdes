<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBumdes;
use App\Models\JenisUsaha;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\User;
use App\Models\Shu;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $userData = Shu::where('bumdes_id', Auth::user()->profil_bumdes_id)->selectRaw('SUM(nilai) as total')
                    ->groupByRaw('MONTH(created_at)')
                    ->pluck('total');
        $bulan = Shu::where('bumdes_id', Auth::user()->profil_bumdes_id)->selectRaw('MONTH(created_at) as bulan')
                    ->groupByRaw('bulan')
                    ->pluck('bulan');
    	return view('dashboard',compact('userData','bulan'));
    }

    public function home(Request $request){
        $namaKab = Kabupaten::pluck('nama', 'id');
        $jenis = JenisUsaha::pluck('nama', 'id');
        $kabupaten = $request->get('kabupaten');
        $kecamatan = $request->get('kecamatan');
        if (!empty($kabupaten) && !empty($kecamatan)){
            $bumdes = ProfilBumdes::where('kecamatan_id', "$kecamatan")->get();
        }
        elseif (!empty($kabupaten)){
            $bumdes = ProfilBumdes::where('kabupaten_id', "$kabupaten")->get();
        }
        elseif (!empty($kecamatan)){
            $bumdes = ProfilBumdes::where('kecamatan_id', "$kecamatan")->get();
        }
        else{
            $bumdes = ProfilBumdes::with('jenis')->get();
        }
        return view('welcome', compact('bumdes','namaKab','jenis'));
    }

    public function store($id)
    {
        $namaKec = Kecamatan::where('kabupaten_id', "$id")
            ->pluck('nama', 'id');
            return json_encode($namaKec);
    }
}
