<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfilBumdes;
use App\Models\JenisUsaha;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Carbon;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')){
            if ($request->ajax()) {
                $data = User::all();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('role', function($data){
                            return json_decode($data->getRoleNames());
                        })
                        ->addColumn('status', function($data){
                            if (Cache::has('is_online'.$data->id)){
                               $status = '<div class="badge badge-success">Online</div>';
                               return $status;
                            }
                            else{
                                $status = '<div class="badge badge-danger">Offline</div>';
                               return $status;
                            }
                        })
                        ->addColumn('last_seen', function($data){
                            $lastSeen = Carbon::parse($data->last_seen);
                            return $lastSeen;
                        })
                        ->addColumn('action', function($row){
                               $btn = '<a href="javascript:void(0)" data-toggle="tooltip" title="Edit" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm editUser"><i class="metismenu-icon pe-7s-pen"></i></a>';
                               $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip" title="Hapus" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="metismenu-icon pe-7s-trash"></i></a>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','status'])
                        ->make(true);
            }
            return view('user.index');
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
        if (Auth::user()->hasRole('admin')){
            $user = User::updateOrCreate(
                ['id' => $request->user_id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make("12345678")
                ]
            );
            $user->assignRole('admin');
            return response()->json($user);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if (Auth::user()->hasRole('bumdes')){
            $bumdes = User::find(Auth::user()->id);
            return view('bumdes.show', compact('bumdes'));
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasRole('bumdes')){
            $user = User::find($id);
            return view('user.edit');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->hasRole('bumdes')){
            $request->validate([
                'old_password' => ['required', new MatchOldPassword],
                'new_password' => ['required'],
                'confirm_password' => ['same:new_password']
            ]);
            $bumdes = User::findOrFail(Auth::user()->id);
            $bumdes->password = Hash::make($request->new_password);
            $bumdes->save();
            Auth::login($bumdes);
            return redirect()->route('profil', $bumdes)->with('sukses','Password Berhasil Dipdate');
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasRole('admin')){
            $user = User::find($id);
            $user->delete();
            return response()->json($user);
        }
        else{
            return response()->view('errors.403', [abort(403)], 403);
        }
    }
}
