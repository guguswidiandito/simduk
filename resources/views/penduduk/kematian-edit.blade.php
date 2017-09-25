@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Edit Kematian</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                Edit no kematian: <strong>{{ $kematian->no_kematian }}</strong> atas nama: <strong>{{ $kematian->penduduk->nama }}</strong>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">                    
                    {!! Form::open(['action' => ['PenduduksController@updateKematian', $kematian->penduduk->no_ktp, $kematian->no_kematian], 'method'=>'patch']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th class="text-center" colspan="2">Edit {{ $kematian->no_kematian }}</th>
                        </tr>
                        <tr>
                            <th>No Pendatang</th>
                            <td>
                                {!! Form::text('no_kematian', $kematian->no_kematian, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Datang</th>
                            <td>
                                {!! Form::date('tgl_kematian', $kematian->tgl_kematian, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Asal</th>
                            <td>
                                {!! Form::text('tempat_meninggal', $kematian->tempat_meninggal, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                {!! Form::text('sebab_meninggal', $kematian->sebab_meninggal, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    <a href="{{ url('penduduk/'.$kematian->penduduk->no_ktp.'/kematian') }}" class="btn btn-primary">Kembali</a>
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection