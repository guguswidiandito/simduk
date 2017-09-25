@extends('layouts.admin')
@section('breadcrumb')
<div class="row clearfix">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('penduduk.index')}} ">Penduduk</a></li>
        <li class="active">Detail Penduduk</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Detail Penduduk</div>
        <div class="panel-body">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="200">No KTP</td><td>{{ $penduduks->no_ktp }}</td>
                </tr>
                <tr>
                    <td width="200">Nama</td><td>{{ $penduduks->nama }}</td>
                </tr>
                <tr>
                    <td width="200">Agama</td><td>{{ $penduduks->agama }}</td>
                </tr>
                <tr>
                    <td width="200">Alamat</td><td>{{ $penduduks->alamat }}</td>
                </tr>
                <tr>
                    <td width="200">Pendidikan Terakhir</td><td>{{ $penduduks->pendidikan_terakhir }}</td>
                </tr>
                <tr>
                    <td width="200">Status</td><td>{{ $penduduks->status }}</td>
                </tr>
                <tr>
                    <td width="200">Pekerjaan</td><td>{{ $penduduks->pekerjaan }}</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <a href="{{ route('penduduk.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection