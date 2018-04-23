@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增橫幅</div>
            <div class="panel-body">
                <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="module_id">模板名稱</label>
                        <select class="form-control" id="module_id" name="module_id" required>
                            <option value="" hidden disabled selected>Choose name</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banner_image">橫幅圖片</label>
                        <input type="file" name="image" id="image" class="btn btn-default form-control">
                    </div>

                    <button class="btn btn-primary pull-right col-md-2" type="submit">確 認</button>
                </form>
            </div>
        </div>
    </div>
@endsection
