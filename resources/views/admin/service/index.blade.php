@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">服務項目</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.service.destroy') }}" data-ajax="{{ route('admin.service.index') }}">Delete</button>
            </div>
            <a role="ajax" href="{{ route('admin.service.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">Create</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center"><input type="checkbox" class="delete_toggle" style="zoom: 1.2"></th>
                        <th style="width: 20%" class="text-center">標題</th>
                        <th style="width: 20%" class="hidden-xs text-center">內容</th>
                        <th style="width: 25%" class="hidden-xs text-center">圖片</th>
                        <th style="width: 10%" class="text-center">排序</th>
                        <th style="width: 15%" class="text-center">操作</th>
                    </tr>
                    @if(Auth::check())
                        @foreach($services as $service)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="delete_list" name="delete_list[]" style="zoom: 1.2;margin: 10px 0 0 0" value="{{ $service->id }}">
                                </td>
                                <td class="text-center">
                                    {{ $service->title }}
                                </td>
                                <td class="hidden-xs text-center">
                                    {{ str_limit($service->content,30,'...') }}
                                </td>
                                <td class="hidden-xs text-center">
                                    {{ str_limit($service->image,30,'...') }}
                                </td>
                                <td class="text-center">
                                    {{ $service->order }}
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a role="ajax" href="{{ route('admin.service.edit',$service->id) }}"  type="button" class="btn btn-success form-control">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <div class="Pages text-center">
                    {!! $services->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection