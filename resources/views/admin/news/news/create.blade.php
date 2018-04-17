@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Add News</div>
            <div class="panel-body">
                <form action="{{ route('admin.news.store')  }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                    </div>

                    <div class="form-group {{ $errors->has('content') ? 'has-error':''}}">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" style="height: 200px">{!! old('content') !!}</textarea >
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
