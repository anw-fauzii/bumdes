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
                <div><h3>Tambah Bumdes</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Input Profil Bumdes
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{ route('bumdes.store') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Logo Bumdes</h5>
                                        <div class="col-md-12 mb-2 text-center">
                                            <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="position-relative row form-group">
                                                <div class="col-sm-8"><input name="logo" id="logo" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                        <div id="googleMap" style="width:100%;height:400px;"></div>
                                        * Gunakan Peta Untuk Membantu Menentukan Longitude dan Latitude
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Informasi Dasar</h5>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nama BUMDes</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Nama BUMDes" type="text" name="nama" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Kabupaten</label>
                                                <div class="col-sm-9">
                                                    <select name="namaKab" id="namaKab" class="form-control">
                                                        <option disable="true" selected="true" disabled>--- Pilih Kabupaten ---</option>
                                                        @foreach ($namaKab as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Kecamatan</label>
                                                <div class="col-sm-9">
                                                    <select name="namaKec" id="namaKec" class="form-control">
                                                        <option disable="true" selected="true" disabled>--- Pilih Kecamatan---</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Desa</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Desa" type="text" name="desa" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Dusun/Kampung</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Dusun/Kampung" type="text" name="dusun" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">RT/RW</label>
                                                <div class="col-sm-9"><input placeholder="Masukan RT/RW" type="text" name="rtrw" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nomor Perdes</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Nomor Perdes" type="text" name="perdes" id="perdes" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Tahun Berdiri</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Tahun Berdiri" type="text" name="tahun" id="tahun" value="" class="form-control" required>
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Latitude</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Longitude" type="text" name="lat" id="lat" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Longitude</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Longitude" type="text" name="long" id="long" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <h5 class="card-title text-center mb-4 mt-4">Kontak</h5>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nama Ketua</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Nama Ketua" type="text" name="ketua" id="ketua" value="" class="form-control" required>
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Nomor Kontak</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Nomor Kontak" type="text" name="kontak" id="kontak" value="" class="form-control">
                                                    </div>
                                            </div>
                                            <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Email BUMDes</label>
                                                <div class="col-sm-9"><input placeholder="Masukan Email BUMDes" type="text" name="email" id="email" value="" class="form-control">
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
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>  
@include('js.bumdes')  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
     
$(document).ready(function (e) {
   
   $('#logo').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
<script>
    jQuery(document).ready(function ()
    {
            jQuery('select[name="namaKab"]').on('change',function(){
               var namaKabID = jQuery(this).val();
               if(namaKabID)
               {
                  jQuery.ajax({
                     url : '/kec/' +namaKabID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="namaKec"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="namaKec"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="namaKec"]').empty();
               }
            });
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"></script>   
@endsection