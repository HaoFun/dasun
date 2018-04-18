@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Add News</div>
            <div class="panel-body">
                <form action="{{ route('admin.news.store')  }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="" hidden disabled selected>Choose Type</option>
                            @foreach($type as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="publist_at">Publish At</label>
                        <div class="input-group date">
                            <span class="input-group-addon" >
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input class="form-control" id="publish_at" type="text"  name="publish_at" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" style="height: 200px">{!! old('content') !!}</textarea >
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
