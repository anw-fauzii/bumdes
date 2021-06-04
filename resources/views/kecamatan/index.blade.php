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
                <div>Kecamatan di {{$kabupaten->nama}}
                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="btn-actions-pane-left">
                    <a class="btn btn-danger" href="{{route('kabupaten.index')}}"><i class="metismenu-icon pe-7s-prev"></i> Kembali</a>        
                    </div>
                    <div class="btn-actions-pane-right">
                    <a class="btn btn-success" href="{{route('kecamatan.create', $kabupaten->id)}}"><i class="metismenu-icon pe-7s-note"></i> Tambah Kecamatan</a>        
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-kecamatan">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">No</th>
                                        <th width="20%">Kecamatan</th>
                                        <th width="15%">Total</th>
                                        <th width="20%">Latitude</th>
                                        <th width="20%">Longitude</th>
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
@include('js.kecamatan')      
@endsection