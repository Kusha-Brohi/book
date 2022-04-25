@extends('layouts.main')
@section('content')


<section class="bannerSec">
	<img src="{{ asset('images/inner-page-banner.jpg') }}" class="img-responsive" alt="Banner">
	<div class="banner-overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Check Out</h1>
				</div>
			</div>
		</div>
	</div>
</section>

      <section class="form-body checkoutPage">
         <div class="container">
            
            <div class="row">
              <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12">
			  <h4>Billing Address</h4>
              <form action="{{route('order.place')}}" method="POST" id="order-place">
              @csrf
              
                <input type="hidden" name="payment_id" value="" />
                <input type="hidden" name="payer_id" value="" />
                <input type="hidden" name="payment_status" value="" />
                <input type="hidden" name="payment_method" id="payment_method" value="paypal" />

              @if(Auth::check())
                <?php  $_getUser= DB::table('users')->where('id', '=', Auth::user()->id)->first();?>
          
                     <div class="form-group">
                      <span class="invalid-feedback fname" >
                      <strong>{{ $errors->first('first_name') }}</strong></span>
                        <input class="form-control" id="f-name" name="first_name" value="{{old('first_name')?old('first_name'):$_getUser->name}}" placeholder="First Name *" type="text" required>
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback " >
                      <strong>{{ $errors->first('company_name') }}</strong></span>
                        <input class="form-control" id="compnayName" name="company_name" placeholder="Compnay Name " type="text" value="{{old('company_name')}}" required>
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('address_line_1') }}</strong></span>
                        <input class="form-control" id="address" name="address_line_1" placeholder="Address" type="text" value="{{old('address_line_1')}}" required>
                     </div>
                     <div class="form-group">
                       <span class="invalid-feedback" >
                       <strong>{{ $errors->first('city') }}</strong></span>
                        <input class="form-control right" placeholder="Town / City" name="city" id="city" type="text">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('country') }}</strong></span>

                    <select name="country" id="country" class="form-control left" placeholder="Select Country">
            @if(isset($countries) and count($countries) > 0)
           <option value="Select Country" selected="selected" disabled>Select Country</option>
              @foreach($countries as $country)
              <option value="{{ $country->sortname }} " data-countryId="{{ $country->id }}" >{{ $country->name }}</option>
              @endforeach
            @endif
          </select>

                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('phone_no') }}</strong></span>
                        <input class="form-control right" placeholder="Phone" name="phone_no" type="text" value="{{old('phone_no')}}">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('email') }}</strong></span>
                        <input class="form-control left" name="email" placeholder="Email" type="email" value="{{old('email')?old('email'):$_getUser->email}}">
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="compnayName" name="zip_code" placeholder="Postcode" type="text" value="{{old('zip_code')}}">
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5"></textarea>
                     </div>

                     @else

                     <a href="{{ url('signin') }}" target="_blank" class="runningBtn">Returning customer? Click here to login</a>

                     <div class="form-group">
                      <span class="invalid-feedback fname" >
                      <strong>{{ $errors->first('first_name') }}</strong></span>
                        <input class="form-control right" id="f-name" name="first_name" value="{{old('first_name')}}" placeholder="First Name" type="text">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback lname" >
                      <strong>{{ $errors->first('last_name') }}</strong></span>
                        <input class="form-control left" placeholder="Last Name" name="last_name" id="l-name" type="text" value="{{old('last_name')}}">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback " >
                      <strong>{{ $errors->first('company_name') }}</strong></span>
                        <input class="form-control" id="compnayName" name="company_name" placeholder="Compnay Name " type="text" value="{{old('company_name')}}">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('address_line_1') }}</strong></span>
                        <input class="form-control" id="address" name="address_line_1" placeholder="Address" type="text" value="{{old('address_line_1')}}">
                     </div>
                     <div class="form-group">
                       <span class="invalid-feedback" >
                       <strong>{{ $errors->first('city') }}</strong></span>
                        <input class="form-control right" placeholder="Town / City" name="city" id="city" type="text">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('country') }}</strong></span>
                       
                    <select name="country" id="country" class="form-control left" placeholder="Select Country">
            @if(isset($countries) and count($countries) > 0)
        <option value="Select Country" selected="selected" disabled>Select Country</option>
              @foreach($countries as $country)
              <option value="{{ $country->sortname }} " data-countryId="{{ $country->id }}" >{{ $country->name }}</option>
              @endforeach
            @endif
          </select>
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('phone_no') }}</strong></span>
                        <input class="form-control right" placeholder="Phone" name="phone_no" type="text" value="{{old('phone_no')}}">
                     </div>
                     <div class="form-group">
                      <span class="invalid-feedback" >
                      <strong>{{ $errors->first('email') }}</strong></span>
                        <input class="form-control left" name="email" placeholder="Email" type="email" value="{{old('email')}}">
                     </div>
                     <div class="form-group">
                        <input class="form-control" id="compnayName" name="zip_code" placeholder="Postcode" type="text" value="{{old('zip_code')}}">
                     </div>
                     @if(!Auth::check())
                     <div class="form-group">
                        <label class="chkbox">
                        <input type="checkbox" name="create_account" id="create_account"  {{ (! empty(old('create_account')) ? 'checked' : '') }}>
                        Create An Account?</label>
                        <br/>
              <span class="invalid-feedback" >
              <strong>{{ $errors->first('password') }}</strong></span>
              <input type="password" class="form-control left" name="password" placeholder="Password">
               
              <span class="invalid-feedback" >
              <strong>{{ $errors->first('confirm_password') }}</strong></span>
              <input type="password" class="form-control right" name="confirm_password" placeholder="Confirm Password">

                     </div>
                     @endif 
                     <div class="form-group">
                        <textarea class="form-control" id="comment" name="order_notes" placeholder="Order Note" rows="5"></textarea>
                     </div>
                     @endif
                  </form>
               </div>
               <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12">
                  <div class="YouOrder">
                     <h1>YOUR ORDER</h1>
                     <hr>
                    <?php $subtotal  = 0; $addon_total = 0; ?>
                     @foreach($cart as $key=>$value)
                     <h5>{{ $value['name'] }} x {{ $value['qty'] }} <span>${{ $value['baseprice'] * $value['qty'] }}</span></h5>
                     <?php $subtotal+= $value['baseprice'] * $value['qty']; ?> 
                     @endforeach  
                     <hr>
                     <h2>Item Subtotal <span>${{ $subtotal }}</span></h2>
                     <hr>
                     <h2> Your Shipping <span>FREE</span></h2>
                     <hr>
                     <h3> Total Price <span>${{ $subtotal }}</span></h3>
                     <hr>
                     <div class="radio">
                        <label>
                        <input checked="" name="optradio" value="paypal" type="radio">
                        Paypal <img src="{{ asset('images/pay.png') }}"> </label>
                        <input type="hidden" name="price" value="{{ $subtotal }}" />
            <input type="hidden" name="product_id" value="" />
            <input type="hidden" name="qty" value="value['qty']" />
            
                     </div>
                     <hr>
                     <div id="paypal-button-container-popup"></div>
                     <button type="submit" class="hvr-wobble-skew" style="display:none">place order</button>
                  <!--   <a class="PaymentMethod-a" id="paypal-button-container-popup" href="#" style="display:none"></a> -->
                  </div>
               </div>
            </div>
         </div>
      </section>


      



  
