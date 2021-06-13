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
                <div>Edit Bumdes
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
                        FORM INPUT
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{ route('bumdes.update', $bumdes->id) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <input type="hidden" name="kecamatan_id" value="{{$bumdes->kecamatan_id}}">
                                        <input type="hidden" name="kabupaten_id" value="{{$bumdes->kabupaten_id}}">
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Nama Bumdes</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Nama Bumdes" type="text" name="nama" value="{{ $bumdes->nama }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Alamat</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Alamat" type="text" name="alamat" value="{{ $bumdes->alamat }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Desa</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Desa" type="text" name="desa" value="{{ $bumdes->desa }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Jenis Usaha</label>
                                                <div class="col-sm-8">
                                                <select id="jenis_id" name="jenis_id[]" multiple="multiple" type="select" class="custom-select" class="form-control">
                                                    <option disable="true"disabled>--- Pilih Jenis Usaha ---</option>
                                                    @foreach ($jenis as $row)
                                                        <option value="{{ $row->id }}" {{ in_array($row->id, $jenisTerpilih) ? 'selected' : '' }}>{{ ucfirst($row->nama) }}</option>
                                                    @endforeach
                                                </select>
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Telepon</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Telepon" type="text" name="telepon" value="{{ $bumdes->telepon }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Latitude</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Latitude" type="text" name="lat" id="lat" value="{{ $bumdes->lat }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Longitude</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Longitude" type="text" name="long" id="long" value="{{ $bumdes->long }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Logo</label>
                                                <div class="col-sm-8"><input name="logo" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Foto 1</label>
                                                <div class="col-sm-8"><input name="foto1" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Foto 2</label>
                                                <div class="col-sm-8"><input name="foto2" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Foto 3</label>
                                                <div class="col-sm-8"><input name="foto3" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="pe-7s-paper-plane"></i> Simpan
                                                </button>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <div id="googleMap" style="width:100%;height:400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>  
@include('js.bumdes')  
<script>

            $(document).ready(function () {

                $("#jenis_id").select2({

                    placeholder:"--- Pilih Jenis Usaha ---"

                });

            });

        </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"></script>   
@endsection