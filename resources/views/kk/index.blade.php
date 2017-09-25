@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kepala Keluarga</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="btn btn-danger" href="{{ url('/kk/create') }}">Tambah</a> Kepala Keluarga
        </div>
        <div class="panel-body">
            <table class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No KK</th>
                        <th>Nama KK</th>
                        <th>Alamat</th>
                        <th>No Pindah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kk as $key => $k)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $k->no_kk }}</td>
                            <td>{{ $k->nama_kk }}</td>
                            <td>{{ $k->alamat_kk }}</td>
                            <td>{{ $k->pindah->no_pindah }}</td>
                            <td>
                                {!! Form::model($k, ['route' => ['kk.destroy', $k->id], 'method' => 'DELETE', 'class'=>'form-inline']) !!}
                                <a href="{{ url('kk/'.$k->no_kk.'/kelahiran') }}" class="btn btn-primary">Kelahiran</a>
                                <a href="" class="btn btn-default">Edit</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus {{ $k->no_kk }} ?')">Hapus</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection