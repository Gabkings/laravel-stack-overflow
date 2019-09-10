@extends('layouts.app') @section('content') <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto"><a href="{{ route('questions.create') }}">Ask Question</a></div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts._message') 
                    @foreach($questions as $question)
                     <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="votes"><strong> 
                                    {{ $question->votes_count }}
                                </strong> 
                                {{ str_plural('vote', $question->votes_count) }}
                            </div>
                            <div class="answers {{ $question->status }}"><strong> 
                                    {{ $question->answers_count }}
                                </strong> 
                                {{  str_plural('answer', $question->answers_count) }}
                            </div>
                            <div class="views"> 
                                {{  $question->views." ". str_plural('view', $question->views) }} 
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                    <h3><a href="{{ $question->url }}"> {{  $question->title }}</a></h3>
                                    <div class="ml-auto">
                                    @if(Auth::user()->can('update-question', $question))
                                        <button class="btn btn-sm btn-outline-info"><a href="{{ route('questions.edit', $question->id) }}">Edit Question</a></button>
                                        @endif
                                        @if(Auth::user()->can('delete-question', $question))
                                        <form class="form-delete" method="post" action="{{ route('questions.destroy', $question->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure')">DELETE</button>
                                        </form>
                                        @endif
                                    </div>
                            </div>
                           
                            <p class="lead">Asked By <a href="{{ $question->user->url }}"> 
                                    {{ $question->user->name }}
                                </a><small class="muted"> 
                                    {{ $question->created_date }}
                                </small></p>
                            <p> 
                                {{ str_limit($question->body, 400) }}
                            </p>
                        </div>
                    </div>
                    <hr>@endforeach 
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>@endsection