@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                        @foreach( $questions as $question)
                    <div class="media">
                        <div class="media-body">
                            <h3><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                            <p class="lead">
                                Asked By 
                                <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="muted">{{ $question->created_date }}</small>
                            </p>
                            <p>{{ str_limit($question->body,300) }}</p>
                        </div>
                    </div>
                    <hr>  
                    @endforeach
                        {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection