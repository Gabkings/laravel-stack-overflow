

<div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$answerCount ." ". str_plural('Answer', $answerCount)}}
                    </div>
<hr>
                    @include('layouts._message')
@foreach($answers as $answer)
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