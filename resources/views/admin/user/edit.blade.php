@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Admin</div>
            <div class="panel-body">
                <div class="panel-body">
                    <form  class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.update',$user->id) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Admin Name</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Admin Email</label>
                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>
                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">Password Confirm</label>
                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required>
                            </div>
                        </div>
                        <button class="btn btn-primary col-md-2 col-md-offset-8" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection