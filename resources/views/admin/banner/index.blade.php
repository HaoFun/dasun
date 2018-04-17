@extends('layouts.admin')
@section('content')
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                橫幅圖片
            </div>
            <a href="{{ route('admin.banner.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">新增橫幅圖片</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center">對應標題</th>
                        <th style="width: 75%" class="hidden-xs text-center">圖片</th>
                        <th style="width: 15%" class="text-center">操作</th>
                    </tr>
                    @if(Auth::check())
                        @foreach($banners as $banner)
                            <tr>
                                <td class="text-center">
                                    {{ $banner->banner_title }}
                                </td>
                                <td class="hidden-xs text-center">
                                    <div style="white-space:nowrap;overflow:auto">
                                        <div style="width: auto;height:180px" class="pull-left">
                                            @if(count(unserialize(base64_decode($banner->banner_images))) !== 0)
                                                @foreach(unserialize(base64_decode($banner->banner_images)) as $image)
                                                    <img src="{{ asset($image).'?v='.time() }}" style="height: 180px" class="img-responsive img-thumbnail">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a href="{{ route('admin.banner.edit',$banner->id) }}"  type="button" class="btn btn-success form-control">編　輯</a>
                                    </div>
                                    <div>
                                        <form action="{{ route('admin.banner.destroy',$banner->id) }}" method="post" class="delete-form">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button class="btn btn-danger form-control" type="button" onclick="ConfirmDelete(this)">刪　除</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
                @endif
                <div class="Pages text-center">
                    {!! $banners->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection