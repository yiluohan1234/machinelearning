@extends('layouts.admin.root')
@section('title', '图')
@section('content_header')
    <section class="content-header">
      <h1>
        O域数据最近7天更新情况
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
    var names = [];
    var ttls = [];
    function getData()
    {
        $.post("{{ url('/admin/odata') }}", {
            "_token": "{{ csrf_token() }}"
        }, function(data) {
            $.each(data, function(i, item) {
                names.push(item.update_date);
                ttls.push(item.space_size);
            });
        });
    }
    getData();
    function chart() {
        var myChart = echarts.init(document.getElementById("contain"));


        option = {
            title : {
                text: 'O域数据最近7天更新情况'
            },
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['数据大小']
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
                    axisLine: {
                        lineStyle: { color: '#333' }
                    },
                    axisLabel: {
                        rotate: 30,
                        interval: 0
                    },
                    type : 'category',
                    boundaryGap : false,
                    data : names    // x的数据，为上个方法中得到的names
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter: '{value} M'
                    },
                    axisLine: {
                        lineStyle: { color: '#333' }
                    }
                }
            ],
            series : [
                {
                    name:'数据大小',
                    type:'line',
                    smooth: 0.3,
                    data: ttls   // y轴的数据，由上个方法中得到的ttls
                }
            ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
    }
    setTimeout('chart()', 1000);
</script>
@stop
