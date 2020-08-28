<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class Quiz extends Model
{
    protected $fillable = ['name', 'description', 'minutes'];
    public function question(){
        return $this->hasMany(Question::class);
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }

    public function getQuizById($id){
        return Quiz::find($id);
    }

    public function updateQuiz($data, $id){
        return Quiz::find($id)->update($data);
    }
}
