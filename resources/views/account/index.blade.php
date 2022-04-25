@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>


<!-- banner_sec -->
<section class="banner_sec">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="inner_text wow fadeInUp" data-wow-duration="2s">
          <h1>Account</h1>
        </div>  
      </div>
    </div>
  </div>
</section>
<!-- banner_sec -->



<main class="my-cart">
    <!-- banner start -->
    <!-- banner end -->

<!-- main content start -->

 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <!-- @include('widgets.accountSidebar') -->
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
    
                                            <div class="welcome">
                                                <h2>ACCOUNT AREA COMING SOON</h2>
                                             <h3> <a href="{{ url('logout') }}" class="logout"> Logout</a></h3>   
                                           <!--      <p>Hello, <strong>{{ Auth::user()->name }}</strong> (If Not <strong>{{ Auth::user()->name }} !</strong><a href="{{ url('logout') }}" class="logout"> Logout</a>)</p>
                                            </div>
    
                                            <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p> -->
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
    
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <!-- my account wrapper end -->


<!-- main content end -->   
</main>

@endsection
@section('css')
<style type="text/css">
    
</style>
@endsection
@section('js')
<script type="text/javascript">
     $(document).on('click', ".btn1", function(e){
            // alert('it works');
            $('.loginForm').submit();
     });
</script>
@endsection