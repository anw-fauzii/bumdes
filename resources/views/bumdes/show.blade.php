@extends('layouts.app')

@section('title')
    <title>Profil</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Profil Bumdes
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
                    <div class="card-header-title">
                        <div class="btn-actions-pane-left">
                        <a class="btn btn-info" href="{{route('bumdes.edit', Auth::user()->profil_bumdes_id)}}"><i class="metismenu-icon pe-7s-note2"></i> Update Profil</a>        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td width="15%">Nama Bumdes</td>
                                        <td width="2%">:</td>
                                        <td width="35%">{{ $bumdes->nama }}</td>
                                        <td class="text-center" rowspan="7">
                                            <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{asset('storage/'. $bumdes->foto1)}}" alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="{{asset('storage/'. $bumdes->foto2)}}" alt="Second slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="{{asset('storage/'. $bumdes->foto3)}}" alt="Third slide">
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>email</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>{{ $bumdes->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $bumdes->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Usaha</td>
                                        <td>:</td>
                                        <td>
                                        @foreach ($bumdes->jenis as $jenis)
                                            {{ $jenis->nama }},
                                        @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Latitude</td>
                                        <td>:</td>
                                        <td>{{ $bumdes->lat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Longitude</td>
                                        <td>:</td>
                                        <td>{{ $bumdes->long }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@endsection