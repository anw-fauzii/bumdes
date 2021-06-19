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
                <div>Daftar Bumdes
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
                    <a class="btn btn-success" href="{{route('bumdes.create')}}"><i class="metismenu-icon pe-7s-note"></i> Tambah Bumdes</a>        
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
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Jenis Usaha</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Status</th>
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