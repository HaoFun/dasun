@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Add Module</div>
            <div class="panel-body">
                <form action="{{ route('admin.module.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="module_id">Module Title</label>
                        <select class="form-control" id="module_id" name="module_id" required>
                            <option value="" hidden disabled selected>Choose name</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banner_image">Image</label>
                        <input type="file" name="image" id="image" class="btn btn-default form-control">
                    </div>

                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
