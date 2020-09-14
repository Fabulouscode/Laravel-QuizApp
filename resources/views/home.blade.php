@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if($isExamAssigned)
                    @foreach($quizzes as $quiz)

                    <p><h3>{{$quiz->name}}</h3></p>
                    <p>About Quiz: {{$quiz->description}}</p>
                    <p>Time allow: {{$quiz->minutes}} Minutes</p>
                    <p>Number of Questions: {{$quiz->questions->count()}}</p>
                    <p>
                        @if(!in_array($quiz->id, $wasQuizCompleted))
                    <a href="/quiz/{{$quiz->id}}">
                           <button class="btn btn-primary"> Start</button>

                        </a>
                        @else
                        <span class="btn btn-outline-primary">Completed</span>
                        @endif
                    </p>

                    @endforeach

                    @else
                    <p>You have no assigned exams</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
