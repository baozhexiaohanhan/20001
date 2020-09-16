

<div>
<tbody>
            @foreach($user as $v)
        <tr>
            <th>{{$v->user_id}}</th>
            <th>{{$v->user_name}}</th>
            <th>{{$v->user_number}}</th>
            
            <th> <a href="javascript:void()" onclick="if(confirm('确认删除此用户')){location.href='{{url('/user/destroy/'.$v->user_id)}}'; }">删除</a></th>
        </tr>
            @endforeach
            <div>
      <tr>
        <th colspan="8">
        {{$user->links('vendor.pagination.adminshop')}}
        
        </th>
      </tr>
   </div>
</tbody>
</div>
