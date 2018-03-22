@extends('layouts.root')
@section('title', 'home')
@section('content_header')
    <section class="content-header">
      <h1>
        Charts
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">charts</li>
      </ol>
    </section>
    {!! Charts::styles() !!}
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
    {!! $chart->html() !!}

    </section>
    <!-- /.content -->
    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@stop