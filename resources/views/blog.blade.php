@extends('layouts.main')
@section('content')


    <section class="blogs pb-8 pt-8">
        <div class="container">
            <div class="row">

                @foreach($blog as $value)
                <div class="col-lg-4 col-md-6">
                    <div class="blog_box">
                        <div class="blog_image">
                            <img src="{{asset($value->image)}}" alt="">
                            <div class="blog_title">
                                <h2>{{$value->name}}</h2>
                                <a href="{{url('blog-details/'.$value->slug)}}">Read More</a>
                            </div>
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