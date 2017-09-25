@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Edit Kelahiran</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                Edit : <strong>{{ $kelahiran->no_akte }}</strong>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">                    
                    {!! Form::open(['action' => ['KksController@updateKelahiran', $kelahiran->kk->no_kk, $kelahiran->no_akte], 'method'=>'patch']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <th class="text-center" colspan="2">Edit {{ $kelahiran->no_akte }}</th>
                        </tr>
                       <tr>
                            <th>No Akte</th>
                            <td>{!! Form::text('no_akte', $kelahiran->no_akte, ['class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <th>Nama Anak</th>
                            <td>{!! Form::text('nama_anak', $kelahiran->nama_anak, ['class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <th>Nama Orang Tua</th>
                            <td>{!! Form::text('nama_orangtua', $kelahiran->nama_orangtua, ['class'=>'form-control']) !!}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{!! Form::select('jenis_kelamin', array('Laki-laki'=>'Laki-laki','Perempuan'=>'Perempuan'),$kelahiran->jenis_kelamin, ['class'=>'form-control show-tick', 'placeholder'=>'Pilih']) !!}</td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    <a href="{{ url('kk/'.$kelahiran->kk->no_kk.'/kelahiran') }}" class="btn btn-primary">Kembali</a>
                    {!! Form::close() !!}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection