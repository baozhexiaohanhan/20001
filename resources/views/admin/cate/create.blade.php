@extends('admin.layout.gong')
@section('title', '分类添加')
@section('content')

<form action="{{url('/cate/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
  @csrf
  <!-- {{csrf_field()}}
  <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="cate_name" id="firstname" 
           placeholder="请输入分类名称">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">父级分类</label>
    <div class="col-sm-10">
      <select class="form-control" name="parent_id">
      <option value='0'>请选择父级分类</option>
      @foreach($cate as $v)
      <option value="{{$v->cate_id}}">{{str_repeat('|——',$v->level)}}{{$v->cate_name}}</option>
     @endforeach
    </select>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" name="cate_show" value="1" checked>显示
           <input type="radio" name="is_show" value="2">不显示
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否导航显示</label>
    <div class="col-sm-10">
      <input type="radio" name="cate_shows" value="1" checked>显示
           <input type="radio" name="is_nav_show" value="2">不显示
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>







@endsection