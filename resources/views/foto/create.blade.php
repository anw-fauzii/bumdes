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
                    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Foto Bumdes</h3>
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
                        <form action="{{ route('foto.update', $foto->id) }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                <input type="text" name="id" value="{{$foto->id}}">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Foto 1</h5>
                                        <div class="col-md-12 mb-2 text-center">
                                            <img id="preview-foto1" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="position-relative row form-group">
                                                <div class="col-sm-8"><input name="foto1" id="foto1" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Foto 2</h5>
                                        <div class="col-md-12 mb-2 text-center">
                                            <img id="preview-foto2" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="position-relative row form-group">
                                                <div class="col-sm-8"><input name="foto2" id="foto2" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Foto 3</h5>
                                        <div class="col-md-12 mb-2 text-center">
                                            <img id="preview-foto3" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="position-relative row form-group">
                                                <div class="col-sm-8"><input name="foto3" id="foto3" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title text-center mb-4">Foto 4</h5>
                                        <div class="col-md-12 mb-2 text-center">
                                            <img id="preview-foto4" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                                alt="preview image" style="max-height: 150px;">
                                        </div>
                                        <div class="position-relative row form-group">
                                                <div class="col-sm-8"><input name="foto4" id="foto4" type="file" class="form-control-file">
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="text-center">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="pe-7s-paper-plane"></i> Simpan
                                                </button>
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
   
   $('#foto1').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-foto1').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#foto2').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-foto2').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#foto3').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-foto3').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   $('#foto4').change(function(){       
    let reader = new FileReader();
    reader.onload = (e) => { 
        $('#preview-foto4').attr('src', e.target.result); 
    }
        reader.readAsDataURL(this.files[0]);  
   });
   
});
 
</script>
@endsection