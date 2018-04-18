@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Question</div>
            <div>
                <button class="btn btn-danger pull-right col-md-2 delete_all" style="margin: 10px 5px 10px 0" type="button" data-url="{{ route('admin.question.destroy') }}" data-ajax="{{ route('admin.question.index') }}">Delete</button>
            </div>
            <a role="ajax" href="{{ route('admin.question.create') }}" style="margin: 10px 5px 10px 0" class="btn btn-primary pull-right col-md-2">Create</a>
            <div class="panel-body">
                <table class="table table-bordered" >
                    <tr>
                        <th style="width: 10%" class="text-center"><input type="checkbox" class="delete_toggle" style="zoom: 1.2"></th>
                        <th style="width: 30%" class="text-center">Question</th>
                        <th style="width: 30%" class="text-center">Answer</th>
                        <th style="width: 15%" class="text-center">Order</th>
                        <th style="width: 15%" class="text-center">Done</th>
                    </tr>
                    @if(Auth::check())
                        @foreach($questions as $question)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="delete_list" name="delete_list[]" style="zoom: 1.2;margin: 10px 0 0 0" value="{{ $question->id }}">
                                </td>
                                <td class="text-center">
                                    {{ str_limit(strip_tags($question->question),30,'...') }}
                                </td>
                                <td class="text-center">
                                    {{ str_limit(strip_tags($question->answer),30,'...') }}
                                </td>
                                <td class="text-center">
                                    {{ $question->order }}
                                </td>
                                <td class="text-center">
                                    <div style="margin-bottom: 3px">
                                        <a role="ajax" href="{{ route('admin.question.edit',$question->id) }}"  type="button" class="btn btn-success form-control">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <div class="Pages text-center">
                    {!! $questions->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
