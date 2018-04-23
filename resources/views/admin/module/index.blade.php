@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">模板管理</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.module.destroy') }}" data-ajax="{{ route('admin.module.index') }}">Delete</button>
            </div>
            <a role="ajax" href="{{ route('admin.module.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">Create</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center"><input type="checkbox" class="delete_toggle" style="zoom: 1.2"></th>
                        <th style="width: 20%" class="text-center">模板名稱</th>
                        <th style="width: 20%" class="hidden-xs text-center">模板Url</th>
                        <th style="width: 25%" class="hidden-xs text-center">模板內容</th>
                        <th style="width: 10%" class="text-center">排序</th>
                        <th style="width: 15%" class="text-center">操作</th>
                    </tr>
                    @if(Auth::check())
                        @foreach($modules as $module)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="delete_list" name="delete_list[]" style="zoom: 1.2;margin: 10px 0 0 0" value="{{ $module->id }}">
                                </td>
                                <td class="text-center">
                                    {{ $module->name }}
                                </td>
                                <td class="hidden-xs text-center">
                                    {{ $module->url }}
                                </td>
                                <td style="word-break: break-all;" class="hidden-xs text-center">
                                    {{ str_limit(strip_tags($module->content),10,'...') }}
                                </td>
                                <td class="text-center">
                                    {{ $module->order }}
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a role="ajax" href="{{ route('admin.module.edit',$module->id) }}"  type="button" class="btn btn-success form-control">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <div class="Pages text-center">
                    {!! $modules->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