@endsection
@section('css')
<style type="text/css">
  .form-group input.form-control {
    border-width: 1px;
    border-color: rgb(215, 215, 215);
    border-style: solid;
    border-radius: 6px;
  background-color: #fff;
    height: 45px;
}
form.loginForm {
    padding: 20px;
}

.body-space {
    padding: 60px 0;
}

span.invalid-feedback.fname {
    float: left;
    width: 100%;
    color: red;
}

span.invalid-feedback.lname {
    float: left;
    width: auto;
    color: red;
    margin-top: -22px;
}

.form-group label {
    color: #000;
}

.form-control {
  height: 45px;
}

.checkoutPage h4 {
    font-size: 39px;
    color: #000000;
    text-transform: uppercase;
}

</style>
@endsection
@section('js')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>

$(document).ready(function() { 
  
     /* countries,states and cities script*/
  $( "#country" ).change(function() {
         $("#state").html('');
      var country_id = $('option:selected', this).attr('data-countryId');
    // alert(country_id)
          var  data = { country_id: country_id };
  
      $.ajax({
      type    : 'POST',
      data    : data,
      dataType : 'json',
       cache: false,
      //async: true,
      //contentType: false,
      //processData: false,
      url     : '{{url('/states')}}',
      beforeSend: function (request) {
      return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
      },
      success: function (result) {
    
      //alert(result.states.length);
    
        var res = result.states;
    
        //var opts = "<option value='""'>'Select State'</option>";
        var opts = '';
        for (var i = 0; i < result.states.length; i++) {
          if( $('#shipping_state_prev').val() == res[i].name ) {
            opts += "<option selected='selected' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
          } {

          selected = "";

            opts += "<option '" + selected + "' value='" + res[i].name + "' data-stateId='" + res[i].id + "'>" + res[i].name + "</option>";
     
          }
        }
        
        $("#state").append(opts);
        $("#state").change();
        
        
      },
        error:function (error) {
          generateNotification('error','Could not fetched please try again');
        }
      });
    
      
  });

    $( "#state" ).change(function() {
            $("#city").html('');
            var state_id = $('option:selected', this).attr('data-stateId');
      
            var  data = { state_id: state_id };
            
            $.ajax({
            type    : 'POST',
            data    : data,
            dataType : 'json',
                    cache: false,
            url     : '{{url('/cities')}}',
            beforeSend: function (request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function (result) {
            
            var res = result.cities;
            
            var opts = '';
            for (var i = 0; i < result.cities.length; i++) {
        /*
                if( $('#shipping_city_prev').val() == res[i].name ) {
                    opts += "<option selected='selected'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                } {
                    opts += "<option '" + selected + "'  value='" + res[i].name + "'>" + res[i].name + "</option>";
                }
        */
        opts += "<option value='" + res[i].name + "'>" + res[i].name + "</option>";
            }
            $("#city").append(opts);
        },
        error:function (error) {
      generateNotification('error','Could not fetched please try again');
        }
        });
    });
    $("#country").change();
  
   })
  
   $(document).on('click', ".btn", function(e){

   $('#order-place').submit();
    
  });
  
  $('.bttn').on('change', function() {
     //alert('it works');
     //value = $(this).val();
      var count = 0;
      //var $(this) = $('input[type="checkbox"]');
     if($(this).prop("checked") == true){
     //if(value == 'paypal') {
       
       //$('.btn').hide();
       
      
       //alert($('#f-name').val());
       if($('#f-name').val()== "") {
        $('.fname').text('first name is required field');
       } else {
        $('.fname').text("");
        count++; 
       } 
       
       if($('#l-name').val()== "") {
        $('.lname').text('last name is required field');
       } else {
        $('.lname').text("");
        count++; 
       }

        
       if(count == 2) {
        $('#paypal-button-container-popup').show();
       } else {
         $(this).prop("checked",false);
         
         $.toast({
                  heading: 'Alert!',
                  position: 'bottom-right',
                  text:  'Please fill the required fields before proceeding to pay',
                  loaderBg: '#ff6849',
                  icon: 'error',
                  hideAfter: 5000,
                  stack: 6
              }); 
         
         return false;
         
       }
       
     } else {
       

       
       $('#paypal-button-container-popup').hide();
      // $('.btn').show();
     }
     
     $('input[name="' + this.name + '"]').not(this).prop('checked', false);
     //$(this).siblings('input[type="checkbox"]').prop('checked', false);
  });
  
  paypal.Button.render({
  env: 'production', //sandbox
      
  style: {
    label: 'checkout',
    size:  'responsive',  
    shape: 'rect',    
    color: 'gold'      
  },
  client: { 
    //sandbox: 'AfFoE9Jcdf3JPtEvj2H4naH6nMqc0rgUDe4UhN6JHMhQkodTcFsqaHz38AQHdvs4Mys9pQ97vXA_56jr',
    production:'ARIYLCFJIoObVCUxQjohmqLeFQcHKmQ7haI-4kNxHaSwEEALdWABiLwYbJAwAoHSvdHwKJnnOL3Jlzje',
  },
  payment: function(data, actions) {
    return actions.payment.create({
      payment: {
        transactions: [
          {
            amount: { total: {{number_format(((float)$subtotal),2, '.', '')}}, currency: 'USD' }
          }
        ]
      }
    });
  },
  onAuthorize: function(data, actions) {
    return actions.payment.execute().then(function() {
      // generateNotification('success','Payment Authorized');
      
       $.toast({
                  heading: 'Success!',
                  position: 'bottom-right',
                  text:  'Payment Authorized',
                  loaderBg: '#ff6849',
                  icon: 'success',
                  hideAfter: 1000,
                  stack: 6
              });
      
      var params = {
        payment_status:'Completed',
        paymentID: data.paymentID,
        payerID: data.payerID
      };
      
      // console.log(data.paymentID);
      // return false;
      $('input[name="payment_status"]').val('Completed');
      $('input[name="payment_id"]').val(data.paymentID);
      $('input[name="payer_id"]').val(data.payerID);
      $('input[name="payment_method"]').val('paypal');
      $('#order-place').submit();
    });
  },
  onCancel: function(data, actions) {
      var params = {
        payment_status:'Failed',
        paymentID: data.paymentID
      };
      $('input[name="payment_status"]').val('Failed');
      $('input[name="payment_id"]').val(data.paymentID);
      $('input[name="payer_id"]').val('');
      $('input[name="payment_method"]').val('paypal');
  }
  }, '#paypal-button-container-popup');
  
  
  
  
  
  
  
</script>
@endsection