@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-cash icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Sisa Hasil Usaha</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Filter
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card-body">
                            <form action="{{ route('shu.index') }}" method="get" enctype="multipart/form-data"> 
                            @csrf
                            @method('post')
                                <div class="row">
                                    <div class="col">
                                        <label for="namaKab">Kabupaten</label>
                                        <select name="namaKab" class="form-control">
                                        <option disable="true" selected="true" disabled>--- Pilih Kabupaten ---</option>
                                                @foreach ($namaKab as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col">
                                        <label for="namaKec">Kecamatan</label>
                                        <select name="namaKec" class="form-control">
                                            <option disable="true" selected="true" disabled>--- Pilih Kecamatan---</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="tahun">Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <option disable="true" selected="true" disabled>--- Pilih Tahun---</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="bulan">Bulan</label>
                                        <select name="bulan" class="form-control">
                                            <option disable="true" selected="true" disabled>--- Pilih Bulan---</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="text-center mt-2">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="pe-7s-paper-plane"></i> Lihat
                                    </button>
                                </div> 
                            </form>
                        </div>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-6">
                                    <div class="card mb-6 widget-content bg-midnight-bloom">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Sisa Hasil Usaha</div>
                                                <div class="widget-subheading">total</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-white"><span>Rp. {{number_format($nilai)}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6">
                                    <div class="card mb-6 widget-content bg-grow-early">
                                        <div class="widget-content-wrapper text-white">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Jumlah Bumdes</div>
                                                <div class="widget-subheading">total</div>
                                            </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{number_format($jumlah)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                        
                        <table id="example" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bumdes</th>
                                        <th>Tanggal</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no = 1; @endphp
                                @foreach($shu as $row)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->bumdes->nama}}</td>
                                        <td>{{$row->tanggal}}</td>
                                        <td>Rp. {{number_format($row->nilai)}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" ></script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="namaKab"]').on('change',function(){
               var namaKabID = jQuery(this).val();
               if(namaKabID)
               {
                  jQuery.ajax({
                     url : '/cari/' +namaKabID,
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    
@endsection