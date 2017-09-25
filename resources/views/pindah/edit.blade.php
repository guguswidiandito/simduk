@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
	<ol class="breadcrumb">
		<li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li><a href="{{ route('pindah.index') }}">Pindah</a></li>
		<li class="active">Tambah Data</li>
	</ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading dark-overlay">
			Tambah Pindah
		</div>
		<div class="panel-body">
			{!! Form::model($pindahs, ['url' => route('pindah.update', $pindahs->id),'method'=>'put', 'class'=>'form-horizontal']) !!}
			@include('pindah._form')
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection