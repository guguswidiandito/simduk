<div class="form-group{{ $errors->has('no_ktp') ? ' has-error' : '' }}">
	{!! Form::label('no_ktp', 'KTP', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('no_ktp', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	{!! Form::label('nama', 'Nama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('nama', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
	{!! Form::label('agama', 'Agama', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('agama', array('Islam'=>'Islam','Kristen'=>'Kristen', 'Hindu'=>'Hindu', 'Buddha'=>'Buddha'),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
	{!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('alamat', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('pendidikan_terakhir') ? ' has-error' : '' }}">
	{!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('pendidikan_terakhir', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
	{!! Form::label('status', 'Status', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('status', ['Belum Kawin' => 'Belum Kawin', 'Sudah Kawin' => 'Sudah Kawin'],null, ['class'=>'form-control', 'placeholder'=>'Pilih']) !!}
	</div>
</div>
<div class="form-group{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
	{!! Form::label('pekerjaan', 'Pekerjaan', ['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('pekerjaan', null, ['class'=>'form-control']) !!}
	</div>
</div>
<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
		 <a href="{{ route('penduduk.index') }}" class="btn btn-danger">Kembali</a>
	</div>
</div>