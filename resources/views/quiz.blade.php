@extends('layouts.app')

@section('content')
<quiz-component
:times = "{{$quiz->minutes}}"
:quizId = "{{$quiz->id}}"
:quiz-questions = "{{$quizQuestions}}"
:has-quiz-taken = "{{$authUserHasTakenQuiz}}">
</quiz-component>

@endsection
