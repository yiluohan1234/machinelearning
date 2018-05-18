<html>
<pre>
hi, {{$user}}:
    {{$content}}

    平台使用情况如下:
    <table width="90%" id="mytab"  border="1" class="t1">
      <thead>
        <th width="30%">使用量</th>
        <th width="30%">总量</th>
        <th width="40%">使用率</th>
      </thead>
      <tr>
        <td>{{$data->filesystem_used}}</td>
        <td>{{$data->filesystem_size}}</td>
        <td>{{$data->filesystem_use_percentage}}%</td>
      </tr>
    </table>

</pre>
<style type="text/css">
<!--
body,table,pre{
    font-size:16px;
    font-family: 微软雅黑;
}
table{
    table-layout:fixed;
    empty-cells:show;
    border-collapse: collapse;
    margin:0 auto;
}
td{
    height:20px;
    text-align: center;
}
h1,h2,h3{
    font-size:12px;
    margin:0;
    padding:0;
}

.title { background: #FFF; border: 1px solid #9DB3C5; padding: 1px; width:90%;margin:20px auto; }
    .title h1 { line-height: 31px; text-align:center;  background: #2F589C url(th_bg2.gif); background-repeat: repeat-x; background-position: 0 0; color: #FFF; }
        .title th, .title td { border: 1px solid #CAD9EA; padding: 5px; }


/*这个是借鉴一个论坛的样式*/
table.t1{
    border:1px solid #cad9ea;
    color:#666;
}
table.t1 th {
    background-image: url(th_bg1.gif);
    background-repeat::repeat-x;
    height:30px;
}
table.t1 td,table.t1 th{
    border:1px solid #cad9ea;
    padding:0 1em 0;
}
table.t1 tr.a1{
    background-color:#f5fafe;
}



table.t2{
    border:1px solid #9db3c5;
    color:#666;
}
table.t2 th {
    background-image: url(th_bg2.gif);
    background-repeat::repeat-x;
    height:30px;
    color:#fff;
}
table.t2 td{
    border:1px dotted #cad9ea;
    padding:0 2px 0;
}
table.t2 th{
    border:1px solid #a7d1fd;
    padding:0 2px 0;
}
table.t2 tr.a1{
    background-color:#e8f3fd;
}



table.t3{
    border:1px solid #fc58a6;
    color:#720337;
}
table.t3 th {
    background-image: url(th_bg3.gif);
    background-repeat::repeat-x;
    height:30px;
    color:#35031b;
}
table.t3 td{
    border:1px dashed #feb8d9;
    padding:0 1.5em 0;
}
table.t3 th{
    border:1px solid #b9f9dc;
    padding:0 2px 0;
}
table.t3 tr.a1{
    background-color:#fbd8e8;
}

-->
</style>
</html>
