@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                   <div class="card-title">
                       <div class="d-flex align-items-center">
                           <h2>{{$question->title}}</h2>
                           <div class="ml-auto">
                               <a href="{{ route('questions.index') }}">Back to Questions</a>
                           </div>
                       </div>
                   </div>

                   <div class="media">
                       <div class="d-flex flex-column vote-controls">
                           <a title="This question is useful vote up" class="vote-up">
                               <i class="fas fa-caret-up fa-3x"></i>
                           </a>
                           <span class="votes-count">123</span>
                           <a title="This question is not useful vote down">
                               <i class="fas fa-caret-down fa-3x"></i>
                           </a>
                           <a title="Mark as your favorite answer (Click to undo)" class="favorite favorited mt-2">
                               <i class="fas fa-star fa-2x"></i>
                               <span class="favorite-count">123</span>
                           </a>
                       </div>
                       <div class="media-body">
                       {!! $question->body_html !!}

                           <div class="float-right">
                               <span class="text-muted mt-2"> Answered {{$question->created_date}} </span>
                               <div class="media">
                                   <a href="{{$question->user->url}}" class="pr-2" >
                                       <img src="{{$question->user->avatar}}" >
                                   </a>
                                   <div class="media-body mt-4">
                                       <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$question->answers_count ." ". str_plural('Answer', $question->answers_count)}}
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="This question is useful vote up" class="vote-up">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">123</span>
                                <a title="This question is not useful vote down">
                                    <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a title="Mark this answer accepted (Click to undo)" class="vote-accepted mt-2">
                                    <i class="fas fa-check fa-2x"></i>
                                    <span class="favorite-count">123</span>
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                    <div class="float-right">
                                        <span class="text-muted mt-2"> Answered {{$answer->created_date}} </span>
                                        <div class="media">
                                            <a href="{{$answer->user->url}}" class="pr-2" >
                                                <img src="{{$answer->user->avatar}}" >
                                            </a>
                                            <div class="media-body mt-4">
                                                <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection