@extends('layouts.app')
@section('content')
	<div id="mov_02" style="background-image:url({{ asset(isset($image->banner->image) ? $image->banner->image:'images/BANNER02.JPG') }});background-repeat:no-repeat;background-size: cover;">
		<h1>監理單位-{{ isset($news_type) ? $news_type:'最新消息' }}</h1>
	</div>
@php
    $type = [
        '最新消息' => 'news_type01',
        '最新公告' => 'news_type02',
        '最新宣導' => 'news_type03',
        '最新活動' => 'news_type04',
    ]
@endphp
	<div id="news_text">
		<div class="option_01"> <samp class="option_01_txt">類型選擇</samp>
			<select name="select" class="option_01_txt change_news_type">
				<option value="">請選擇類型</option>
				<option {{ isset($news_type) && $news_type === "最新消息" ? 'selected=selected':''}} value="最新消息">最新消息</option>
				<option {{ isset($news_type) && $news_type === "最新公告" ? 'selected=selected':''}} value="最新公告">最新公告</option>
				<option {{ isset($news_type) && $news_type === "最新宣導" ? 'selected=selected':''}} value="最新宣導">最新宣導</option>
				<option {{ isset($news_type) && $news_type === "最新活動" ? 'selected=selected':''}} value="最新活動">最新活動</option>
			</select>
		</div>
		<div id="">
			@if(isset($news))
				@foreach($news as $value)
					<div class="nwes_box" >
						<a href="{{ route('tw.news_content',$value->id) }}"><div class="{{ $type[$value->type] }}">{{ mb_substr($value->type,2) }}</div>
							<h3>{{ str_limit($value->title,20,'...') }}</h3>
							<p>{{ str_limit(strip_tags($value->content),200,'...') }}</p>
							<h4>{{ $value->publish_at }}</h4>
						</a>
					</div>
				@endforeach
			@endif
		</div>

		<div class="PAGE">
			{!! $news->appends(Request::except('page'))->render() !!}
		</div>
	</div>
@endsection