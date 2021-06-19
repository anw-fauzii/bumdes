@extends('layouts.app')

@section('title')
    <title>Akun</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-settings icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Ubah Password</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    Ubah PAssword
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('put')
                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Password Lama</label>
                                <div class="col-sm-9"><input placeholder="Masukan Password Lama" type="password" name="old_password" class="form-control">
                                    </div>
                            </div>
                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Password Baru</label>
                                <div class="col-sm-9"><input placeholder="Masukan Password Baru" type="password" name="new_password" class="form-control">
                                    </div>
                            </div>
                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Konfirmasi Password Baru</label>
                                <div class="col-sm-9"><input placeholder="Masukan Konfirmasi Password Baru" type="password" name="confirm_password" class="form-control">
                                    </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-sm">
                                    <i class="pe-7s-paper-plane"></i> Simpan
                                </button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>      
@endsection
