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
                        <input type="text" id="config_address" name="config_address" value="{{ $setting->config_address }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_email">Config Email</label>
                        <input type="email" id="config_email" name="config_email" value="{{ $setting->config_email }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_phone">Config Phone</label>
                        <input type="tel" id="config_phone" name="config_phone" value="{{ $setting->config_phone }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_fax">Config Fax</label>
                        <input type="tel" id="config_fax" name="config_fax" value="{{ $setting->config_fax }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_info">Config Info</label>
                        <textarea id="config_info" name="config_info" class="form-control" style="height: 100px">{{ $setting->config_info }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control" style="height: 100px">{{ $setting->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <textarea id="keywords" name="keywords" class="form-control" style="height: 100px">{{ $setting->keywords }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="config_image">Config Image</label>
                        @if($setting->config_image)
                            <img class="thumbnail img-responsive" src="{{ $setting->config_image }}" style="height: 100px;max-width:100%" alt="{{ $setting->config_image }}">
                        @endif
                        <input type="file" id="config_image" name="config_image" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_image_title">Config Image Title</label>
                        @if($setting->config_image_title)
                            <img class="thumbnail img-responsive" src="{{ $setting->config_image_title }}" style="height: 100px;max-width:100%" alt="{{ $setting->config_image_title }}">
                        @endif
                        <input type="file" id="config_image_title" name="config_image_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="config_ad_image">Config AD Image</label>
                        @if($setting->config_ad_image)
                            <div class="img-responsive">
                                @foreach(unserialize($setting->config_ad_image) as $item)
                                    <img src="{{ $item }}" style="height: 100px;max-width:100%" alt="{{ $item }}">
                                @endforeach
                            </div>
                        @endif
                        <input type="file" id="config_ad_image" name="config_ad_image[]" class="form-control" multiple>
                    </div>

                    <button class="btn btn-success pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
