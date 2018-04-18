@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Admin</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.user.destroy') }}" data-ajax="{{ route('admin.user.index') }}">Delete</button>
            </div>
            <a role="ajax" href="{{ route('admin.user.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">Create</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center"><input type="checkbox" class="delete_toggle" style="zoom: 1.2"></th>
                        <th style="width: 20%" class="text-center">Name</th>
                        <th style="width: 30%" class="hidden-xs text-center">Email</th>
                        <th style="width: 25%" class="hidden-xs hidden-sm text-center">Rigster</th>
                        <th style="width: 15%;" class="text-center">Done</th>
                    </tr>
                    @if(Auth::check())
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="delete_list" name="delete_list[]" style="zoom: 1.2;margin: 10px 0 0 0" value="{{ $user->id }}">
                                </td>
                                <td class="text-center">
                                    {{ $user->name }}
                                </td>
                                <td style="word-break: break-all;" class="hidden-xs text-center">
                                    {{ $user->email }}
                                </td>
                                <td class="hidden-xs hidden-sm text-center">
                                    <p >{{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d')  }}</p>
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a role="ajax" href="{{ route('admin.user.edit',$user->id) }}"  type="button" class="btn btn-success form-control">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <div class="Pages text-center">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection