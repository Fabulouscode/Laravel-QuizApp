@extends('layouts.master')

@section('title', 'create question')

@section('content')

<div class="span9">
    <div class="content">
        @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    <form action="{{route('exam.assignExam')}}" method="POST">@csrf
        <div class="module">
            <div class="module-head">
                <h3>ASSIGN QUIZ</h3>

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
                    <label class="control-label">Choose User</label>
                    <div class="controls">
                        <select name="user_id" class="span8">
                            {{-- <option value="">Select Quiz</option> --}}
                            @foreach(App\User::where('is_admin','0')->get() as $user)
                              <option value="{{$user->id}}">{{$user->email}}</option>
                            @endforeach
                        </select>
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
