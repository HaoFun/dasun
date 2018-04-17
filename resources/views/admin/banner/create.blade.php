@extends('layouts.admin')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">新增橫幅圖片</div>
        <div class="panel-body">
            <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group {{ $errors->has('banner_title') ? 'has-error':''}}">
                    <label for="banner_title">橫幅圖片對應標題</label>
                    <input type="text"  name="banner_title" value="{{ old('banner_title') }}" class="form-control" placeholder="請輸入橫幅圖片對應標題">
                </div>

                <div class="form-group {{ session()->has('warning') ? 'has-error':'' }} {{ $errors->has('images') ? 'has-error':'' }}">
                    <label for="images">橫幅圖片 <span style="color: #FF2222">(限上傳一張，建議尺寸:1300x278)</span></label>
                    <input type="file" name="images">
                </div>

                <button class="btn btn-primary pull-right" type="submit">確　認</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ mix('js/juploader_only.js') }}" type="text/javascript"></script>
@endsection
