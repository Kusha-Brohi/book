@extends('layouts.main')

@section('content')

<section class="bannerSec">
	<img src="{{ asset('images/inner-page-banner.jpg') }}" class="img-responsive" alt="Banner">
	<div class="banner-overlay">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Add To Cart</h1>
			</div>
		</div>
	</div>
	</div>
</section>


<section class="cartsec">
<div class="container">

 <form method="post" action="{{ route('update_cart') }}" id="update-cart">

	{{ csrf_field() }}	

	<input type="hidden" name="type" id="type" value="">

	<?php $subtotal  = 0; $addon_total = 0; ?>	

<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Item</th>
					<th class="">Quantity</th>
					<th>Unit Price</th>
					<th>Sub Price</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
             	@foreach($cart as $key=>$value)
				
					<?php 
					    if($key == 'shipping') {
					        continue;
					    }
						$prod_image = App\Product::where('id',$value['id'])->first();
					?>

				<tr>
                           <td>
                              <div class="row">
                                 <div class="col-md-3 no-margin"> <img src="{{ asset($prod_image->image) }}" alt="" class="img-responsive"> </div>
                                 <div class="col-md-9">
                                    <h5>{{ $value['name'] }}</h5>
                                 </div>
                              </div>
                           </td>
                           <td class="text-center">
                           	<input type="number" max="10" min="1" name="qty[]" class="qtystyle" value="{{ $value['qty'] }}">
                           </td>
                           <td>
                              <h4>${{ $value['baseprice'] }}</h4>
                           </td>
                           <td>
                              <h4>${{ $value['baseprice'] * $value['qty'] }}</h4>
                           </td>
                           <td>
                           	<a href="javascript:void(0)" class="updateCart remove">✓</a>
                           	<a href="javascript:void(0)" onclick="window.location.href='{{ route('remove_cart',[$value['id']]) }}'" class="remove">x</a>
                           </td>
                        </tr>
				
				
					<input type="hidden" name="product_id[]" id="" value="<?php echo $value['id']; ?>">
					<?php $subtotal+= $value['baseprice'] * $value['qty']; ?>  
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="checkoutsec">
		<div class="row">
			<div class="col-md-4 text-center"> <a href="{{ url('shop') }}"><i class="fa fa-angle-left"></i> Continue Shopping</a> </div>
			<div class="col-md-6 text-center">
				<a class="checkout_css" href="{{ url('checkout') }}">Proceed To Checkout</a>
				
				</div>
			</div>
		</div>
	</div>
</form>

	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="check-out-detail">
			<h2>Sub Total <span>${{$subtotal }}</span></h2>
			<h2>Shipping <span>$0</span></h2>
			<h2 class="price">Total<span class="price">${{$subtotal }}</span></h2>
		</div>
		<!-- <div class="freeshipping">
			<h2>Shipping</h2>
			<span>Courier ($15)</span>
			<h2>Estimate For</h2>
			<span>United Estate,NY,1230</span>
		</div> -->
	</div>
</div>
</section>

@endsection

@section('css')

<style type="text/css">

a.checkout_css {
    color: #fff;
    height: 41px;
    padding-top: 8px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    text-transform: uppercase;
    background: #bd2323;
    font-family: 'Oswald', sans-serif;
}

</style>

@endsection

@section('js')

<script type="text/javascript">

	
 $(document).on('click', ".updateCart", function(e){

	 $('#type').val($(this).attr('data-attr'));
	 $('#update-cart').submit();
		
 });
 
 $(document).on('keydown keyup', ".qtystyle", function(e) {
	if ( $(this).val() <= 1 ) {
		e.preventDefault();
		$(this).val( 1 );	
	}

});


</script>

<script>

	function validate(evt) {
	  var theEvent = evt || window.event;

	  // Handle paste
	  if (theEvent.type === 'paste') {
		  key = event.clipboardData.getData('text/plain');
	  } else {
	  // Handle key press
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode(key);
	  }
	  var regex = /[0-9]|\./;
	  if( !regex.test(key) ) {
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	  }
	}

	$(document).on('click', ".addCoupon", function(e){
		$('#addCoupon').submit(); 
	});  
	
	
	$('input.qtystyle').on('input',function(e){
		// alert('Changed!')
		// alert($(this).val());
		// alert($(this).attr('data-attr-stock'));
		
		if( parseInt($(this).val()) >   parseInt($(this).attr('data-attr-stock')) ) {
			$(this).val(parseInt($(this).attr('data-attr-stock')));
			generateNotification('danger','please select only available '+parseInt($(this).attr('data-attr-stock'))+' items in stock');
		}
		
	});

</script>

<script>
function myFunction() {
  alert("Please Calculate Shipping First!");
}
</script>

@endsection

