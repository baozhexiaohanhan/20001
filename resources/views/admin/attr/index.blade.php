@extends('admin.layout.gong')
@section('title', '类型列表')
@section('content')
    <span class="layui-breadcrumb">
  <a href="/">首页</a>
  <a href="/goodstype/proplist">属性管理</a>
  <a><cite>属性列表</cite></a>
</span>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>属性列表</title>
        <center><h1>属性列表</h1></center><hr/>
        <!-- <a href="/goodstype/create"><button type="button" class="btn btn-primary">添加属性<tton></a> -->
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <table class="table">
        <caption>属性列表展示</caption>

        <thead>
        <tr>
            <th>ID</th>
            <th>属性名称</th>
            <th>商品类型</th>
            <th>录入方式</th>
            <th>可选值列表</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attr as $k=>$v)
            <tr>
                <td>{{$v->attr_id}}</td>
                <td id="{{$v->attr_name}}"><span class="oldname role_name">{{$v->attr_name}}</span></td>
                <td>{{$v->cat_name}}</td>
                <td>
                    @if($v->attr_input_type == '0')
                        手工录入
                    @else
                        下拉选择
                    @endif
                </td>
                <td style="width:20%">{{$v->attr_values}}</td>
                <td>
                    {{--            <a href="{{url('/role/destroy/'.$v->attr_id)}}">--}}
                    <button type="button" class="btn btn-default">编辑<button>
                            <button type="button" class="btn btn-danger" attr_id="{{$v->attr_id}}">删除<button>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>
    </body>
    <html>
@endsection
