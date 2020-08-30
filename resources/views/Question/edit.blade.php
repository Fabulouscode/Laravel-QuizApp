@extends('layouts.master')

@section('title', 'update question')

@section('content')

<div class="span9">
    <div class="content">
        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    <form action="{{route('question.update',[$question->id])}}" method="POST">@csrf
        {{method_field('PUT')}}
        <div class="module">
            <div class="module-head">
                <h3>EdIT QUESTION</h3>

            </div>
            <div class="module-body">
                <div class="control-group">
                    <label class="control-label">Choose Quiz</label>
                    <div class="controls">
                    <select name="quiz_id" class="span8">
                        {{-- <option value="">Select Quiz</option> --}}
                        @foreach(App\Quiz::all() as $quiz)
                          <option value="{{$quiz->id}}"
                            @if($quiz->id == $question->quiz_id)selected @endif

                           > {{$quiz->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    @error('minutes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
                    <label class="control-label">Qestion</label>
                    <div class="controls">
                    <input type="text" name="question" class="span8" placeholder="Name of Quiz" value="{{$question->question}}">
                    <br>
                    @error('question')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <label class="control-label">Options</label>
                <div class="controls">
                    @foreach($question->answers as $key => $answer)
                <input type="text" name="options[]" required=""  class="span7"  value="{{$answer->answer}}">
                <input type="radio" class="radio" name="correct_answer" value="{{$key}}"
                @if($answer->is_correct){{'checked'}} @endif
                ><span>Is Correct</span>
                @endforeach
                <br>
                @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

                <div class="controls">
                    <button type="submit" class="btn btn-primary">Update</button>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
@endsection
