<?php 
$segment = Request::segments();
/*dd($segment);*/
?>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'onkeyup'=>'generateSlug(this.value);'] : ['class' => 'form-control'])!!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly'] : ['class' => 'form-control']) !!}
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('link') ? 'has-error' : ''}}">
    {!! Form::label('link', 'Purchasing link', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('link', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('book detail') ? 'has-error' : ''}}">
    {!! Form::label('book_detail', 'Book Detail', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('book_detail', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('book_detail', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('info') ? 'has-error' : ''}}">
    {!! Form::label('info', 'Info', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('info', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor2', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('info', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor1', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">

        <div class="max-text">
        <img alt="" class="img-responsive" id="banner1" 
        src="{{ isset($book)?asset($book->image):asset('images/upload.jpg') }}" style="width: 30%;"> 
        <br/>
        </div>
        <br/>

        {!! Form::file('image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>
    
    <div  class="form-group row justify-content-center {{ $errors->has('images') ? 'has-error' : ''}}">
    {!! Form::label('images', 'Gallery Images', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
    @if(isset($book_images) && count($book_images) > 0)
      <div class="max-text">
        @foreach($book_images as $pimage)
        <div class="gallery_css">
            <a href="{{ route('bookimage.delete', $pimage->id) }}" class="delete_css">X</a>
                <img style="width: 100%;padding: 10px;" alt="" class="img-responsive" id="banner1" 
                src="{{ asset($pimage->image) }}" > 
        </div>  
        @endforeach        
      </div>
    @else            
    @endif  

    </div>
    
        <div class="col-md-12">
        <br/>
              <div id="demo"></div>
        <br/>
        </div>

</div>




          @if(isset($segment) && $segment[2] != 'create')
<!-- active -->

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('status') ? 'has-error' : ''}}">
    
    <div class="col-md-12">
        <label for="is_active" class="col-md-12 control-label"><input type="checkbox" name="status" value="active" @if($book->status == 'active') checked @endif > Active Book</label>
        
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif

<div class="form-group row justify-content-center">
    <div class="col-lg-4 col-12 align-content-center">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>




<style>
a.delete_css {
    position: absolute;
    background: red;
    padding: 5px 10px;
    color: #fff;
    font-weight: 800;
}

.gallery_css {
    width: 24%;
    float: left;
    margin: 0px 4px;
    height: 222px;

}


/*.box{
  display: none;
}*/
</style>

@push('js')


<script type="text/javascript">
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#banner1').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function() {
  readURL(this);
});
</script>

<script>
$("#demo").spartanMultiImagePicker({
  fieldName:  'images[]'
});

</script>

<!-- slug script -->
<script>

    var custom=function(){
        return {
            create_slug:function (string) {
                var $slug = '';
                var trimmed = $.trim(string);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }
        }
    }

    function generateSlug(string){
        $('#slug').val(custom().create_slug(string));
    }

</script>
<!-- slug script -->

@endpush