@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">项目</div>

                <div class="panel-body">
                    <li>
                        <a href="{{route('admin.index')}}">machinelearning</a>
                    </li>
                    <li>
                        <a href="">项目管理</a>
                    </li>
                    <li>
                        <a href="">用户管理</a>
                    </li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
