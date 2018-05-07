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
                <a class="btn btn-success export-csv-btn" downlaod="data.csv" href="#">导出</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped" >
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
                <!--
                <tfoot>
                <tr>
                  <th>更新时间</th>
                  <th>更新类型</th>
                  <th>文件数量</th>
                  <th>文件大小(M)</th>
                  <th>用时(s)</th>
                </tr>
                </tfoot>
                -->
              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
@stop
@section('script')
<script>
  $(function () {
    $('#datatable').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        //支持国际化，将search转为中文
        language: {
          "decimal":        "",
          "emptyTable":     "No data available in table",
          "info":           "显示 _START_ 到 _END_ 页共 _TOTAL_ 条",
          "infoEmpty":      "显示 0 到 0 页共 0 条",
          "infoFiltered":   "(filtered from _MAX_ total entries)",
          "infoPostFix":    "",
          "thousands":      ",",
          "lengthMenu":     "显示 _MENU_ 条",
          "loadingRecords": "Loading...",
          "processing":     "Processing...",
          "search":         "Search:",
          "zeroRecords":    "没有匹配项",
          "paginate": {
              "first":      "First",
              "last":       "Last",
              "next":       "下页",
              "previous":   "上页"
          },
          "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
          },
        },

    });
  });

</script>

@stop