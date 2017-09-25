@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('kelahiran.index')}} ">Kelahiran</a></li>
        <li class="active">Detail Kelahiran</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Detail Kelahiran</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="200">No Akte</td><td>{{ $kelahirans->no_akte }}</td>
                    </tr>
                    <tr>
                        <td width="200">Nama Anak</td><td>{{ $kelahirans->nama_anak }}</td>
                    </tr>
                    <tr>
                        <td width="200">Nama Orangtua</td><td>{{ $kelahirans->nama_orangtua }}</td>
                    </tr>
                    <tr>
                        <td width="200">Jenis Kelamin</td><td>{{ $kelahirans->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td width="200">No Pindah</td><td>{{ $kelahirans->kk->no_kk }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ route('kelahiran.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection