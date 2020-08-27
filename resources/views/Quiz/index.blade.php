@extends('layouts.master')

@section('title', 'quizzes')

@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>All Quiz</h3>
            </div>
            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quiz Name</th>
                            <th>Minutes</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($quizzes) > 0)
                        @foreach($quizzes as $key=>$quiz)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$quiz->name}}</td>
                        <td>{{$quiz->minutes}}</td>
                        <td>{{$quiz->description}}</td>
                        <td><a href="{{route('quiz.edit',[$quiz->id])}}" class="btn btn-primary">Edit</a></td>
                        <td>
                        <form id="delete_form{{$quiz->id}}" method="POST" action="{{route('quiz.destroy', [$quiz->id])}}">@csrf
                        {{method_field('DELETE')}}

                        </form>
                    <a href="#" onclick="if(confirm('Do you want to delete?')){
                        event.preventDefault();
                    document.getElementById('delete_form{{$quiz->id}}').submit()
                    }else{
                     event.preventDefault();
                    } 
                    ">
                <input type="submit" value="DELETE" class="btn btn-danger">    
                </a>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <td>No Quiz to display</td>
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
</div>

@endsection
