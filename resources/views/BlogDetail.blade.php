@extends('layouts.main')
@section('content')
<?php
$updatedDate = $blogDetail->updated_at;

$date = date('j F, Y', strtotime($updatedDate));

$user = DB::table('users')->where('id',1)->first()->name;

?>
        
    <section class="blog_details pt-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="blog_d_image">
                   
                        <img src="{{asset($blogDetail->image)}}" alt="">
                        
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="blog_detail_info">
                        <h6><span>{{$date}}</span><span> By {{$user}}</span></h6> 
                        <h2>{{$blogDetail->name}}</h2>
                            <?=html_entity_decode($blogDetail->short_detail)?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?=html_entity_decode($blogDetail->detail)?>
                </div>
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