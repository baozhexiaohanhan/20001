@foreach($student as $v)
		<tr>
				<th>{{$v->id}}</th>
				<th>{{$v->s_name}}</th>
				<th>{{$v->s_xinghao}}</th>
				<th>{{$v->s_aa}}</th>
				<th>{{$v->s_bb}}</th>
				<th><img src="{{env('IMG_URL')}}{{$v->s_img}}" width="40" height="40"></th>
				<th>
					@if($v->s_imgs)
					@php $s_imgs= explode('|',$v->s_imgs); @endphp
					@foreach ($s_imgs as $vv)
					<img src="{{env('IMG_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->s_price}}</th>
				<th>{{$v->s_kucun}}</th>
				<th>{{$v->is_new}}</th>
				<th>{{$v->is_jingpin}}</th>··
				<th>{{$v->is_zhanshi}}</th>
				<th><a href="{{url('/student/edit/'.$v->id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/student/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="13">{{$student->links('vendor.pagination.adminshop')}}</td></tr>