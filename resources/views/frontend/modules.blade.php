@extends('layouts.app')
@section('content')
    <div id="mov_02" style="background-image:url({{ asset($module_content->banner->image) }});background-repeat:no-repeat;background-size: cover;">
        <h1>{{ $module_content->name }}</h1>
    </div>
    <div id="content">
        {!! $module_content->content !!}
    </div>
@endsection