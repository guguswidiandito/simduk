<div class="form-group{{ $errors->has('no_akte') ? ' has-error' : '' }}">
	{!! Form::label('no_akte', 'No Akte', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_akte', null, ['class'=>'form-control']) !!}
		{!! $errors->first('no_akte', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('nama_anak') ? ' has-error' : '' }}">
	{!! Form::label('nama_anak', 'Nama Anak', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_anak', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_anak', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('nama_orangtua') ? ' has-error' : '' }}">
	{!! Form::label('nama_orangtua', 'Nama Orangtua', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama_orangtua', null, ['class'=>'form-control']) !!}
		{!! $errors->first('nama_orangtua', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
	{!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('jenis_kelamin', array('Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan'),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}
		{!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group{{ $errors->has('kk_id') ? ' has-error' : '' }}">
	{!! Form::label('kk_id', 'No KK', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kk_id', []+App\Kk::pluck('no_kk','id')->all(),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}
		{!! $errors->first('kk_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
		<a href="{{ route('kelahiran.index') }}" class="btn btn-danger">Kembali</a>
	</div>
</div>