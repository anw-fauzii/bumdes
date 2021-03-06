@extends('layouts.app')

@section('title')
    <title>Kabupaten</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-culture icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Kabupaten </h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <a class="btn btn-success" href="javascript:void(0)" id="createKab"><i class="metismenu-icon pe-7s-note"></i> Tambah Kabupaten</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-kabupaten">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">No</th>
                                        <th width="15%">Kabupaten</th>
                                        <th width="25%">Jumlah Kecamatan</th>
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
@include('js.kabupaten')
@include('kabupaten.create')      
@endsection