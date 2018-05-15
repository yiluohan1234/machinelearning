@extends('layouts.admin.root')
@section('title', 'home')
@section('content_header')
    <section class="content-header">
      <h1>
        主页
        {{-- <small>Control panel</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
      <h1>欢迎来到ML管理平台</h1>
        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      @can('manage_users')
      <!-- /.row -->
        <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-green">
                      2018年五月
                    </span>
              </li>
               <!-- timeline item -->
              <li>
                <i class="fa fa-calendar-plus-o bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5月8日</span>

                  <h3 class="timeline-header">添加用户多权限管理</h3>
                  <h3 class="timeline-header">权角色管理</h3>
                  <h3 class="timeline-header">权限管理</h3>
                  <h3 class="timeline-header">用户具有什么权限还未添加</h3>

                  <!-- <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div> -->
                </div>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-calendar-plus-o bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 5月7日</span>

                  <h3 class="timeline-header">为用户管理添加，添加用户，编辑用户和删除用户的操作</h3>
                  <h3 class="timeline-header">echarts同一个页面显示两个类型的数据</h3>

                  <!-- <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div> -->
                </div>
              </li>
            </ul>
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-red">
                      2018年四月
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-calendar-plus-o bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 4月13日</span>

                  <h3 class="timeline-header">添加用户列表</h3>

                  <div class="timeline-body">
                    展示用户列表
                  </div>
                  <!-- <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div> -->
                </div>
              </li>
              <li>
                <i class="fa fa-calendar-plus-o bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 4月12日</span>

                  <h3 class="timeline-header">添加时间线</h3>

                  <div class="timeline-body">
                    在主页添加时间线功能
                  </div>
                  <!-- <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Read more</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div> -->
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-calendar-plus-o bg-aqua"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 4月6日</span>

                  <h3 class="timeline-header">添加存量经营数据更新情况</h3>
                  <div class="timeline-body">
                    主页添加存量经营近七天的数据更新情况，包括展示折线图、展示柱状图、展示数据和保存数据的图片等功能
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 4月1日</span>
                  <h3 class="timeline-header">添加存量经营的数据更新表格显示</h3>
                  <!--<div class="timeline-footer">
                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                  </div>-->
                </div>
              </li>
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
        </div>
        <!--
        <div class="container">
            <div class="col-md-12" style="margin-top: 50px">
                <div id="editormd_id">
                    <textarea name="content" style="display:none;"></textarea>
                </div>
            </div>
        </div>
        -->
      @endcan
    </section>
    <!-- /.content -->
@stop
