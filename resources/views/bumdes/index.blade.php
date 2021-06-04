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
                <div>Daftar Bumdes di {{$kecamatan->nama}}
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
                    <a class="btn btn-danger" href="{{route('kecamatan.show', $kecamatan->kabupaten_id)}}"><i class="metismenu-icon pe-7s-prev"></i> Kembali</a>        
                    </div>
                    <div class="btn-actions-pane-right">
                    <a class="btn btn-success" href="{{route('bumdes.create', $kecamatan->id)}}"><i class="metismenu-icon pe-7s-note"></i> Tambah Bumdes</a>    
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bumdes">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Bumdes</th>
                                        <th>Alamat</th>
                                        <th>Desa</th>
                                        <th>Telepon</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Aksi</th>
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
@include('js.bumdes')      
@endsection