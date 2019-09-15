<?php

namespace App\Policies;

use App\User;
use App\Questions;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can update the questions.
     *
     * @param  \App\User  $user
     * @param  \App\Questions  $questions
     * @return mixed
     */
    public function update(User $user, Questions $questions)
    {
        //
        return $user->id == $questions->user_id;
    }

    /**
     * Determine whether the user can delete the questions.
     *
     * @param  \App\User  $user
     * @param  \App\Questions  $questions
     * @return mixed
     */
    public function delete(User $user, Questions $questions)
    {
        //
        return $user->id == $questions->user_id && $questions->answers_count < 1;
    }
}
