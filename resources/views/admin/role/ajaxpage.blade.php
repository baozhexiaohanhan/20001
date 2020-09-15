<div>
<tbody>
            @foreach($role as $v)
        <tr>
            <th>{{$v->role_id}}</th>
            <th>{{$v->role_name}}</th>
            <th>{{$v->role_desc}}</th>
            
            <th> <a href="javascript:void()" onclick="if(confirm('确认删除此用户')){location.href='{{url('/role/destroy/'.$v->role_id)}}'; }">删除</a></th>
        </tr>
            @endforeach
            <div>
      <tr>
        <th colspan="8">
        {{$role->links('vendor.pagination.adminshop')}}
        
        </th>
      </tr>
   </div>
</tbody>
</div>
