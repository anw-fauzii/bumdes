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
            <div class="card-header">
                <ul class="nav nav-justified">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Profil Bumdes</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link">Foto Bumdes</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                        <div class="mb-3 mt-2 text-center">
                            <a class="btn btn-info" href="{{route('bumdes.edit', Auth::user()->id)}}"><i class="metismenu-icon pe-7s-note2"></i> Update Profil</a>
                        </div>
                        <div class="row">
                                <div class="col-md-4">
                                    @if(Auth::user()->logo == NULL)
                                    <img class="d-block w-100" src="{{asset('storage/user.png')}}" alt="First slide">
                                    @else
                                    <img class="d-block w-100" src="{{asset('storage/'. $bumdes->logo)}}" alt="First slide">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td width="15%">Nama Bumdes</td>
                                                    <td width="2%">:</td>
                                                    <td width="60%">{{ $bumdes->nama }}</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Ketua</td>
                                                    <td>:</td>
                                                    <td>{{ $bumdes->ketua }}</td>
                                                </tr>
                                                <tr>
                                                    <td>email</td>
                                                    <td>:</td>
                                                    <td>{{ $bumdes->email }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td>Desun {{ $bumdes->dusun }} RT/RW {{ $bumdes->rtrw }} Desa {{ $bumdes->desa }} Kec. {{ $bumdes->kecamatan->nama }} Kab. {{ $bumdes->kabupaten->nama }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Telepon</td>
                                                    <td>:</td>
                                                    <td>{{ $bumdes->kontak }}</td>
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
                    <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                        <div class="mb-3 mt-2 text-center">
                            <a class="btn btn-info" href="{{route('foto.create')}}"><i class="metismenu-icon pe-7s-note2"></i> Update Foto</a>
                        </div>
                        <div id="fotoBumdes" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner text-center">
                                        <div class="carousel-item active">
                                            <img id="logo" width="50%" src="{{asset('storage/'. $bumdes_foto->foto1)}}" alt="Foto Pertama">
                                        </div>
                                        <div class="carousel-item">
                                            <img id="foto2" width="50%" src="{{asset('storage/'. $bumdes_foto->foto2)}}" alt="Foto Kedua">
                                        </div>
                                        <div class="carousel-item">
                                            <img id="foto3" width="50%" src="{{asset('storage/'. $bumdes_foto->foto3)}}" alt="Foto Ketiga">
                                        </div>
                                        <div class="carousel-item">
                                            <img id="foto4" width="50%" src="{{asset('storage/'. $bumdes_foto->foto4)}}" alt="Foto Keempat">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#fotoBumdes" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#fotoBumdes" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection