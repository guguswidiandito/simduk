@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="{{ route('penduduk.index') }}" title="">Penduduk</a></li>
		<li class="active">Tambah Data</li>
	</ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading dark-overlay">
			Tambah Penduduk
		</div>
		<div class="panel-body">
			{!! Form::open(['url' => route('penduduk.store'),
			'method' => 'post', 'class'=>'form-horizontal']) !!}
			@include('penduduk._form')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection