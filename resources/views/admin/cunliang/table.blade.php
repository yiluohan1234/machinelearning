@extends('layouts.admin.root')
@section('title', '数据更新')
@section('content_header')
    <section class="content-header">
      <h1>
        数据更新
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> 存量经营</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> O域数据</a></li>
        <li class="active">数据更新</li>
      </ol>
    </section>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">O域数据更新情况</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>更新时间</th>
                  <th>更新类型</th>
                  <th>文件数量</th>
                  <th>文件大小(M)</th>
                  <th>用时(s)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $p)
                <tr>
                  <td>{{$p->update_date}}</td>
                  <td>{{$p->file_type}}
                  </td>
                  <td>{{$p->file_num}}</td>
                  <td>{{$p->space_size}}</td>
                  <td>{{$p->exec_time}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>更新时间</th>
                  <th>更新类型</th>
                  <th>文件数量</th>
                  <th>文件大小(M)</th>
                  <th>用时(s)</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
@stop