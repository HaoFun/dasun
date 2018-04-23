@extends('layouts.app')
@section('content')
	<div id="mov_02" style="background-image:url({{ asset($module_content->banner->image) }});background-repeat:no-repeat;background-size: cover;">
		<h1>{{ $module_content->name }}</h1>
	</div>
	<div id="content">
		{!! $module_content->content !!}
	</div>

	<div id="content_02">
	<h3>車輛定期檢驗相關問題 (請點選問題)</h3>
	<div id="qaContent">
		<ul>
			@if(isset($qas))
				@foreach($qas as $qa)
				<li>
					<div>{{ $qa->question }}</div>
					<div>{{ $qa->answer }}</div>
				</li>
				@endforeach
			@endif
		</ul>
	</div>
	</div>
@endsection