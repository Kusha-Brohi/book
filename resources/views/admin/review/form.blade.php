<div id="category" class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('book_id') ? 'has-error' : ''}}">
    <div class="col-md-12">
        {!! Form::Label('book_id', 'Select Book') !!}

        <select class="form-control" name="book_id" id="category">
            <option selected="" disabled="">Select book</option>
            @foreach($book as $key=>$value)
            <option value="{{$key}}" @if($review->book_id == $key) selected @endif>{{$value}}</option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('comment') ? 'has-error' : ''}}">
    {!! Form::label('comment', 'Comment', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('comment', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('editor') ? 'has-error' : ''}}">
    {!! Form::label('editor', 'Editor', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('editor', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('editor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
