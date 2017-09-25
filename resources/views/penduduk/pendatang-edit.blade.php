@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Edit Datang</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                    Edit no datang: <strong>{{ $datang->no_pendatang }}</strong> atas nama: <strong>{{ $datang->penduduk->nama }}</strong>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">                    
                    {!! Form::open(['action' => ['PenduduksController@updateDatang', $datang->penduduk->no_ktp, $datang->no_pendatang], 'method'=>'patch']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th class="text-center" colspan="2">Edit {{ $datang->no_pendatang }}</th>
                        </tr>
                        <tr>
                            <th>No Pendatang</th>
                            <td>
                                {!! Form::text('no_pendatang', $datang->no_pendatang, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Datang</th>
                            <td>
                                {!! Form::date('tgl_datang', $datang->tgl_datang, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Asal</th>
                            <td>
                                {!! Form::text('alamat_asal', $datang->alamat_asal, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                {!! Form::text('keterangan', $datang->keterangan, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    <a href="{{ url('penduduk/'.$datang->penduduk->no_ktp.'/datang') }}" class="btn btn-primary">Kembali</a>
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection