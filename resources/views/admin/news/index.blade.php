@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">News</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.news.destroy') }}" data-ajax="{{ route('admin.news.index') }}">Delete</button>
            </div>
            <a role="ajax" href="{{ route('admin.news.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">Create</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center"><input type="checkbox" class="delete_toggle" style="zoom: 1.2"></th>
                        <th style="width: 20%" class="hidden-xs text-center">Publish At</th>
                        <th style="width: 20%" class="text-center">Title</th>
                        <th style="width: 10%" class="text-center">Type</th>
                        <th style="width: 25%" class="hidden-xs text-center">Content</th>
                        <th style="width: 15%" class="text-center">Done</th>
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
                                    {{ str_limit(strip_tags($value->title),10,'...') }}
                                </td>
                                <td class="text-center">
                                    {{ $value->type }}
                                </td>
                                <td style="word-break: break-all;" class="hidden-xs text-center">
                                    {{ str_limit(strip_tags($value->content),30,'...') }}
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a role="ajax" href="{{ route('admin.news.edit',$value->id) }}"  type="button" class="btn btn-success form-control">Edit</a>
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
