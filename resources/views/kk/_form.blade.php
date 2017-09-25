<table class="table">
	<tr>
		<th>No KK</th>
		<td>{!! Form::text('no_kk', null, ['class'=>'form-control']) !!}</td>
	</tr>
	<tr>
		<th>Nama KK</th>
		<td>{!! Form::text('nama_kk', null, ['class'=>'form-control']) !!}</td>
	</tr>
	<tr>
		<th>No Pindah</th>
		<td>{!! Form::select('pindah_id', []+App\Pindah::pluck('no_pindah','id')->all(),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}</td>
	</tr>
	<tr>
		<th>Alamat KK</th>
		<td>{!! Form::text('alamat_kk', null, ['class'=>'form-control']) !!}</td>
	</tr>
</table>
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
<a href="{{ route('kk.index') }}" class="btn btn-danger">Kembali</a>