

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>You answers</h3>
                </div>
                <hr>
                <form action="{{route('questions.answers.store', $question->id)}}" method="post">
                    @csrf
                <div class="form-group">
                    <label for="body" class="label-control">Answer</label>
                    <textarea class="form-control {{$errors->has('body') ? 'is-invalid': ''}}" name="body" id="body" cols="7" rows="7"></textarea>
                    @if($errors->has('body'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('body')}}</strong>
                        </div>
                    @endif
                </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>