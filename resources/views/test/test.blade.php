@extends('layouts.admin.root')
@section('title', '数据')
@section('content_header')
    <section class="content-header">
      <h1>
        test
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> 存量经营</a></li>
        <li class="active">数据更新</li>
      </ol>
    </section>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
      <div id="toolbar">
        <select class="form-control">
          <option value="">当前页</option>
          <option value="all">全部</option>
          <option value="selected">选中</option>
        </select>
      </div>
      <table id="table"></table>

    </section>
    <!-- /.content -->
@stop
@section('script')
<script src="//rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script type="text/javascript">
$('#table').bootstrapTable({
    url: '/admin/test',
    toolbar:'#toolbar',
    singleSelect:false,
    clickToSelect:true,
    sortName: "update_date",
    sortOrder: "desc",
    pageSize: 7,
    pageNumber: 1,
    pageList: "[7, 14, 30, 100, All]",
    showToggle: false,
    showRefresh: true,
    showColumns: true,
    cache: true,                       //是否使用缓存，默认为true，所以一般情况下需要设置一下这个属性（*）
    showExport: true,                     //是否显示导出
    exportDataType: "basic",              //basic', 'all', 'selected'.
    striped: true,                      //是否显示行间隔色
    search: true,
    pagination: true,
    columns: [{
        field: "state",
        checkbox:true,
    },{
        field: 'update_date',
        sortable: true,
        title: '更新时间'
    }, {
        field: 'file_type',
        sortable: true,
        title: '文件类型'
    }, {
        field: 'file_num',
        sortable: true,
        title: '文件数量'
    }, {
        field: 'space_size',
        sortable: true,
        title: '文件大小'
    }, {
        field: 'exec_time',
        sortable: true,
        title: '执行时间'
    }, ]
});
</script>
@stop
