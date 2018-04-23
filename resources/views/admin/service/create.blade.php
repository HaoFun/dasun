@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增服務項目</div>
            <div class="panel-body">
                <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">項目標題</label>
                        <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">項目內容</label>
                        <input type="text" id="content" name="content" value="{{old('content')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="btn btn-default form-control">
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
