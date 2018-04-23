@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">新增管理者</div>
            <div class="panel-body">
                <div class="panel-body">
                    <form  class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">名稱</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">E-mail</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">密碼</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control" name="password"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">確認密碼</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <button class="btn btn-primary col-md-2 col-md-offset-8" type="submit">確 認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection