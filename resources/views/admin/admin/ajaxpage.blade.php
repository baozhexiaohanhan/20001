    @foreach($admin as $v)
        <tr>
            <th>{{$v->admin_id}}</th>
            <th>{{$v->admin_name}}</th>
            <th>{{$v->mobile}}</th>
            
            <th> <a href="javascript:void()" class="btn btn-warning" onclick="if(confirm('确认删除此用户')){location.href='{{url('/admin/destroy/'.$v->admin_id)}}'; }">删除</a></th>
        </tr>
            @endforeach
            <div>
      <tr>
        <th colspan="8">
        {{$admin->links('vendor.pagination.adminshop')}}
        
        </th>
      </tr>