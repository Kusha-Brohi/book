<div class="form-group row justify-content-center {{ $errors->has('story_id') ? 'has-error' : ''}}">
    <label for="story_id" class="col-md-4 control-label">{{ 'Story Id' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="story_id" type="text" id="story_id" value="{{ $storycontent->story_id ?? ''}}" required> --}}
        <select name="story_id" class="form-control" id="">
            <option value="">Select Story</option>
            @foreach ($story as $item)
            <option value="{{$item->id}}">{{$item->name??""}}</option>
            @endforeach
        </select>
        {!! $errors->first('story_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $storycontent->title ?? ''}}" >
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('descrtiption') ? 'has-error' : ''}}">
    <label for="descrtiption" class="col-md-4 control-label">{{ 'Descrtiption' }}</label>
    <div class="col-md-6">
        <textarea class="form-control ckeditor" rows="5" name="descrtiption" type="textarea" id="descrtiption" >{{ $storycontent->descrtiption ?? ''}}</textarea>
        {!! $errors->first('descrtiption', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="col-md-4 control-label">{{ 'Image' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="image" type="file" id="image" value="{{ $storycontent->image ?? ''}}" >
        <input type="hidden" name="old_image" value="{{$storycontent->image}}" id="">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText ?? 'Create' }}">
    </div>
</div>
