@foreach ($role as $v)
    <tr>
        <td><input type="checkbox" name="checkboxtwo" lay-skin="primary"  ></td>
        <td>{{$v->role_id}}
        <td id="{{$v->role_id}}"><span class="aww">{{$v->role_name}}</span></td>
        <td>{{$v->role_desc}}</td>
        <td><a href="{{url('/role/edit/'.$v->role_id)}}" id="{{$v->role_id}}" type="button" class="btn btn-success">编辑</a>
            <a href="javascript:void(0);" id="{{$v->role_id}}" type="button" class="btn btn-warning">删除</a></td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        {{$role->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
    </td>
</tr>
 @foreach ($role as $v)
            <tr>
                <td><input type="checkbox" name="checkboxtwo" lay-skin="primary"  ></td>
                <td>{{$v->role_id}}</td>
                <td>{{$v->role_name}}</td>
                <td>{{$v->role_desc}}</td>
                <td><a href="{{url('/role/edit/'.$v->role_id)}}" id="{{$v->role_id}}" type="button" class="btn btn-success">编辑</a>
                <a href="javascript:void(0);" id="{{$v->role_id}}" type="button" class="btn btn-warning">删除</a></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                {{$role->appends(["query"=>$query])->links('vendor.pagination.adminshop')}}
                <button class="mordel btn btn-info">批量删除</button>
            </td>
        </tr>
