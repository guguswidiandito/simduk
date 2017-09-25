@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kelahiran</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        	 @foreach ($kk as $k)
                    No KK: <strong>{{ $k->no_kk }}</strong>
             @endforeach
        </div>
        <div class="panel-body">
             <div class="row">
             	<div class="col-md-12">
             		{!! Form::open() !!}
		             <table class="table">
		             	<tr>
		             		<th>No Akte</th>
		             		<td>{!! Form::text('no_akte', null, ['class'=>'form-control', 'autofocus']) !!}</td>
		             	</tr>
		              	<tr>
		             		<th>Nama Anak</th>
		             		<td>{!! Form::text('nama_anak', null, ['class'=>'form-control']) !!}</td>
		             	</tr>
		             	<tr>
		             		<th>Nama Orang Tua</th>
		             		<td>{!! Form::text('nama_orangtua', null, ['class'=>'form-control']) !!}</td>
		             	</tr>
		             	<tr>
		             		<th>Jenis Kelamin</th>
		             		<td>{!! Form::select('jenis_kelamin', array('Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan'),null, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}</td>
		             	</tr>
		             </table>
		             {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
					 <a href="{{ route('kk.index') }}" class="btn btn-danger">Kembali</a>
		             {!! Form::close() !!}
             	</div>
             </div>
             <br>
             <div class="row">
             	<div class="col-md-12">
             		<div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center">Data Kelahiran</th>
                                </tr>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>No Akte</th>
                                    <th>Nama Anak</th>
                                    <th>Nama Orangtua</th>
                                    <th>Jenis Kelamin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($kk as $p)
                                @foreach ($p->kelahiran()->get() as $key => $g)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $g->no_akte }}</td>
                                        <td>{{ $g->nama_anak }}</td>
                                        <td>{{ $g->nama_orangtua }}</td>
                                        <td>{{ $g->jenis_kelamin }}</td>
                                        <td class="text-center">
                                           {!! Form::open(['action' => ['KksController@deleteKelahiran', $p->no_kk, $g->no_akte], 'method' => 'DELETE']) !!}
                                                 <a href="{{ url('kk/'.$p->no_kk.'/kelahiran/'.$g->no_akte.'/edit') }}" class="btn btn-info">Edit</a>
                                                 <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus {{ $g->no_akte }} ?')" class="btn btn-danger">Hapus</button>
                                           {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
             	</div>
             </div>
        </div>
    </div>
</div>
@endsection