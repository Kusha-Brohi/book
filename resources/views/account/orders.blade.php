@extends('layouts.main')
@section('content')

<?php $segment = Request::segments(); ?>

<!-- banner_sec -->
<section class="banner inner-banner">
        <div class="container container-large">
            <div class="row">
                <div class="col-12">
                    <div class="banner-text">
                        <h1>Order History</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- banner_sec -->


<main class="my-cart">
  
 <!-- my account wrapper start -->
    <div class="my-account-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            @include('widgets.accountSidebar')  
                            <!-- My Account Tab Menu End -->
    
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                   
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="orders" role="#">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
    
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Order Number</th>
                                                            <th>Date</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
    
                                                    <tbody>
                                                    
                                                    @if($ORDERS)
                                                    @php
                                                    $i = 0;
                                                    @endphp

                                                        @foreach($ORDERS as $ORDER)
                                                         @php
                                                    $i++;
                                                    @endphp
                                                            <tr>
                                                              <td>{{ $i }}</td>
                                                             
                                                              <td>{{ $ORDER->id  }}</td>
                                                              <?php
                                                            $date = date('j F, Y', strtotime($ORDER->created_at));
                                                              ?>
                                                              <td>{{$date}}</td>
                                                              <td>${{ $ORDER->order_total  }}.00</td>
                                                              <td class="viewbtn"><a href="{{ route('invoice',[$ORDER->id]) }}">View</a></td>
                                                              
                                                            </tr>
                                                        @endforeach
                                                    @endif
                    
                                                    </tbody>
                                                </table>
                                            </div>
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
</main
>

@endsection
@section('css')
<style type="text/css">
.viewbtn  a {
    text-decoration: none;
    color: #30bf60;
    white-space: initial;
}
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