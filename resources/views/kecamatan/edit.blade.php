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
                <div>Kecamatan
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
                        <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <input type="hidden" name="kabupaten_id" value="{{$kecamatan->kabupaten_id}}">
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Kecamatan</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Nama Kecamatan" type="text" name="nama" value="{{ $kecamatan->nama }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Latitude</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Latitude" type="text" name="lat" id="lat" value="{{ $kecamatan->lat }}" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Longitude</label>
                                                <div class="col-sm-8"><input placeholder="Masukan Longitude" type="text" name="long" id="long" value="{{ $kecamatan->long }}" class="form-control">
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
<script>
    function myMap() {
        var marker;
        function taruhMarker(peta, posisiTitik){
            if( marker ){
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta,
                    draggable: true,
                    animation: google.maps.Animation.BOUNCE
                });
            }
                // isi nilai koordinat ke form
        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("long").value = posisiTitik.lng();   
        }
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-7.21626538,107.9011917),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"></script>   
@endsection