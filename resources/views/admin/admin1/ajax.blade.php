@foreach ($menu as $v)
    <tr>
        <td>{{$v->menu_id}}
        <td id="{{$v->menu_id}}"><span class="aww">{{$v->menu_name}}</span></td>
        <td>{{$v->url}}</td>
        <td>{{$v->routname}}</td>
        <td><a href="{{url('/menu/edit/'.$v->menu_id)}}" id="{{$v->menu_id}}" type="button" class="btn btn-success">编辑</a>
            <a href="javascript:void(0);" id="{{$v->menu_id}}" type="button" class="btn btn-warning">删除</a></td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        {{$menu->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
        <button class="mordel btn btn-info">批量删除</button>
    </td>
</tr>
