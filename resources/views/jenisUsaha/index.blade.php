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
        <div class="card-header">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a data-toggle="tab" href="#detail" class="active nav-link">Detail</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#foto" class="nav-link">Foto Bumdes</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="detail" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <img id="logo" width="80%">
                                </div>
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th width="20%">Nama Ketua</th>
                                                    <th width="2%">:</th>
                                                    <th width="48%"><span id="ketua"></span></th>
                                                </tr>
                                                <tr>
                                                    <th>Kontak Ketua</th>
                                                    <th>:</th>
                                                    <th><span id="kontak"></span></th>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>:</th>
                                                    <th><span id="email"></span></th>
                                                </tr>
                                                <tr>
                                                    <td>Titik Lokasi</td>
                                                    <td>:</td>
                                                    <td><span id="lat"></span> , <span id="long"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>SHU</td>
                                                    <td>:</td>
                                                    <td>Shu/bumdes/2020</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="foto" role="tabpanel">
                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" id="logo" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" id="foto2" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" id="foto3" alt="Third slide">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> 
    </div>
</div>
@include('jenisUsaha.create')
@include('js.jenis')      
@endsection