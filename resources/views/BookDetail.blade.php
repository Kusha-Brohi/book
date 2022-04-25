@extends('layouts.main')
@section('content')
    <section class="book-pg-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="book">
                        <div class="row align-items-center">
                            <div class="col-md-6 p-0">
                                <div class="book_image">
                                    <img src="{{asset($BookDetail->image)}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="book_detail">
                                    <!-- <div class="star-rate">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div> -->
                                    <?=html_entity_decode($BookDetail->book_detail)?>
                                    @foreach($booksimages as $value)
                                    <img src="{{asset($value->image)}}" alt="">
                                    @endforeach
                                    <h3>{{$BookDetail->name}}</h3>
                                    @if($BookDetail->writter_name != null)
                                    <p>{{$BookDetail->writter_name}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="book-det-cont">
                        <!-- <h2>Trail of Discovery</h2> -->
                        <!-- <div class="star-rate">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div> -->
                        <div class="more-dtail">
                          <?=html_entity_decode($BookDetail->info)?>
                        </div>
                        <a href="{{url($BookDetail->link)}}" target="_blank" class="btn-1">BUY NOW</a>
                        <!-- <p>We all come into this world alone and go out the same way. Between coming and going is life. This is a story about life and how a yearlong adventure defines the future of a reluctant young man named Dutch Clarke.</p> -->
                        <!-- <a href="https://www.amazon.com/Early-Years-Trail-Discovery-Clarke/dp/0692254722/" target="_blank" class="btn-1">BUY NOW</a> -->
                        <!-- <p>Manipulated by the terms of his dead grandfather’s will, Dutch undertakes his ordeal in the rugged wilderness of British Columbia. Set against the opening days of World War II, this is a classic story of a young man’s personal struggle to come of age against all odds.</p>
                        <img src="images/winner.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="description-sec">
        <div class="container">
              <?=html_entity_decode($BookDetail->description)?>
            <!-- <div class="multi-price-sec">
                <p>Soft Cover Price $20.00 - Kindle Edition $3.99</p>
                <p>Soft Cover Size 6" x 9"</p>
            </div> -->
            <h3>Selected Reviews</h3>
            <!-- <div class="reviews-box">
                <div class="archive-til">
                    <span><i class="fa-solid fa-user"></i> By : Admin</span>
                    <span><i class="fa-solid fa-user"></i> 05 April 2021</span>
                    <span><i class="fa-solid fa-user"></i> Comments : 10</span>
                </div>
            </div> -->
                @foreach($reviews as $value)
            <div class="reviews-box">
                <div class="archive-til">
                    <span><i class="fa-solid fa-user"></i> By : Admin</span>
                    <span><i class="fa-solid fa-user"></i> 05 April 2021</span>
                    <span><i class="fa-solid fa-user"></i> Comments : 10</span>
                </div>
                <div class="review-cont-wrp">
                    <img src="images/dam_1.jpg" alt="">
                    <?=html_entity_decode($value->comment)?>
                    @if($value->editor != null)<b>{{$value->editor}}</b>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
@section('css')
<style>
.more-dtail ul {
    margin: 0 0 20px;
    padding: 0;
    color: black;
    list-style: revert;
}
</style>
@endsection
@section('js')
<script type="text/javascript"></script>
@endsection