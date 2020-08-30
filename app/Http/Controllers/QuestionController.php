<?php

namespace App\Http\Controllers;
use App\Quiz;
use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $limit = 12;
    private $order = 'DESC';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', $this->order)->with('quiz')->paginate($this->limit);
        return view('Question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateForm($request);
        $question = Question::create($data);
        foreach($data['options'] as $key=>$option){
         $is_correct = false;
         if($key == $data['correct_answer']){
             $is_correct = true;
         }
         $answer = Answer::create([
             'question_id' => $question->id,
             'answer' => $option,
             'is_correct' => $is_correct
         ]);
        }

        return redirect()->route('question.index')->with('message', 'Question created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('Question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $this->validateForm($request);

        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz_id'];
        $question->update();

          $this->deleteAnswer($question->id);

        foreach($data['options'] as $key=>$option){
            $is_correct = false;
            if($key == $data['correct_answer']){
                $is_correct = true;
            }
            $answer = Answer::create([
                'question_id' => $question->id,
                'answer' => $option,
                'is_correct' => $is_correct
            ]);
           }
        return redirect()->route('question.show', $id)->with('message', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateForm($request){
        return $this->validate($request, [
            'question' => 'required|string',
            'quiz_id' => 'required|string',
            'options' => 'bail|required|array',
            'options.*' => 'bail|required|string|distinct',
            'correct_answer' => 'required'
        ]);
    }

    public function deleteAnswer($questionId)
    {
       Answer::where('question_id', $questionId)->delete();
    }
}
