<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBumdes;
use App\Models\JenisUsaha;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    
    public function index()
    {
        $year = ['2015','2016','2017','2018','2019','2020','2021'];

        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }

    	return view('dashboard')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
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
