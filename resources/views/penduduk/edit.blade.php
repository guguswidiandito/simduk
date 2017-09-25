@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="{{ route('penduduk.index')}}">Penduduk</a></li>
		<li class="active">Ubah Data</li>
	</ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading dark-overlay">
			Ubah Penduduk
		</div>
		<div class="panel-body">
			{!! Form::model($penduduks, ['url' => route('penduduk.update', $penduduks->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
			@include('penduduk._form')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection