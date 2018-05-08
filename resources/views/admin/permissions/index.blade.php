@extends('layouts.admin.root')
@section('title', '权限')
@section('content_header')
    <section class="content-header">
      <h1>
        权限
        <small>管理</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
        <li class="active">权限</li>
      </ol>
    </section>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">权限列表</h3>

            </div>
            <div class="box-header with-border">
                <button type="button" class="create-modal btn btn-info"><i class="fa fa-plus"></i> 添加</button>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>guard_name</th>
                  <th>创建时间</th>
                  <th>操作</th>
                </tr>
                @foreach($permissions as $permission)
                <tr class="permission{{$permission->id}}">
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  <td>{{$permission->guard_name}}</td>
                  <td>{{$permission->created_at}}</td>
                  <td>
                    <a href="#" class="edit-modal btn btn-sm btn-warning" data-id="{{$permission->id}}" data-name="{{$permission->name}}" data-guard_name="{{$permission->guard_name}}"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="{{$permission->id}}" data-name="{{$permission->name}}" data-guard_name="{{$permission->guard_name}}"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{$permissions->links()}}
              </ul>
            </div>
          </div>


            {{-- Modal Form Create Post --}}
            <div id="create" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" role="form">
                      <div class="form-group row add">
                        <label class="control-label col-sm-2" for="name">名称</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name"
                          placeholder="请输入权限名称" required>
                          <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="guard_name">guard_name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="guard_name" name="guard_name"
                          placeholder="请输入guard_name" required>
                          <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                      </div>
                    </form>
                  </div>
                      <div class="modal-footer">
                        <button class="btn btn-warning" type="submit" id="add">
                          <span class="glyphicon glyphicon-plus"></span> 保存
                        </button>
                        <button class="btn btn-warning" type="button" data-dismiss="modal">
                          <span class="glyphicon glyphicon-remobe"></span>关闭
                        </button>
                      </div>
                </div>
              </div>
            </div>
            {{-- Modal Form Edit and Delete Post --}}
            <div id="myModal"class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" role="modal">
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="fid" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="name">昵称</label>
                        <div class="col-sm-10">
                        <input type="name" class="form-control" id="n">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="guard_name">guard_name</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="e"></input>
                        </div>
                      </div>
                    </form>
                    {{-- Form Delete Post --}}
                    <div class="deleteContent">
                      你确定要删除这个权限吗 <span class="title"></span>?
                      <span class="hidden id"></span>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                      <span id="footer_action_button" class="glyphicon"></span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                      <span class="glyphicon glyphicon"></span>关闭
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
@stop
@section('script')

<script type="text/javascript">
    {{-- ajax Form Add Post--}}
    $(document).on('click','.create-modal', function() {
        $('#create').modal('show');
        $('.form-horizontal').show();
        $('.modal-title').text('添加权限');
    });
    $("#add").click(function() {
        $.ajax({
            type: 'POST',
            url: '/admin/addPermission',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
                'guard_name': $('input[name=guard_name]').val(),
                'password': $('input[name=password]').val()
          },
          success: function(data){
                if ((data.errors)) {
                    $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                    $('.error').text(data.errors.guard_name);
                    $('.error').text(data.errors.password);
                } else {
                    $('.error').remove();
                    $('#table').append("<tr class='permission" + data.id + "'>"+
                    "<td>" + data.id + "</td>"+
                    "<td>" + data.name + "</td>"+
                    "<td>" + data.guard_name + "</td>"+
                    "<td>" + data.created_at + "</td>"+
                    "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-guard_name='" + data.guard_name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-guard_name='" + data.guard_name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
                    "</tr>");
                }
            },
        });
        $('#name').val('');
        $('#guard_name').val('');
        $('#password').val('');
    });
    // form permission delete
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" 删除");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('删除权限');
        $('.id').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.name').html($(this).data('name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.delete', function(){
        $.ajax({
            type: 'POST',
            url: '/admin/deletePermission',
            data: {
              '_token': $('input[name=_token]').val(),
              'id': $('.id').text()
        },
        success: function(data){
            $('.permission' + $('.id').text()).remove();
        }
      });
  });
    // function Edit permission
    $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text(" 更新");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('更新权限信息');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#e').val($(this).data('guard_name'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'POST',
            url: '/admin/editPermission',
            data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#fid").val(),
            'name': $('#n').val(),
            'guard_name': $('#e').val()
        },
        success: function(data) {
            $('.permission' + data.id).replaceWith(" "+
            "<tr class='permission" + data.id + "'>"+
            "<td>" + data.id + "</td>"+
            "<td>" + data.name + "</td>"+
            "<td>" + data.guard_name + "</td>"+
            "<td>" + data.created_at + "</td>"+
            "<td><button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-guard_name='" + data.guard_name + "'><span class='glyphicon glyphicon-pencil'></span></button> <button class='delete-modal btn btn-danger btn-sm' data-id='" + data.id + "' data-name='" + data.name + "' data-guard_name='" + data.guard_name + "'><span class='glyphicon glyphicon-trash'></span></button></td>"+
            "</tr>");
        }
      });
    });
</script>
@stop