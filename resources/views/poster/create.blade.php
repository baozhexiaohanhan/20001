@extends('layout.layout')
@section('title', '广告位')
@section('content')
<form action="{{url('/poster/store')}}" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
    <table width="100%">
        <tbody>
        <tr>
            <td>广告位名称</td>
            <td><input type="text" name="position_name" value="" size="30"></td>
        </tr>
        <tr>
            <td>广告位宽度</td>
            <td><input type="text" name="ad_width" value="" size="30"> 像素</td>
        </tr>
        <tr>
            <td>广告位高度</td>
            <td>
                <input type="text" name="ad_height" value="" size="30">像素</td>
        </tr>
        <tr>
            <td>广告位描述</td>
            <td>
                <input type="text" name="position_desc" size="55" value="">
            </td>
        </tr>
        <tr>
            <td>广告位模板</td>
            <td>
          <textarea name="position_style" cols="55" rows="6"></textarea>
            </td>
        </tr>
        <tr>
            <td class="label">&nbsp;</td>
            <td>
                <input type="submit" value=" 确定 " class="button">
                <input type="reset" value=" 重置 " class="button">
            </td>
        </tr>
        </tbody></table>
</form>

@endsection
