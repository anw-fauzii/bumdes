@extends('layouts.app')

@section('title')
    <title>Kecamatan</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-culture icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Daftar Kecamatan @if($kab != NULL) {{$kab->nama}} @endif </h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                 <a class="btn btn-success" href="javascript:void(0)" id="createKab"><i class="metismenu-icon pe-7s-note"></i> Tambah Kecamatan</a>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-kecamatan">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">No</th>
                                        <th width="15%">Kecamatan</th>
                                        <th width="25%">Jumlah Bumdes</th>
                                        <th width="20%">Latitude</th>
                                        <th width="20%">Longitude</th>
                                        <th width="10%">Aksi</th>
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
@include('js.kecamatan')
@include('kecamatan.create')      
@endsection