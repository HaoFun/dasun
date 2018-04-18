@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $question->question }}</div>
            <div class="panel-body">
                <form action="{{ route('admin.question.update',$question->id)  }}" method="post">
                    {{ method_field('PATCH') }}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" id="question" name="question" value="{{ $question->question }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <input type="text" id="answer" name="answer" value="{{ $question->answer }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="text" id="order" name="order" value="{{ $question->order }}" class="form-control">
                    </div>
                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
