@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('kk.index')}} ">Kartu Keluarga</a></li>
        <li class="active">Detail Kepala Keluarga</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Detail Kartu Keluarga</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="200">No KK</td><td>{{ $kks->no_kk }}</td>
                    </tr>
                    <tr>
                        <td width="200">Nama Kepala Keluarga</td><td>{{ $kks->nama_kepalakeluarga }}</td>
                    </tr>
                    <tr>
                        <td width="200">Alamat</td><td>{{ $kks->alamat }}</td>
                    </tr>
                    <tr>
                        <td width="200">No Pindah</td><td>{{ $kks->pindah->no_pindah }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ route('kk.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection