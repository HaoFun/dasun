@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增模板</div>
            <div class="panel-body">
                <form action="{{ route('admin.module.store')  }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">模板名稱</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="url">模板URL</label>
                        <input type="text" id="url" name="url" value="{{old('url')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">模板內容</label>
                        <textarea id="content" name="content" style="height: 200px">{!! old('content') !!}</textarea >
                    </div>

                    <div class="form-group">
                        <label for="order">排序</label>
                        <input type="text" id="order" name="order" value="{{old('order')}}" class="form-control">
                    </div>

                    <button class="btn btn-primary pull-right col-md-2" type="submit">確 認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
