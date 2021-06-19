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
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Dashboard
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
                        Success!
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card-body">
                            <div id="container">You Loggin in as {{$user}}</div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@endsection