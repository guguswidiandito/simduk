@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="{{ route('pindah.index')}} ">pindah</a></li>
        <li class="active">Detail Pindah</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Detail Pindah</div>
        <div class="panel-body">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td width="200">No Pindah</td><td>{{ $pindahs->no_pindah }}</td>
                    </tr>
                    <tr>
                        <td width="200">Nama</td><td>{{ $pindahs->penduduk->nama }}</td>
                    </tr>
                    <tr>
                        <td width="200">Tanggal pindah</td><td>{{ $pindahs->tgl_pindah }}</td>
                    </tr>
                    <tr>
                        <td width="200">Alamat Asal</td><td>{{ $pindahs->alamat_tuju }}</td>
                    </tr>
                    <tr>
                        <td width="200">Keterangan</td><td>{{ $pindahs->keterangan }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ route('pindah.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection