<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\User;
class Quiz extends Model
{
    protected $fillable = ['name', 'description', 'minutes'];
    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function getQuizById($id){
        return Quiz::find($id);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'quiz_user');
    }


}
