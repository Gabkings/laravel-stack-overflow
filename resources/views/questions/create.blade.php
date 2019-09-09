@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}">Back to Questions</a>
                        </div>
                    </div>
                    </div>

                <div class="card-body">
                       <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question-title" class="label-control">Title</label>
                            <input type="text" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid':''}}" name="title">
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body" class="label-control">Explain your Question</label>
                            <textarea class="form-control {{ $errors->has('title') ? 'is-invalid':''}}" name="body" id="question-body" cols="30" rows="10"></textarea>
                            @if($errors->has('body'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </div>
                        @endif
                        </div>
                        <div class="form-group">
                                    <input type="submit" class="btn-outline-primary btn-lg " value="Post your Question">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection