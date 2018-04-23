@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增消息</div>
            <div class="panel-body">
                <form action="{{ route('admin.news.store')  }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">消息標題</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="type">消息類型</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="" hidden disabled selected>Choose Type</option>
                            @foreach($type as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="publist_at">發布時間</label>
                        <div class="input-group date">
                            <span class="input-group-addon" >
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input class="form-control" id="publish_at" type="text"  name="publish_at" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="content">消息內容</label>
                        <textarea id="content" name="content" style="height: 200px">{!! old('content') !!}</textarea >
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">確 認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
