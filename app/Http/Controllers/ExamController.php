<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function create()
    {
        return view('exam.assign');
    }

    public function assign(Request $request)
    {
        if(!Auth::user()->is_admin == 1){
            abort(404, 'Page not found');
        }
        $data = $this->validateForm($request);
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];
        $quiz->users()->syncWithoutDetaching($userId);
        return   redirect()->back()->with('message', 'Quiz assigned successfully');

    }

    public function userExam(Request $request)
    {
        $quizzes = Quiz::get();
        return view('exam.index', compact('quizzes'));
    }

    public function validateForm($request){
        return $this->validate($request, [
            'quiz_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
