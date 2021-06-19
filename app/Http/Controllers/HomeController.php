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
        if (Auth::user()->hasRole('bumdes')){
            $user="Bumdes";
        }
        else{
            $user="Admin";
        }
    	return view('dashboard', compact('user'));
    }

    public function home(Request $request){
        $bumdes = User::role('bumdes')->with('foto')->get();
        return view('welcome', compact('bumdes'));
    }

    public function store($id)
    {
        $namaKec = Kecamatan::where('kabupaten_id', "$id")
            ->pluck('nama', 'id');
            return json_encode($namaKec);
    }

    public function tentang()
    {
        return view('profile.tentang');
    }
}
