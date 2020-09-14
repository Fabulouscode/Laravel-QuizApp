<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Quiz;
use App\Result;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function create()
    {
        return view('exam.assign');
    }

    public function assign(Request $request)
    {
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

    public function remove(Request $request){
        $data = $this->validateForm($request);
        $userId = $request->get('user_id');
        $quizId = $request->get('quiz_id');
        $quiz = Quiz::find($quizId);
        $result = Result::where('quiz_id',$quizId)->where('user_id', $userId)->exists();
        if($result){
            return   redirect()->back()->with('message', 'User have taken the quiz and can not be unassign');
        }else{
            $quiz->users()->detach($userId);
            return   redirect()->back()->with('message', 'Quiz unassigned successfully');
        }
    }

    public function getQuizQuestions(Request $request, $quizId)
    {
        $authUser = auth()->user()->id;
        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id', $quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();
        $authUserHasTakenQuiz = Result::where(['user_id'=>$authUser, 'quiz_id'=>$quizId])->get();

        return view('quiz', compact('quiz', 'quizQuestions', 'authUserHasTakenQuiz', 'time'));
    }

    public function validateForm($request){
        return $this->validate($request, [
            'quiz_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
