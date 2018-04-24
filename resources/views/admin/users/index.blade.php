@extends('layouts.admin.root')
@section('title', 'home')
@section('content_header')
    <section class="content-header">
      <h1>
        用户
        <small>管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">用户</li>
      </ol>
    </section>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">用户列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>昵称</th>
                  <th>email</th>
                  <th>操作</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <button type="button" class="btn btn-info">编辑</button>
                    <button type="button" class="btn btn-info" onclick="delUser({{$user->id}})">删除</button>
                  </td>
                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
@section('script')
<script>

    //删除文章
    function delUser(user_id) {
        layer.confirm('您确定要删除这个用户吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('users/')}}/"+user_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }
                else
                {
                    layer.msg(data.msg, {icon: 5});
                }
            });
          //layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>
<style>
    .result_content ul li span{
        font_size: 15px;
        padding:6px 12px;
    }
</style>
@stop