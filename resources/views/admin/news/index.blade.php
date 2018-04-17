@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">最新消息</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.news.destroy') }}" data-ajax="{{ route('admin.news.index') }}">刪　除</button>
            </div>
            <a role="ajax" href="{{ route('admin.news.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">新　增</a>
                        <div class="panel-body">
                            <table class="table table-bordered" >
                                <tr>
                                    <th style="width: 10%" class="text-center"><input type="checkbox" class="checktoggle" style="zoom: 1.2"></th>
                                    <th style="width: 20%" class="hidden-xs text-center">發布日期</th>
                                    <th style="width: 20%" class="text-center">最新消息標題</th>
                                    <th style="width: 35%" class="hidden-xs text-center">最新消息內文</th>
                                    <th style="width: 15%" class="text-center">操作</th>
                                </tr>
                                @if(Auth::check())
                                    @foreach($news as $value)
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="delete_list" name="delete_list[]" style="zoom: 1.2;margin: 10px 0 0 0" value="{{ $value->id }}">
                                            </td>
                                            <td class="hidden-xs text-center">
                                                {{ $value->publish_at }}
                                            </td>
                                            <td style="word-break: break-all;" class="text-center">
                                                {{ str_limit(strip_tags($value->title),15,'...') }}
                                            </td>
                                            <td style="word-break: break-all;" class="hidden-xs text-left">
                                                {{ str_limit(strip_tags($value->content),100,'...') }}
                                            </td>
                                            <td class="text-center">
                                                <div style="margin-bottom: 3px">
                                                    <a role="ajax" href="{{ route('admin.news.edit',$value->id) }}"  type="button" class="btn btn-success form-control">編　輯</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                <div class="Pages text-center">
                    {!! $news->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
