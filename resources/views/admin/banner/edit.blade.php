@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Edit-{{ $banner->module->name }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.banner.update',$banner->id) }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="module_id">Module Title</label>
                        <select class="form-control" name="module_id" id="module_id" required>
                            <option value="" hidden disabled selected>Choose name</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}" class="form-control" {{ $module->id === $banner->module_id ?'selected=selected':'' }}>{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        @if($banner->image)
                            <br>
                            <img class="thumbnail img-responsive" src="{{ $banner->image }}" style="height:200px;max-width:100%" alt="{{ $banner->module->name.'-image' }}">
                        @endif
                        <input type="file" id="image" name="banner_image" class="btn btn-default form-control">
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection