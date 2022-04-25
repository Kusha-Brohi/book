@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->

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

<section class="main-pro-dtail">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div class="proImageSlider">
                  <!-- Tab panes -->
                  <div class="main-one-this">
                    <div class="pro-big-img">
                      <img id="zoom_05" alt="img" src="{{ asset($product_detail->image) }}" data-zoom-image="images/product-detail-img.jpg') }}" class="img-responsive">
                      <div class="half-at">
                        <a data-fancybox="gallery" class=" info-btn" href="{{ asset($product_detail->image) }}"><img src="{{ asset($product_detail->image) }}" alt=""></a>
                      </div>
                    </div>
                    </div><!-- Nav tabs -->
                    
                  </div>
                </div>
                
          <form method="post" action="{{ route('save_cart') }}" id="add-cart">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" id="product_id" value="{{ $product_detail->id }}">

                <div class="col-md-6 col-xs-12 col-sm-12">
                  <div class="detail-name">
                    <h1>{{ $shop->product_title }} <span>|</span> ${{ $shop->price }}</h1>
                <!--<div class="rat-set">
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                    </div> -->
                    <select>
                      <option>What’s Good About It</option>
                    </select>
                    <ul>
                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                      <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                    </ul>
                    
                    <div class="wunty-check">
                      <h1>Quantity</h1>
                      <div class="input-group"> <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]"> <i class="fa fa-minus" aira-hidden="true"></i> </button>
                      </span>
                      <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> <i class="fa fa-plus" aira-hidden="true"></i> </button>
                      </span> </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="add-cart-btn">
                      <a href="javascript:void(0)" id="addCart">Add To Cart</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="truck-text">
                      <p><i class="fa fa-truck" aria-hidden="true"></i>Lorem ipsum dolor sit amet</p>
                      <p><i class="fa fa-pencil" aria-hidden="true"></i>Lorem ipsum dolor sit amet</p>
                    </div>
                  </div>
                </div>

            </form>

              </div>
            </div>
</section>

<div class="description">
            <div class="">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 col-xs-12 col-sm-12">
                    <h1>Description</h1>
                    <?= html_entity_decode($product_detail->description) ?>
                  </div>
                </div>
              </div>
            </div>
</div>

<section class="realted-product">
<div class="container">
	<div class="body-space">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="related-info">
					<img src="{{ asset('images/pro-img-1.png') }}" alt="">
					<h5>Oil Filters</h5>
					<h4>$120.00</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="related-info">
					<img src="{{ asset('images/pro-img-2.png') }}" alt="">
					<h5>Fuel filters</h5>
					<h4>$100.00</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="related-info">
					<img src="{{ asset('images/pro-img-3.png') }}" alt="">
					<h5>Brake Drums</h5>
					<h4>$120.00</h4>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-12">
				<div class="related-info">
					<img src="{{ asset('images/pro-img-4.png') }}" alt="">
					<h5>Brake Shoes</h5>
					<h4>$150.00</h4>
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
</style>
@endsection
@section('js')
<script type="text/javascript">

$(document).on('click', "#addCart", function(e){
$('#add-cart').submit();
});

$(document).on('keydown keyup', ".qty", function(e) {
if ( $(this).val() <= 1 ) {
e.preventDefault();
$(this).val( 1 );
}
});

</script>
@endsection