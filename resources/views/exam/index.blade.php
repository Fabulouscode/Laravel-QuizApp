@extends('layouts.master')

@section('title', 'exam assigned user')

@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>User Exam</h3>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quiz Name</th>
                            <th>User Name</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($quizzes) > 0)
                        @foreach($quizzes as $key=>$quiz)
                        @foreach($quiz->users as $key=>$user)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$quiz->name}}</td>
                        <td>{{$user->name}}</td>
                        <td><a href="{{route('quiz.show',[$quiz->id])}}" class="btn btn-primary">View Questions</a></td>
                        <td>
                        <form action="{{route('exam.remove')}}" method="POST">@csrf

                            <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="quiz_id" value="{{$quiz->id}}">
                                <button class="btn btn-danger" type="submit">Remove</button>
                            </form>

                        </td>
                        </tr>
                        @endforeach
                        @endforeach
                        @else
                        <td>No User to display</td>
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection
