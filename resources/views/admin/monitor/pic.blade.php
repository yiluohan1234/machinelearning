@extends('layouts.admin.root')
@section('title', '图')
@section('content_header')
    <section class="content-header">
      <h1>
        存量数据最更新情况
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
    <div id="lineMain" style="height:400px"></div>
    <div id="pieMain" style="height:400px"></div>

    </section>
    <!-- /.content -->
@stop
@section('script')
<!-- ECharts单文件引入 -->
<script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
<script type="text/javascript">
    // 路径配置
    require.config({
        paths: {
            echarts: 'http://echarts.baidu.com/build/dist'
        }
    });
    // 使用
    require(
        [
            'echarts',
            'echarts/chart/bar',
            'echarts/chart/line',
            'echarts/chart/pie'
        ],
        drawEcharts
    );

    function drawPie(ec){
        var dom = document.getElementById("pieMain");
        var myBarChart = echarts.init(dom);
        var app = {};
        option = null;
        app.title = '环形图';
        option = {
            title : {
                text: '17号机本地磁盘占用情况',
            },
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b}: {c} ({d}%)"
            },
            legend: {
                orient: 'vertical',
                x: 'right',
                data:['总量','使用量']
            },
            series: [
                {
                    name:'本地磁盘占用情况',
                    type:'pie',
                    radius: ['50%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '30',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:[]
                }
            ]
        };
        myBarChart.showLoading();
        $.post("{{ url('/admin/filesystem') }}", {
            "_token": "{{ csrf_token() }}"
        }, function(result) {
            myBarChart.hideLoading();    //隐藏加载动画
            myBarChart.setOption({        //加载数据图表
                series: [
                {
                    data: result
                }]
            });
        });
        // $.ajax({
        //     type: 'post',
        //     url: '/admin/filesystem',//请求数据的地址
        //     dataType: "json",        //返回数据形式为json
        //     success: function (result) {
        //         myBarChart.hideLoading();    //隐藏加载动画
        //         myBarChart.setOption({        //加载数据图表
        //             series: [
        //             {
        //                 data: result
        //             }]
        //         });
        //     },
        //     error: function (errorMsg) {
        //         //请求失败时执行该函数
        //         alert("图表请求数据失败!");
        //         myChart.hideLoading();
        //     }
        // });
        //当setOption第二个参数为true时，会阻止数据合并
        if (option && typeof option === "object") {
            myBarChart.setOption(option, true);
        }
    };

    function drawLine(ec){
        // var myLineChart = ec.init(document.getElementById('lineMain'));
        var dom = document.getElementById("lineMain");
        var myLineChart = echarts.init(dom);
        var app = {};
        option2 = null;
        app.title = '折线图';
        option2 = {
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
                    boundaryGap : false,
                    data : []
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter: '{value} M'
                    }
                }
            ],
            series : [
                {
                    name:'O域数据',
                    type:'line',
                    data: []  // y轴的数据，由上个方法中得到的ttls
                },
                {
                    name:'标签数据',
                    type:'line',
                    data: []  // y轴的数据，由上个方法中得到的ttls
                }
            ]
        };
        myLineChart.showLoading();    //数据加载完之前先显示一段简单的loading动画
        var names = [],ttls_O = [],ttls_l = [];

        $.post("{{ url('/admin/odata') }}", {
            "_token": "{{ csrf_token() }}"
        }, function(data) {
            $.each(data.O, function(i, item) {
                names.push(item.update_date);
                ttls_O.push(item.space_size);
            });
            $.each(data.label, function(i, item) {
                ttls_l.push(item.space_size);
            });
            myLineChart.hideLoading();    //隐藏加载动画
            myLineChart.setOption({        //加载数据图表
                xAxis: {
                    data: names
                },
                series: [{
                    data: ttls_O
                },
                {
                    data: ttls_l
                }]
            });
        });
        myLineChart.setOption(option2,true);
    };
    function drawEcharts(ec){
        drawPie(ec);
        drawLine(ec);
    };
</script>
@stop
