@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->
<?php 

    $categories = DB::table('categories')->get();
   use App\wishlists;

?>

    <section class="bannerSec">
      <img src="{{ asset('images/inner-page-banner.jpg') }}" class="img-responsive" alt="Banner">
      <div class="banner-overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>Store</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="products-sec body-space">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="products-tabs">
              <ul class="nav nav-tabs" role="tablist">
                <h3>Categories</h3>
				
				@foreach($categories as $value)
                <li role="presentation"><a href="{{ url('category-detail/'.$value->id) }}">{{$value->name}}</a></li>
                @endforeach 
				
              </ul>
            </div>
          </div>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="lights">
			  
				@foreach(array_chunk($shop, 3) as $product)
					<div class="row">
					@foreach($product as $value)
					  <div class="col-md-4 col-sm-4 col-xs-12">
						<div class="product-box">
						  <div class="product-img"><img class="img-responsive" src="{{ asset($value->image) }}" alt="image"></div>
						  <h4>{{ $value->product_title }}</h4>
						  <a href="{{ URL('shop-detail/'.$value->id) }}"><h5>$ {{ $value->price }}</h5></a>
						</div>
					  </div>
					@endforeach
					</div> 
				@endforeach
				
              </div>
			  
            </div>
          </div>
        </div>
      </div>
    </section>



<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>
.filter_sorting ul.list-group {
    margin-right: 25px !important;
    margin-top: 15px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
	
</script>
@endsection