<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $fillables = ['user_id','question_id', 'answer', 'vote_count'];

    public function question(){
        return $this->belongsTo(Questions::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public static function boot(){
        parent::boot();
        static::created(function($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        })
    }
}
