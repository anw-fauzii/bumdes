@extends('layouts.app')

@section('title')
    <title>Jenis Usaha</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-server icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Jenis Usaha</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                    <a class="btn btn-success" href="javascript:void(0)" id="createJenis"><i class="metismenu-icon pe-7s-note"></i> Tambah Jenis Usaha</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-jenis">
                                <thead>
                                    <tr class="text-center">
                                        <th width="15%">No</th>
                                        <th width="70%">Jenis Usaha</th>
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
@include('jenisUsaha.create')
@include('js.jenis')      
@endsection