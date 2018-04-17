@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增最新消息</div>
            <div class="panel-body">
                <form action="{{ route('admin.news.store')  }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                        <label for="title">最新消息標題</label>
                        <input type="text"  name="title" value="{{old('title')}}" class="form-control" placeholder="請輸入最新消息標題">
                        @if($errors->has('title'))
                            <span class="help-block">
                            <strong>{{$errors->first('title')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('body') ? 'has-error':''}}">
                        <!-- 編輯器容器 -->
                        <label for="title">最新消息內容</label>
                        <textarea id="container" name="body" style="height: 200px">{!! old('body') !!}</textarea >
                        @if($errors->has('body'))
                            <span class="help-block">
                            <strong>{{$errors->first('body')}}</strong>
                        </span>
                        @endif
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">確　認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
