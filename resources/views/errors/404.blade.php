@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('content')
<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>404</h1>
			</div>
			<h2>Mohon Maaf :(</h2>
			<p>Sepertinya Halaman Tidak Ditemukan.</p>
			<a href="#">Back To Homepage</a>
		</div>
	</div>
@endsection