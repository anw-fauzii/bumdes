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
            $bumdes = ProfilBumdes::where("rtrw", NULL)->where("user_id",Auth::user()->id)
            ->join('users','bumdes.user_id','=','users.id')->first();
            if($bumdes){
                $namaKab = Kabupaten::pluck('nama', 'id');
                $namaKec = Kecamatan::pluck('nama', 'id');
                return view('bumdes.edit',compact('bumdes','namaKab','namaKec'));
            }
            $user="Bumdes";
        }
        else{
            $user="Admin";
        }
    	return view('dashboard', compact('user'));
    }

    public function home(Request $request){
        $bumdes = User::role('bumdes')->join('foto','users.id','=','foto.user_id')
        ->join('bumdes','bumdes.user_id','=','users.id')
        ->get();
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
