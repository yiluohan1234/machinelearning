@extends('layouts.admin.root')
@section('title', '图')
@section('content_header')
    <section class="content-header">
      <h1>
        存量数据最近7天更新情况
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">cunliang</a></li>
        <li class="active">pic</li>
      </ol>
    </section>

@stop
@section('content')
    <!-- Main content -->
    <section class="content">
    <div id="contain" style="width: 950px;height:400px;"></div>

    </section>
    <!-- /.content -->
@stop
@section('script')
<script type="text/javascript">
    var names = [],ttls_O = [],ttls_l = [];

    $.post("{{ url('/admin/odata') }}", {
        "_token": "{{ csrf_token() }}"
    }, function(data) {
        $.each(data, function(i, item) {
            names.push(item.update_date);
            ttls_O.push(item.space_size);
        });
    });
    $.post("{{ url('/admin/ldata') }}", {
        "_token": "{{ csrf_token() }}"
    }, function(data) {
        $.each(data, function(i, item) {
            ttls_l.push(item.space_size);
        });
    });


    function chart() {
        var myChart = echarts.init(document.getElementById("contain"));
        option = {
            title : {
                text: '存量数据最近7天更新情况'
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['O域数据', '标签数据']
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType : {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            xAxis : [
                {

                    type : 'category',
                    data : names    // x的数据，为上个方法中得到的names
                }
            ],
            yAxis : [
                {
                    type : 'value',
                }
            ],
            series : [
                {
                    name:'O域数据',
                    type:'line',
                    data: ttls_O   // y轴的数据，由上个方法中得到的ttls
                },
                {
                    name:'标签数据',
                    type:'line',
                    data: ttls_l   // y轴的数据，由上个方法中得到的ttls
                }

            ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
    }
    setTimeout('chart()', 1000);
</script>
@stop
