@foreach($goods as $v)
		<tr>
				<th>{{$v->goods_id}}</th>
				<th>{{$v->goods_name}}</th>
				<th>{{$v->goods_xinghao}}</th>
				<th>{{$v->s_aa}}</th>
				<th>{{$v->s_bb}}</th>
				<th><img src="{{env('IMG_URL')}}{{$v->goods_img}}" width="40" height="40"></th>
				<th>
					@if($v->goods_imgs)
					@php $goods_imgs= explode('|',$v->goods_imgs); @endphp
					@foreach ($goods_imgs as $vv)
					<img src="{{env('IMG_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->goods_price}}</th>
				<th>{{$v->goods_kucun}}</th>
				<th>{{$v->is_new}}</th>
				<th>{{$v->is_jingpin}}</th>··
				<th>{{$v->is_zhanshi}}</th>
				<th><a href="{{url('/goods/edit/'.$v->goods_id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/goods/destroy/'.$v->goods_id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="13">{{$goods->links('vendor.pagination.adminshop')}}</td></tr>