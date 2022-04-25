<?php 
$segment = Request::segments();
/*dd($segment);*/
?>

<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('page_name') ? 'has-error' : ''}}">

    {!! Form::label('page_name', 'Page Name', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12" >
      <select name="page_name" class="form-control" id="type">
        <option value="" selected disabled="">Please Select Page Name</option>  
        @if($banner->page_name == "home")
        <option value="home" selected="">Home</option>
        @else
         <option value="home">Home</option>
        @endif
        @if($banner->page_name == "videos")
        <option value="videos" selected="">Videos</option>
        @else
        <option value="videos">Videos</option>
        @endif
        @if($banner->page_name == "blogs")
        <option value="blogs" selected="">Blogs</option>
        @else
        <option value="blogs">Blogs</option>
        @endif
        @if($banner->page_name == "about")
        <option value="about" selected="">About</option>
        @else
        <option value="about">About</option>
        @endif
      </select>
      <!--   {!! Form::text('page_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('page_name', '<p class="help-block">:message</p>') !!} -->
    </div>
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group row justify-content-center col-md-12 {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
        {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group row justify-content-center  {{ $errors->has('image') ? 'has-error' : ''}}">
    {!! Form::label('image', 'Image', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">

      <div class="max-text">
        <img alt="" class="img-responsive" id="banner1" 
        src="{{ isset($banner)?asset($banner->image):asset('images/upload.jpg') }}" style=" width: 30%; "> 
        <br/>
      </div>
        <br/>
        {!! Form::file('image', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>


</div>


<div id="row_dim"  class="form-group row justify-content-center {{ $errors->has('images') ? 'has-error' : ''}}">
    {!! Form::label('images', 'Gallery Images', ['class' => 'col-md-12 control-label']) !!}
    <div class="col-md-12">
    @if(isset($product_images) && count($product_images) > 0)
      <div class="max-text">
        @foreach($product_images as $pimage)
        <div class="gallery_css">
            <a href="{{ route('image.delete', $pimage->id) }}" class="delete_css">X</a>
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

<script>
 $(function() {
  /*  $('#row_dim').hide(); */
    $('#type').change(function(){
        if($('#type').val() == 'home') {
            $('#row_dim').show(); 
        } else {
            $('#row_dim').hide(); 
        } 
    });
});
</script>


@if(isset($segment[3]) && $segment[3] == 'edit')
<script type="text/javascript">
    $(document).ready(function(){
        var value = $('#type').val();
           
        if(value == 'home'){
            $('#row_dim').show();
        }
        else{
           $('#row_dim').hide(); 
        }
    });
    
</script>
@endif


@endpush