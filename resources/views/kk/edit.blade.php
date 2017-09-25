@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="{{ route('kk.index') }}">Kartu Keluarga</a></li>
		<li class="active">Ubah Data</li>
	</ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading dark-overlay">
			Ubah Kartu Keluarga
		</div>
		<div class="panel-body">
			{!! Form::model($kks, ['url' => route('kk.update', $kks->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
			@include('kk._form')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection