@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Datang</li>
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
                    {!! Form::open([url('penduduk/'.$p->no_ktp.'/datang'), 'method'=>'post']) !!}
                    <table class="table table-condensed table-bordered">
                        <tr>
                            <td rowspan="5"></td>
                            <th class="text-center" colspan="2">Tambah Datang</th>
                        </tr>
                        <tr>
                            <th>No Pendatang</th>
                            <td>
                                {!! Form::text('no_pendatang', null, ['class'=>'form-control', 'autofocus']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Datang</th>
                            <td>
                                {!! Form::date('tgl_datang', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
                            </td>
                        </tr>
                        <tr>
                            <th>Alamat Asal</th>
                            <td>
                                {!! Form::text('alamat_asal', null, ['class'=>'form-control']) !!}
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
                                    <th colspan="6" class="text-center">Data Pendatang</th>
                                </tr>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>No Pendatang</th>
                                    <th>Tanggal Datang</th>
                                    <th>Alamat Asal</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($penduduk->get() as $p)
                                @foreach ($p->pendatang()->get() as $key => $g)
                                    <tr>
                                        <td class="text-center">{{ ++$key }}</td>
                                        <td>{{ $g->no_pendatang }}</td>
                                        <td>{{ date('d M Y', strtotime($g->tgl_datang)) }}</td>
                                        <td>{{ $g->alamat_asal }}</td>
                                        <td>{{ $g->keterangan }}</td>
                                        <td class="text-center">
                                           {!! Form::open(['action' => ['PenduduksController@deleteDatang', $p->no_ktp, $g->no_pendatang], 'method' => 'DELETE']) !!}
                                                 <a href="{{ url('penduduk/'.$p->no_ktp.'/datang/'.$g->no_pendatang.'/edit') }}" class="btn btn-info">Edit</a>
                                                 <button type="submit" onclick="return confirm('Apakah anda yakin akan menghapus {{ $g->no_pendatang }} ?')" class="btn btn-danger">Hapus</button>
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