@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="panel panel-default">
            <div class="panel-heading">Add Question</div>
            <div class="panel-body">
                <form action="{{ route('admin.question.store')  }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="question">Question</label>
                        <input type="text" id="question" name="question" value="{{old('question')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <input type="text" id="answer" name="answer" value="{{old('answer')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="order">Order</label>
                        <input type="text" id="order" name="order" value="{{old('order')}}" class="form-control">
                    </div>

                    <button class="btn btn-primary pull-right col-md-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
