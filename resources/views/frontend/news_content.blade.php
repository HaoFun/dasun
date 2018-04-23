@extends('layouts.app')
@section('content')
    <div id="mov_02" style="background-image:url({{ asset(isset($image->banner->image) ? $image->banner->image:'images/BANNER02.JPG') }});background-repeat:no-repeat;background-size: cover;">
    	<h1>監理單位{{ $news->type }}</h1>
	</div>
    <div id="content">
        <h2><samp class="news_type05"> {{ mb_substr($news->type,2) }}</samp>{{ mb_substr($news->title,0,-12) }}</h2>
        <p>{!! $news->content !!}</p>
		<h3>{{ $news->from }}</h3>
		<h3>{{ $news->from_publish }}</h3>
	</div>
@endsection
