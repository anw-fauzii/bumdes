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
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Input Jenis Usaha</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link">Sisa Hasil Usaha</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                        <form action="{{ route('jenisUsaha.store') }}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            @method('post')
                            <div class="tab-content">
                                <p class="mb-2">- Silahkan pilih sesuai dengan kriteria BUMDes di daerah masing - masing.</p>
                                <div class="form-group">
                                @if(json_decode($user->jenis_usaha)== NULL)
                                    <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Pemberdayaan" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Pemberdayan (Pengelolaan Sampah/Kel. Perikanan/Kel. Peternakan)</label></div>
                                    <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Perdagangan" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Perdagangan (Perdagangan Umum/Perdagangan Saprotan/Perdagangan Khusus)</label></div>
                                    <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Jasa" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Jasa (Jasa Pelayanan/Jasa Penyewaan)</label></div>
                                    <div class="position-relative form-check mb-4 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Wisata" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Wisata (Wisata Religi/Wisata Alam)</label></div>
                                @else
                                <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Pemberdayaan" class="form-check-input" {{in_array("Pemberdayaan", json_decode($user->jenis_usaha)) ? "checked" : ""}} >
                                        <label for="exampleCheck" class="form-check-label">Pemberdayan (Pengelolaan Sampah/Kel. Perikanan/Kel. Peternakan)</label></div>
                                    <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Perdagangan" class="form-check-input" {{in_array("Perdagangan", json_decode($user->jenis_usaha)) ? "checked" : ""}}  >
                                        <label for="exampleCheck" class="form-check-label">Perdagangan (Perdagangan Umum/Perdagangan Saprotan/Perdagangan Khusus)</label></div>
                                    <div class="position-relative form-check mb-2 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Jasa" class="form-check-input" {{in_array("Jasa", json_decode($user->jenis_usaha)) ? "checked" : ""}} >
                                        <label for="exampleCheck" class="form-check-label">Jasa (Jasa Pelayanan/Jasa Penyewaan)</label></div>
                                    <div class="position-relative form-check mb-4 ml-4"><input name="nama_jenis_usaha[]" id="exampleCheck" type="checkbox" value="Wisata" class="form-check-input" {{in_array("Wisata", json_decode($user->jenis_usaha)) ? "checked" : ""}} >
                                        <label for="exampleCheck" class="form-check-label">Wisata (Wisata Religi/Wisata Alam)</label></div>
                                @endif
                                </div>
                                <p class="mb-2">- Pilih untuk keaktifan BUMDes di daerah masing - masing.</p>
                                <div class="position-relative form-check mb-2"><label class="form-check-label"><input name="status" value="Aktif" id="ya" type="radio" class="form-check-input"> BUMDes Aktif (Masukan Sisa Hasil Usaha(SHU))</label>
                                </div>
                                    <div class="form-row">
                                        <div class="col-md-7">
                                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                            <div class="position-relative form-group"><input placeholder="Masukan Nila" name="nilai" id="nilai" type="number" class="form-control" disabled="disabled"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="position-relative form-group"><input name="tanggal" id="tanggal" type="date" class="form-control" disabled="disabled"></div>
                                        </div>
                                    </div>
                                <div class="position-relative form-check mb-2"><label class="form-check-label"><input name="status" value="Tidak Aktif" type="radio" id="tidak" class="form-check-input"> BUMDes Tidak Aktif Dengan Alasan</label>
                                </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group"><input placeholder="Masukan Alasan" name="keterangan" id="keterangan" type="text" class="form-control" disabled="disabled"></div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="pe-7s-paper-plane"></i> Simpan
                                                    </button>
                                                </div> 
                            </div>
                        </form>
                        </div>
                        <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-hover">
                            <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $no =1; @endphp
                                @foreach($shu as $row)
                                    <tr class="text-center">
                                        <td>{{$no++}}</td>
                                        <td>{{number_format($row->nilai)}}</td>
                                        <td>{{$row->status}}</td>
                                        <td>{{$row->keterangan}}</td>
                                        <td>{{$row->tanggal}}</td>
                                        <td>Aksi</td>
                                    </tr>
                                @endforeach
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js" ></script>
<script>
       $(document).ready(function() {
    $('#example').DataTable();
        } );
    </script>
<script type="text/javascript">
    $(function () {
        $("input[name='status']").click(function () {
            if ($("#ya").is(":checked")) {
                $("#nilai").removeAttr("disabled");
                $("#nilai").focus();
                $("#tanggal").removeAttr("disabled");
                $("#tanggal").focus();
                $("#keterangan").attr("disabled", "disabled");
            } else {
                $("#keterangan").removeAttr("disabled");
                $("#keterangan").focus();
                $("#nilai").attr("disabled", "disabled");
                $("#tanggal").attr("disabled", "disabled");
            }
        });
    });
</script>
@endsection