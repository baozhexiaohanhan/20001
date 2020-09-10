@foreach ($brand as $v)
    <tr>
        <td><input type="checkbox" name="checkboxtwo" lay-skin="primary"  ></td>
        <td>{{$v->brand_id}}</td>
        <td id="{{$v->brand_id}}"><span class="aww">{{$v->brand_name}}</span></td>
        <td>{{$v->brand_url}}</td>
        <td><img src="{{$v->brand_logo}}" width="50"></td>
        <th>{{$v->brand_desc}}</th>
        <th><a href="{{url('/brand/edit/'.$v->brand_id)}}" id="{{$v->brand_id}}" type="button" class="btn btn-success">编辑</a>
            <a href="javascript:void(0);" id="{{$v->brand_id}}" type="button" class="btn btn-warning">删除</a></th>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        {{$brand->appends($query)->links('vendor.pagination.adminshop')}}
    </td>
</tr>
