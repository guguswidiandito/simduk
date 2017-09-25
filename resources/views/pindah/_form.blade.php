<div class="form-group{{ $errors->has('no_pindah') ? ' has-error' : '' }}">
	{!! Form::label('no_pindah', 'No Pindah', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_pindah', null, ['class'=>'form-control']) !!}
		{!! $errors->first('no_pindah', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('penduduk_id') ? ' has-error' : '' }}">
	{!! Form::label('penduduk_id', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('penduduk_id', []+App\Penduduk::pluck('nama','id')->all(),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}
		{!! $errors->first('penduduk_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('alamat_tuju') ? ' has-error' : '' }}">
	{!! Form::label('alamat_tuju', 'Alamat Tuju', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('alamat_tuju', null, ['class'=>'form-control']) !!}
		{!! $errors->first('alamat_tuju', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('tgl_pindah') ? ' has-error' : '' }}">
	{!! Form::label('tgl_pindah', 'Tanggal pindah', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::date('tgl_pindah', null, ['class'=>'form-control']) !!}
		{!! $errors->first('tgl_pindah', '<p class="help-block">:message</p>') !!}
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
		<a href="{{ route('pindah.index') }}" class="btn btn-danger">Kembali</a>
	</div>
</div>