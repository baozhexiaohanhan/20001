@extends('admin.layout.gong')
@section('title', '商品添加')
@section('content')
 <form action="{{url('/ad/store')}}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
  <table width="100%" id="general-table">
    <tbody><tr>
      <td>广告名称</td>
      <td>
        <input type="text" name="ad_name" value="" size="35">
        <br><span class="notice-span" style="display:block" id="NameNotic">广告名称只是作为辨别多个广告条目之用，并不显示在广告中</span>
      </td>
    </tr>

          <tr>
        <td>媒介类型</td>
        <td>
         <select name="media_type" onchange="showMedia(this.value)">
         <option value="0">图片</option>
         <option value="1">Flash</option>
         <option value="2">代码</option>
         <option value="3">文字</option>
         </select>
        </td>
      </tr>
      <tr>
      <td>广告位置</td>
      <td>
        <select name="position_id">
        <option value="0">站外广告</option>
        <option value="1">1F左侧广告 [230x95]</option>        </select>
      </td>
    </tr>
    <tr>
      <td>开始日期</td>
      <td>
        <input name="start_time" type="text" id="start_time" size="22" value="2020-10-06" readonly="readonly"><button name="selbtn1" type="button" id="selbtn1" onclick="return showCalendar('start_time', '%Y-%m-%d', false, false, 'selbtn1');" class="cal"><img src="images/cal.png" alt=""></button>
      </td>
    </tr>
    <tr>
      <td>结束日期</td>
      <td>
        <input name="end_time" type="text" id="end_time" size="22" value="2020-11-05" readonly="readonly"><button name="selbtn2" type="button" id="selbtn2" onclick="return showCalendar('end_time', '%Y-%m-%d', false, false, 'selbtn2');" class="cal"><img src="images/cal.png" alt=""></button>
      </td>
    </tr>
      </tbody><tbody id="0">
    <tr>
      <td>广告链接</td>
      <td>
        <input type="text" name="ad_link" value="" size="35">
      </td>
    </tr>
    <tr>
      <td>上传广告图片</td>
      <td>
        <input type="file" name="ad_img" size="35">
        <br><span class="notice-span" style="display:block" id="AdCodeImg">上传该广告的图片文件,或者你也可以指定一个远程URL地址为广告的图片</span>
      </td>
    </tr>
    <tr>
      <td>或图片网址</td>
      <td><input type="text" name="img_url" value="" size="35"></td>
    </tr>
    </tbody>
        <tbody id="1" style="display:none">
    <tr>
      <td class="label">
        <a href="javascript:showNotice('AdCodeFlash');" title="点击此处查看提示信息">
        <img src="images/notice.svg" width="16" height="16" border="0" alt="点击此处查看提示信息"></a>上传Flash文件</td>
      <td>
        <input type="file" name="upfile_flash" size="35">
        <br><span class="notice-span" style="display:block" id="AdCodeFlash">上传该广告的Flash文件,或者你也可以指定一个远程的Flash文件</span>
      </td>
    </tr>
    <tr>
      <td>或Flash网址</td>
      <td>
        <input type="text" name="flash_url" value="" size="35">
      </td>
    </tr>
    </tbody>
  
      <tbody id="2" style="display:none">
      <tr>
        <td>输入广告代码</td>
        <td><textarea name="ad_code" cols="50" rows="7"></textarea></td>
      </tr>
    </tbody>
  
      <tbody id="3" style="display:none">
    <tr>
      <td>广告链接</td>
      <td>
        <input type="text" name="ad_link2" value="" size="35">
      </td>
    </tr>
    <tr>
      <td>广告内容</td>
      <td><textarea name="ad_text" cols="40" rows="3"></textarea></td>
    </tr>
    </tbody>
 
    <tbody><tr>
      <td>是否开启</td>
      <td>
        <input type="radio" name="enabled" value="1" checked="true">开启        <input type="radio" name="enabled" value="0">关闭      </td>
    </tr>
    <tr>
      <td>广告联系人</td>
      <td>
        <input type="text" name="link_man" value="" size="35">
      </td>
    </tr>
    <tr>
      <td>联系人Email</td>
      <td>
        <input type="text" name="link_email" value="" size="35">
      </td>
    </tr>
    <tr>
      <td>联系电话</td>
      <td>
        <input type="text" name="link_phone" value="" size="35">
      </td>
    </tr>
    <tr>
       <td>&nbsp;</td>
       <td>
        <input type="submit" value=" 确定 " class="button">
        <input type="reset" value=" 重置 " class="button">
        <input type="hidden" name="act" value="insert">
        <input type="hidden" name="id" value="">
      </td>
    </tr>
 </tbody></table>
</form>
@endsection
