@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Penduduk</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                <a class="btn btn-danger" href="{{ url('/penduduk/create') }}">Tambah</a> Penduduk
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>No KTP</th>
                            <th>Nama</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Status Kematian</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penduduks as $key => $p)
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td>{{ $p->no_ktp }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>
                                @php
                                    if ($p->kematian()->count() == 1) {
                                        echo "Meninggal";
                                    } else {
                                        echo "Masih Hidup";
                                    }
                                @endphp
                            </td>
                            <td class="text-center">
                                {!! Form::model($penduduks, ['route' => ['penduduk.destroy', $p->id], 'method' => 'DELETE', 'class'=>'form-inline']) !!}
                                <div class="btn-group">
                                  <a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
                                    Opsi
                                    <span class="caret"></span>
                                  </a>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{ url('penduduk/'.$p->no_ktp.'/pindah') }}">Pindah</a></li>
                                    <li><a href="{{ url('penduduk/'.$p->no_ktp.'/datang') }}">Datang</a></li>
                                    <li><a href="{{ url('penduduk/'.$p->no_ktp.'/kematian') }}">Kematian</a></li>
                                  </ul>
                                </div>
                                <a href="" class="btn btn-default">Edit</a>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $penduduks->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection