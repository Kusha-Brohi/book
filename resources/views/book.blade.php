@extends('layouts.main')
@section('content')


    <section class="blogs pb-8 pt-8">
        <div class="container">
            <div class="row">

                @foreach($books as $value)
                <div class="col-md-8  col-lg-6 col-xl-3">
                    <div class="blog_box">
                        <div class="blog_image">
                             <a href="{{url('book-details/'.$value->slug)}}">
                            <img src="{{asset($value->image)}}" alt="">
                          
                               </a>
                        </div>

                    </div>
                </div>
                @endforeach
                
                
                
                
            </div>
        </div>
    </section>





@endsection
@section('css')
<style>

</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection