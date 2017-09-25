<div class="form-group{{ $errors->has('no_pendatang') ? ' has-error' : '' }}">
	{!! Form::label('no_pendatang', 'No Pendatang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_pendatang', null, ['class'=>'form-control']) !!}
		{!! $errors->first('no_pendatang', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('penduduk_id') ? ' has-error' : '' }}">
	{!! Form::label('penduduk_id', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('penduduk_id', []+App\Penduduk::pluck('nama','id')->all(),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}
		{!! $errors->first('penduduk_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('alamat_asal') ? ' has-error' : '' }}">
	{!! Form::label('alamat_asal', 'Alamat Asal', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('alamat_asal', null, ['class'=>'form-control']) !!}
		{!! $errors->first('alamat_asal', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('tgl_datang') ? ' has-error' : '' }}">
	{!! Form::label('tgl_datang', 'Tanggal Datang', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tgl_datang', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tgl_datang', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
	{!! Form::label('keterangan', 'keterangan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
		{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
		<a href="{{ route('pendatang.index') }}" class="btn btn-danger">Kembali</a>
	</div>
</div>