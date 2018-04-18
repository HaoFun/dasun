@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Setting-{{ $setting->config_name }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.setting.update',$setting->id)  }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="config_name">Config name</label>
                        <input type="text" id="config_name" name="config_name" value="{{ $setting->config_name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_address">Config Address</label>
                        <input type="text" id="config_address" name="config_address" value="{{ $setting->config_address }}" class="form-control" placeholder="請輸入公司地址">
                    </div>

                    <div class="form-group">
                        <label for="config_email"></label>
                        <input type="email" id="config_email" name="config_email" value="{{ $setting->config_email }}" class="form-control" placeholder="請輸入聯絡手機">
                    </div>

                    <div class="form-group">
                        <label for="config_phone"></label>
                        <input type="tel" id="config_phone" name="config_phone" value="{{ $setting->config_phone }}" class="form-control" placeholder="請輸入聯絡手機">
                    </div>

                    <div class="form-group">
                        <label for="config_house"></label>
                        <input type="tel" id="config_house" name="config_house" value="{{ $setting->config_house }}" class="form-control" placeholder="請輸入聯絡手機">
                    </div>

                    <div class="form-group">
                        <label for="config_fax"></label>
                        <input type="tel" id="config_fax" name="config_fax" value="{{ $setting->config_fax }}" class="form-control" placeholder="請輸入聯絡手機">
                    </div>

                    <div class="form-group">
                        <label for="description"></label>
                        <textarea id="description" name="description" class="form-control" style="height: 100px">{{ $setting->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="keywords"></label>
                        <textarea id="keywords" name="keywords" class="form-control" style="height: 100px">{{ $setting->keywords }}</textarea>
                    </div>
                    <button class="btn btn-success pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
