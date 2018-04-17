@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $news->title }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.news.update',$news->id)  }}" method="post">
                    {{ method_field('PATCH') }}
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{ $news->title }}" class="form-control">
                    </div>

                    <div class="form-group {{ $errors->has('content') ? 'has-error':''}}">
                        <label for="title">Content</label>
                        <textarea id="content" name="content" style="height: 200px">{!! $news->content !!}</textarea >
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">確　認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
