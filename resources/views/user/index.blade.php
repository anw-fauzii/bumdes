@extends('layouts.app')

@section('title')
    <title>User</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>User</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <a class="btn btn-success" href="javascript:void(0)" id="createUser"><i class="metismenu-icon pe-7s-note"></i> Tambah User</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-user">
                                <thead>
                                    <tr class="text-center">
                                        <th width="8%">No</th>
                                        <th width="17%">Nama</th>
                                        <th width="20%">Email</th>
                                        <th width="15%">Hak Akses</th>
                                        <th width="10%">Status</th>
                                        <th width="15%">Terakhir Aktif</th>
                                        <th width="15%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@include('user.create')
@include('js.user')      
@endsection