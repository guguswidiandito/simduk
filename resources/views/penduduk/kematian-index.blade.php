@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kematian</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                  <a href="{{ route('penduduk.index') }}" class="btn btn-success">Kembali</a>  Nama: <strong>{{ $penduduk->nama }}</strong>
            </div>
        </div>
        <div class="panel-body">
            @if ($penduduk->kematian()->count() < 1)
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open([url('penduduk/'.$penduduk->no_ktp.'/kematian'), 'method'=>'post']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td rowspan="5"></td>
                            <th class="text-center" colspan="2">Tambah Kematian</th>
                        </tr>
                        <tr>
                            <th>No Kematian</th>
                            <td>
                                {!! Form::text('no_kematian', null, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Meninggal</th>
                            <td>
                                {!! Form::date('tgl_kematian', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tempat Meninggal</th>
                            <td>
                                {!! Form::text('tempat_meninggal', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Sebab Meninggal</th>
                            <td>
                                {!! Form::text('sebab_meninggal', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>    
            </div>
            @else
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center">Data Kematian</th>
                                </tr>
                            </thead>
                            @foreach ($penduduk->get() as $p)
                                @foreach ($p->kematian()->get() as $key => $g)
                                    <tr>
                                        <th width="200px">No kematian</th>
                                        <td>{{ $g->no_kematian }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kematian</th>
                                        <td>{{ date('d M Y', strtotime($p->tgl_kematian)) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Meninggal</th>
                                        <td>{{ $g->tempat_meninggal }}</td>        
                                    </tr>
                                    <tr>
                                        <th>Sebab Meninggal</th>
                                        <td>{{ $g->sebab_meninggal }}</td>
                                    </tr>
                                    <tr>
                                        <th>Aksi</th>
                                        <td>
                                            {!! Form::open(['action' => ['PenduduksController@deleteKematian', $p->no_ktp, $g->no_kematian], 'method' => 'DELETE']) !!}
                                                 <a href="{{ url('penduduk/'.$p->no_ktp.'/kematian/'.$g->no_kematian.'/edit') }}" class="btn btn-info">Edit</a>
                                                 <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus {{ $g->no_kematian }} ?')" class="btn btn-danger">Hapus</button>
                                           {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection