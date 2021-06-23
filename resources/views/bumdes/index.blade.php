@extends('layouts.app')

@section('title')
    <title>Bumdes</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-culture icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Daftar Bumdes @if($kec != NULL) {{$kec->nama}} @endif</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
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