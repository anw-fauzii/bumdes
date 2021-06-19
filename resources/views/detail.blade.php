<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Bumdes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                <div class="carousel-inner text-center">
                                    <div class="carousel-item active">
                                        <img id="foto1" width="60%" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img id="foto2" width="60%" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img id="foto3" width="60%" alt="Third slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img id="foto4" width="60%" alt="Forth slide">
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
            <input type="hidden" id="latitude">
            <input type="hidden" id="longitude">
            <div class="modal-footer">
                <button type="button" class="btn btn-info goToLink">Lihat Lokasi</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
          $(document).on('click','.goToLink', function(){
            var latitude = document.getElementById("latitude").value;
            var longitude = document.getElementById("longitude").value;
                window.open('https://www.google.com/maps/dir//'+latitude+','+longitude ,'_blank');
          });
        });
      </script>