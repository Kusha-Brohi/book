@extends('layouts.main')
@section('content')


    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                                <?=html_entity_decode($cms_abt1->content)?>
                    <div class="text-center">
                        <img src="{{asset($cms_abt1->image)}}" alt="">
                    </div>
                        <?=html_entity_decode($cms_abt2->content)?>
                    <div class="text-center">
                        <img src="{{asset($cms_abt2->image)}}" alt="">
                    </div>
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