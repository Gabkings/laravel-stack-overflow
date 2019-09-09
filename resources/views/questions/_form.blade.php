@csrf
                        
<div class="form-group">
    <label for="question-title" class="label-control">Title</label>
    <input type="text" value="{{ old('title',$question->title) }}" id="question-title" class="form-control {{ $errors->has('title') ? 'is-invalid':''}}" name="title">
    @if($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body" class="label-control">Explain your Question</label>
    <textarea  class="form-control {{ $errors->has('body') ? 'is-invalid':''}}" name="body" id="question-body" cols="30" rows="10">{{ old('body', $question->body) }}</textarea>
    @if($errors->has('body'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('body') }}</strong>
    </div>
@endif
</div>
<div class="form-group">
            <input type="submit" class="btn-outline-primary btn-lg " value="{{ $buttonText }}">
</div>