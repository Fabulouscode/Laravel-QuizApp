@extends('layouts.master')

@section('title', 'create quiz')

@section('content')

<div class="span9">
    <div class="content">
        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    <form action="{{route('question.store')}}" method="POST">@csrf
        <div class="module">
            <div class="module-head">
                <h3>CREATE QUESTION</h3>

            </div>
            <div class="module-body">
                <div class="control-group">
                    <label class="control-label">Choose Quiz</label>
                    <div class="controls">
                    <select name="quiz_id" class="span8">
                        {{-- <option value="">Select Quiz</option> --}}
                        @foreach(App\Quiz::all() as $quiz)
                          <option value="{{$quiz->id}}">{{$quiz->name}}</option>
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
                    <input type="text" name="question" class="span8" placeholder="Name of Quiz" value="{{old('question')}}">
                    <br>
                    @error('question')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>

                <label class="control-label">Options</label>
                <div class="controls">
                    @for($i = 0; $i<4; $i++)
                <input type="text" name="options[]" required=""  class="span7" placeholder="options{{$i+1}}" value="{{old('question')}}">
                <input type="radio" name="correct_answer" value="{{$i}}"> <span>Is Correct</span>
                @endfor
                <br>
                @error('question')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>

                <div class="controls">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>
</div>
@endsection
