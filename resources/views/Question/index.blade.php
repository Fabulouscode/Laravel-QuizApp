@extends('layouts.master')

@section('title', 'Questions')

@section('content')
<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>All Question</h3>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th>Quiz</th>
                            <th>Date</th>
                            <th>View Answers</th>
                            @if(Auth::user()->is_admin == 1)
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($questions) > 0)
                        @foreach($questions as $key=>$question)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->quiz->name}}</td>
                        <td>{{date('F d, Y', strtotime($question->created_at))}}</td>
                        <td><a href="{{route('question.show',[$question->id])}}" class="btn btn-primary">View</a></td>
                        @if(Auth::user()->is_admin == 1)
                        <td><a href="{{route('question.edit',[$question->id])}}" class="btn btn-primary">Edit</a></td>
                        <td>
                        <form id="delete_form{{$question->id}}" method="POST" action="{{route('question.destroy', [$question->id])}}">@csrf
                        @method('DELETE');

                        </form>
                        <a href="#" onclick="if(confirm('Do you want to delete?')){
                            event.preventDefault();
                        document.getElementById('delete_form{{$question->id}}').submit()
                        }else{
                        event.preventDefault();
                        }
                        ">
                    <input type="submit" value="DELETE" class="btn btn-danger">
                    </a>
                        </td>
                        @endif
                        </tr>
                        @endforeach
                        @else
                        <td>No Question to display</td>
                        @endif
                    </tbody>
                </table>
                <div class="pagination pagination-centered">
                {{$questions->links()}}
                </div>
        </div>
    </div>
</div>

@endsection
