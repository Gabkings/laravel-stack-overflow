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
    @include('answers._index',
    ["answers" => $question->answers,
      "answerCount" => $question->answers_count
    ])

    @include('answers._create')
</div>
@endsection