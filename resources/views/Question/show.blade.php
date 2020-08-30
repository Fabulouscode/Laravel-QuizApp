@extends('layouts.master')

@section('title', 'create quiz')

@section('content')

<div class="span9">
    <div class="content">
        <div class="module">
            <div class="module-head">
                <h3>VIEW ANSWERS</h3>
            </div>
            @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <div class="module-body">
            <p><h3 class="heading">{{$question->question}}</h3></p>
                <div class="module-body table">
                    <table class="table table-message">

                            @foreach ($question->answers as $key=>$answer)

                        <tbody>
                            <tr>
                            <td class="cell-author hidden-phone hidden-tablet">{{$key+1}}. {{$answer->answer}}
                                @if($answer->is_correct)

                                <span class="badge badge-success pull-right"><b>Correct</b></span></td>
                                @endif

                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

     </div>
 </div>
 @endsection
