@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

   
    <section class="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="about-side-img">
                        <img src="{{asset($cms_abt1->image)}}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-side-cont">
                        <?=html_entity_decode($cms_abt1->content)?>
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                               <?=html_entity_decode($cms_abt2->content)?>
                            </div>
                            <div class="col-md-6">
                                <?=html_entity_decode($cms_abt3->content)?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="new-release-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="release-cont">
                       
                      <?=html_entity_decode($book_release->content)?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="release-img">
                        <img src="{{asset($book_release->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-list-sec">
        <div class="container">
            <div class="product-slider">
                @foreach($books as $value)
                <div class="product-slide">
                    <a href="{{url('book-details/'.$value->slug)}}"> <img src="{{asset($value->image)}}" alt=""></a>

                    <div class="books_detail">
                        <?=html_entity_decode($value->book_detail)?>

                    </div>
                    <a class="read_btn" href="{{url('book-details/'.$value->slug)}}">View Book</a>
                </div>
                
                    @endforeach
                
                



            </div>
        </div>
    </section>



    










<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>
.books_detail h2{

    font-size: 24px;

}
</style>
@endsection

@section('js')
<script type="text/javascript"></script>
@endsection