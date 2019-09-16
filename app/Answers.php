<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $fillables = ['user_id','body'];

    public function questions(){
        return $this->belongsTo(Questions::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){
        return \Parsedown::instance()->text($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($answer) {
            $answer->questions->increment('answers_count');                     
        });        

        static::deleted(function ($answer) {            
            $answer->questions->decrement('answers_count');            
        });
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
