<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Peta Bumdes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <script src="{{ asset('js/main.js') }}"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style2.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.3.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="{{asset('storage/logo.png')}}" alt="" class="img-fluid"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="#beranda">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#peta">Peta</a></li>
          <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
          @if (Route::has('login'))
                    @auth
                    @role('admin')
                    <li><a class="getstarted scrollto" href="{{route('bumdes.index')}}">Bumdes</a></li>
                    @endrole
                    @role('bumdes')
                    <li><a class="getstarted scrollto" href="{{route('profil')}}">Profil</a></li>
                    @endrole
                    @else
                      <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
                    @endauth
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <main id="main">

  <!-- ======= data Us Section ======= -->
  <section id="beranda" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title text-left">
          <h5><strong>Sistem Informasi Keberadaan</strong></h5>
          <h3><strong>BADAN USAHA MILIK DESA (BUMDes)</strong></h3>
          <h6>Peraturan Bumdes >></h6>
        </div>
        <div class="row">      
          <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
            <div class="text-center mb-2"><h5><strong>Data Bumdes</strong></h5></div>
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Bumdes</th>
                      <th>Desa</th>
                      <th>Kecamatan</th>
                      <th>Jenis Usaha</th>
                      <th>Berdiri</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no= 1; @endphp
                    @foreach($bumdes as $row)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$row->nama}}</td>
                      <td>
                      @if($row->desa != NULL)
                      {{$row->desa}}
                      @else
                      Belum Diupdate
                      @endif</td>
                      <td>
                      @if($row->jenis_usaha != NULL)
                        {{$row->kecamatan->nama}}
                      @else
                      Belum Diupdate
                      @endif
                      </td>
                      <td>
                      @if($row->jenis_usaha != NULL)
                        @foreach (json_decode($row->jenis_usaha) as $jenis)
                        {{ $loop->first ? '' : ', ' }}
                        {{$jenis}}
                        @endforeach
                      @else
                      Belum Diupdate
                      @endif
                      </td>
                      <td>
                      @if($row->tahun != NULL)
                      {{$row->tahun}}
                      @else
                      Belum Diupdate
                      @endif
                      </td>
                      <td>
                      @if($row->status != NULL)
                      {{$row->status}}
                      @else
                      Belum Diupdate
                      @endif
                      </td>
                      <td>
                        
                        <button type="button" class="btn btn-primary showDetail"
                          data-id="{{$row->id}}"
                          data-lat="{{$row->lat}}"
                          data-long="{{$row->long}}"
                          data-ketua="{{$row->ketua}}"
                          data-kontak="{{$row->kontak}}"
                          data-email="{{$row->email}}"
                          data-perdes="{{$row->perdes}}"
                          data-foto1="
                          {{asset('storage/'. $row->foto1)}}" 
                          data-foto2="
                          {{asset('storage/'. $row->foto2)}}" 
                          data-foto3="
                          {{asset('storage/'. $row->foto3)}}" 
                          data-foto4="
                          {{asset('storage/'. $row->foto4)}}" 
                          data-logo="{{asset('storage/'. $row->logo)}}"
                          data-logonull="{{asset('storage/user.png')}}"
                          
                          data-toggle="modal" data-target="#exampleModal">Detail
                        </button>
                      </td>
                    @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End data Us Section -->
    @include('detail')

<!-- ======= Contact Us Section ======= -->
  <section id="peta" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Peta</h2>
        </div>

        <div class="row">      
          <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div id="map" style="width:100%;height:400px;"></div>
            </div>
          </div>
        </div>

      </div>
      
  </section><!-- End Contact Us Section -->

