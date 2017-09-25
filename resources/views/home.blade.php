@extends('layouts.admin')
@section('breadcrumb')
<div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Home</li>
        </ol>
    </div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
            You are logged in!
        </div>
    </div>
</div>
@endsection