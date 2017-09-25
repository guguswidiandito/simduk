@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('pendatang.index')}} ">Pendatang</a></li>
        <li class="active">Detail Pendatang</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Detail Pendatang</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="200">No Pendatang</td><td>{{ $pendatangs->no_pendatang }}</td>
                    </tr>
                    <tr>
                        <td width="200">Nama</td><td>{{ $pendatangs->penduduk->nama }}</td>
                    </tr>
                    <tr>
                        <td width="200">Tanggal Datang</td><td>{{ $pendatangs->tgl_datang }}</td>
                    </tr>
                    <tr>
                        <td width="200">Alamat Asal</td><td>{{ $pendatangs->alamat_asal }}</td>
                    </tr>
                    <tr>
                        <td width="200">Keterangan</td><td>{{ $pendatangs->keterangan }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ route('pendatang.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection