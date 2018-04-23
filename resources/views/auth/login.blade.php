@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel panel-default">
                <div class="panel-heading">登入</div>
                <div class="panel-body">
                    <form  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="control-label">帳戶</label>
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">密碼</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-success pull-right col-md-2">確 認</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
