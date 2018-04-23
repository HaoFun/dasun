@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Edit-{{ $service->title }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.service.update',$service->id) }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="title">項目標題</label>
                        <input type="text" id="title" name="title" value="{{ $service->title }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="content">項目內容</label>
                        <input type="text" id="content" name="content" value="{{ $service->content }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        @if($service->image)
                            <br>
                            <img class="thumbnail img-responsive" src="{{ asset($service->image) }}" style="height:200px;max-width:100%" alt="{{ $service->title.'-image' }}">
                        @endif
                        <input type="file" id="image" name="image" class="btn btn-default form-control">
                    </div>

                    <div class="form-group">
                        <label for="order">排序</label>
                        <input type="text" id="order" name="order" value="{{ $service->order }}" class="form-control">
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">確 認</button>
                </form>
            </div>
        </div>
    </div>
@endsection