@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('content')
<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>403</h1>
			</div>
			<h2>Mohon Maaf :(</h2>
			<p>Sepertinya Anda Tidak Memiliki Hak Akses</p>
			<a href="#">Back To Homepage</a>
		</div>
	</div>
@endsection