<!-- ======= Contact Us Section ======= -->
  <section id="tentang" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>

        <div class="row">      
          <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
            <div class="row">
              <div class="col-md-4">
                  <div class="mb-3 card">
                      <div class="card-body">
                          <div class="tab-content">

                                                  <img src="{{asset('storage/user.png')}}" width="100%" alt="First slide">

                          </div>
                      </div> 
                  </div>
              </div>  
              <div class="col-md-8">
                  <div class="mb-3 card">
                      <div class="card-body">
                        <div class="table-responsive">
                                  <table class="table">
                                      <tbody>
                                          <tr>
                                              <td width="15%">NIM</td>
                                              <td width="2%">:</td>
                                              <td width="60%">1906026</td>
                                          </tr>
                                          <tr>
                                              <td>Nama Lengkap</td>
                                              <td>:</td>
                                              <td>Agus Nugraha</td>
                                          </tr>
                                          <tr>
                                              <td>Tempat Lahir</td>
                                              <td>:</td>
                                              <td>Garut</td>
                                          </tr>
                                          <tr>
                                              <td>Tanggal Lahir</td>
                                              <td>:</td>
                                              <td>19 Agustus 1987</td>
                                          </tr>
                                          <tr>
                                              <td>Tanggal Lahir</td>
                                              <td>:</td>
                                              <td>Kp. Ciderewak RT/RW 001/005, Desa Sudalarang, Kec. Sukawening, Kab. Garut</td>
                                          </tr>
                                          <tr>
                                              <td>Kontak</td>
                                              <td>:</td>
                                              <td>08132348473</td>
                                          </tr>
                                          <tr>
                                              <td>E-mail</td>
                                              <td>:</td>
                                              <td>1906026@sttgarut.ac.id</td>
                                          </tr>
                                          <tr>
                                              <td>Pembimbing</td>
                                              <td>:</td>
                                              <td>1. Dede Kurniadi, S.Kom., M.Kom [NIDN: 0402098301]<br>2. Ridwan Setiawan, S.T., M.Kom [NIDN: 0414128703]</td>
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
      
  </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>HIMAGRIB</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
</body>
<!-- Vendor JS Files -->
  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main2.js') }}"></script>
  <script>
        // Initialize and add the map
        function myMap() {
          var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
            @foreach ($bumdes as $location)
                { 
                    lat: "{{ $location->lat }}",
                    long: "{{ $location->long }}",
                    nama: "<img src ='{{asset('storage/'. $location->logo)}}' width='42' class='rounded-circle' style='margin-left: auto;margin-right: auto;'><br><h5> {{ $location->nama }} </h5> <a target='_blank' href='https://www.google.com/maps/dir//{{$location->lat}},{{$location->long}}'>Petunjuk Arah</a>",
                    },
            @endforeach
            ];
                        
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i].lat, markers[i].long);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i].nama
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(markers[i].nama);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
        }

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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
      <script>
        $(document).ready(function(){
          $(document).on('click','.showDetail', function(){
              var ketua = $(this).attr('data-ketua'),
              kontak = $(this).attr('data-kontak'),
              lat = $(this).attr('data-lat'),
              long = $(this).attr('data-long'),
              email = $(this).attr('data-email'),
              perdes = $(this).attr('data-perdes'),
              logonull = $(this).attr('data-logonull')
              ;
              $("#ketua").html(ketua);
              $("#kontak").html(kontak);
              $("#email").html(email);
              $("#lat").html(lat);
              $("#long").html(long);
              $("#perdes").html(perdes);
              $("#latitude").val(lat);
              $("#longitude").val(long);
              $("#logonull").text(logonull);
              $('#logo').attr('src', $(this).attr('data-logo'));
              $('#foto1').attr('src', $(this).attr('data-foto1')); 
              $('#foto2').attr('src', $(this).attr('data-foto2'));
              $('#foto3').attr('src', $(this).attr('data-foto3'));
              $('#foto4').attr('src', $(this).attr('data-foto4'));
              $('#exampleModal').appendTo('body');
          });
        });
      </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf7FALA_C8nQFFy1A8D6NWavSyS_rqIBc&callback=myMap"> $.noConflict();</script>
    <script src="https://kit.fontawesome.com/95397704f9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script>
      $.noConflict();
       $(document).ready(function() {
    $('#example').DataTable();
        } );
    </script>
    <script>
      $('document').ready(function() {
  $('#btnTest').click(function() {
    $('#dummyModal').modal('show');
  });
});
    </script>
</html>