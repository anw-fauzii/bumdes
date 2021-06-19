@extends('layouts.app')

@section('title')
    <title>Sisa Hasil Usaha</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-info icon-gradient bg-mean-fruit"></i>
                </div>
                <div><h3>Tentang Sisem Informasi</h3>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        Tentang Sistem Informasi
                    </div>
                </div>
                <div class="card-body">
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
    </div>
</div>      
@endsection