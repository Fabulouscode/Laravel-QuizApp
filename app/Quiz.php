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

    public function getQuizById($id){
        return Quiz::find($id);
    }


}
