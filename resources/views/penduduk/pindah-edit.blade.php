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
                    Edit no pindah: <strong>{{ $pindah->no_pindah }}</strong> atas nama: <strong>{{ $pindah->penduduk->nama }}</strong>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">                    {!! Form::open(['action' => ['PenduduksController@updatePindah', $pindah->penduduk->no_ktp, $pindah->no_pindah], 'method'=>'patch']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th class="text-center" colspan="2">Edit {{ $pindah->no_pindah }}</th>
                        </tr>
                        <tr>
                            <th>No Pindah</th>
                            <td>
                                {!! Form::text('no_pindah', $pindah->no_pindah, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Pindah</th>
                            <td>
                                {!! Form::date('tgl_pindah', $pindah->tgl_pindah, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Tujuan</th>
                            <td>
                                {!! Form::text('alamat_tuju', $pindah->alamat_tuju, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                {!! Form::text('keterangan', $pindah->keterangan, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    <a href="{{ url('penduduk/'.$pindah->penduduk->no_ktp.'/pindah') }}" class="btn btn-primary">Kembali</a>
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection