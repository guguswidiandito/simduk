@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Pindah</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-left">
                @foreach ($penduduk->get() as $p)
                    Nama: <strong>{{ $p->nama }}</strong>
                @endforeach
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($penduduk->get() as $p)
                    {!! Form::open([url('penduduk/'.$p->no_ktp.'/pindah'), 'method'=>'post']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td rowspan="5"></td>
                            <th class="text-center" colspan="2">Tambah Pindah</th>
                        </tr>
                        <tr>
                            <th>No Pindah</th>
                            <td>
                                {!! Form::text('no_pindah', null, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Pindah</th>
                            <td>
                                {!! Form::date('tgl_pindah', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Tujuan</th>
                            <td>
                                {!! Form::text('alamat_tuju', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                {!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                    </table>
                    {!! Form::submit('Simpan', ['class'=>'btn btn-success']) !!}
                    <a href="{{ route('penduduk.index') }}" class="btn btn-primary">Kembali</a>
                    {!! Form::close() !!}
                    @endforeach
                </div>    
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center">Data Pindah</th>
                                </tr>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>No Pindah</th>
                                    <th>Tanggal Pindah</th>
                                    <th>Alamat Tujuan</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($penduduk->get() as $p)
                                @foreach ($p->pindah()->get() as $key => $g)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $g->no_pindah }}</td>
                                        <td>{{ date('d M Y', strtotime($g->tgl_pindah)) }}</td>
                                        <td>{{ $g->alamat_tuju }}</td>
                                        <td>{{ $g->keterangan }}</td>
                                        <td class="text-center">
                                           {!! Form::open(['action' => ['PenduduksController@deletePindah', $p->no_ktp, $g->no_pindah], 'method' => 'DELETE']) !!}
                                                 <a href="{{ url('penduduk/'.$p->no_ktp.'/pindah/'.$g->no_pindah.'/edit') }}" class="btn btn-info">Edit</a>
                                                 <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus {{ $g->no_pindah }} ?')" class="btn btn-danger">Hapus</button>
                                           {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection