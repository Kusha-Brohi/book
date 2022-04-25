@extends('layouts.main')
@section('content')

    <section class="vide_section">
        <div class="container">
            <div class="text-center">
                <img height="150px" src="{{asset('images/now.png')}}" alt="">
            </div>

                @foreach($video as $value)
            <div class="video_row">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <img src="{{asset($value->image)}}" alt="">
                    </div>
                    <div class="col-lg-4">
                        <a href="{{url($value->link)}}" target="_blank">
                            <h2>{{$value->name}}</h2>
                        </a>
                        <h3>{{$value->duration}}</h3>
                    </div>
                    <div class="col-lg-4">
                        <?=html_entity_decode($value->detail)?>
                    </div>
                </div>
            </div>
                @endforeach
            
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