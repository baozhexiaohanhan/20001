@foreach($student as $v)
		<tr>
				<th>{{$v->id}}</th>
				<th>{{$v->s_pp}}</th>
				<th>{{$v->s_cc}}</th>
				<th>{{$v->s_aa}}</th>
				<th>{{$v->s_bb}}</th>
				<th><img src="{{env('IMG_URL')}}{{$v->s_ss}}" width="40" height="40"></th>
				<th>
					@if($v->s_ii)
					@php $s_ii= explode('|',$v->s_ii); @endphp
					@foreach ($s_ii as $vv)
					<img src="{{env('IMG_URL')}}{{$vv}}" width="40" height="40">
					@endforeach
					@endif
				</th>
				<th>{{$v->s_oo}}</th>
				<th>{{$v->s_hh}}</th>
				<th>{{$v->s_ff}}</th>
				<th>{{$v->s_uu}}</th>
				<th>{{$v->s_yy}}</th>
				<th><a href="{{url('/student/edit/'.$v->id)}}" type="button" class="btn btn-primary">修改</a>
				   -<a href="{{url('/student/destroy/'.$v->id)}}" type="button" class="btn btn-danger">删除</a></th>
			</tr>
			@endforeach
			<tr><td colspan="13">{{$student->links('vendor.pagination.adminshop')}}</td></tr>