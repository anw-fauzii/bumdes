<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilBumdes;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class HomeController extends Controller
{
    public function home(Request $request){
        $namaKab = Kabupaten::pluck('nama', 'id');
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
            $bumdes = ProfilBumdes::All();
        }
        return view('welcome', compact('bumdes','namaKab'));
    }

    public function store($id)
    {
        $namaKec = Kecamatan::where('kabupaten_id', "$id")
            ->pluck('nama', 'id');
            return json_encode($namaKec);
    }
}
