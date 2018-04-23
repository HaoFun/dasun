@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $module->name }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.module.update',$module->id)  }}" method="post">
                    {{ method_field('PATCH') }}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">模板名稱</label>
                        <input type="text" id="name" name="name" value="{{ $module->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="url">模板URL</label>
                        <input type="text" id="url" name="url" value="{{ $module->url }}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="content">模板內容</label>
                        <textarea id="content" name="content" style="height: 200px">{!! $module->content !!}</textarea >
                    </div>

                    <div class="form-group">
                        <label for="order">排序</label>
                        <input type="text" id="order" name="order" value="{{ $module->order }}" class="form-control">
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">確 認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
