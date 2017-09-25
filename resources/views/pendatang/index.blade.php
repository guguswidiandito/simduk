@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
    <ol class="breadcrumb">
        <li><a href="{{ url('home') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Pendatang</li>
    </ol>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading dark-overlay">Pendatang</div>
        <div class="panel-body">
            <p>
                <a class="btn btn-danger" href="{{ url('/pendatang/create') }}">Tambah</a>
            </p>
            <hr>
            {!! $html->table(['class'=>'table table-hover table-striped dt-responsive nowrap', 'cellspacing' =>'0', 'width' =>'100%']) !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection