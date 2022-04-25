<?php $segment = Request::segments();

/*Home banner */
$banner = DB::table('banners')->where('id',1)->where('is_deleted',0)->first();
$banner_images = DB::table('product_imagess')->where('product_id',1)->get();
$video_banner = DB::table('banners')->where('id',2)->where('is_deleted',0)->first();
$blog_banner = DB::table('banners')->where('id',3)->where('is_deleted',0)->first();
$about_banner = DB::table('banners')->where('id',4)->where('is_deleted',0)->first();
$stories = DB::table('stories')->where('deleted_at',null)->get();
$books = DB::table('books')->where('deleted_at',null)->where('status','active')->get();
?>

 <!-- banner start -->
 @if(isset($segment) && $segment == null)
    <section class="banner">
        <div class="">
            <div class="row">
                <div class="banner-txt">
                    <!-- <h1>Brian D. Ratty</h1> -->
                    <div class="col-lg-4">
                        <div class="award-wrp">
                            <h3>Writer <br> Photographer <br> Publisher</h3>
                            <div class="awards-slider">
                                @foreach($banner_images as $value)
                                <img src="{{asset($value->image)}}" alt="">
                                @endforeach
                    
                            </div>
                            <h4>{{$banner->title}} </h4>

                        </div>
                    </div>
                    <div class="banner-img">
                        <?=html_entity_decode($banner->description)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @elseif(isset($segment[0]) && $segment[0] == 'home')
    <section class="banner">
        <div class="">
            <div class="row">
                <div class="banner-txt">
                    <!-- <h1>Brian D. Ratty</h1> -->
                    <div class="col-lg-4">
                        <div class="award-wrp">
                            <h3>Writer <br> Photographer <br> Publisher</h3>
                            <div class="awards-slider">
                                @foreach($banner_images as $value)
                                <img src="{{asset($value->image)}}" alt="">
                                @endforeach
                    
                            </div>
                            <h4>{{$banner->title}} </h4>

                        </div>
                    </div>
                    <div class="banner-img">
                        <?=html_entity_decode($banner->description)?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @elseif(isset($segment[0]) && $segment[0] == 'video')
    <section class="banner inner-banner contact-bann stories" style="
    background: url({{asset($video_banner->image)}}) no-repeat top center/ cover;">

        <div class="container">

            <div class="row">

                <div class="banner-txt">

                    <h1 class="text-right">{{$video_banner->title}}</h1>

                </div>

            </div>

        </div>

    </section>

    @elseif(isset($segment[0]) && $segment[0] == 'blog')
       <section class="banner inner-banner contact-bann stories" style="
    background: url({{asset($blog_banner->image)}}) no-repeat top center/ cover;">

        <div class="container">

            <div class="row">

                <div class="banner-txt">

                    <h1 class="text-right">{{$blog_banner->title}}</h1>

                </div>

            </div>

        </div>

    </section>  

     @elseif(isset($segment[0]) && $segment[0] == 'about')
       <section class="banner inner-banner contact-bann" style="
    background: url({{asset($about_banner->image)}}) no-repeat top center/ cover;">

        <div class="container">

            <div class="row">

                <div class="banner-txt">

                    <h1 class="text-right">{{$about_banner->title}}</h1>

                </div>

            </div>

        </div>

    </section>

   
    @elseif(isset($segment[0]) && $segment[0] == 'blog-details')
    <section class="banner inner-banner contact-bann stories">

        <div class="container">

            <div class="row">

                <div class="banner-txt">

                    <h1 class="text-right">Blog Details</h1>

                </div>

            </div>

        </div>

    </section>   

     @elseif(isset($segment[0]) && $segment[0] == 'book')
       <!-- banner start -->
    <section class="banner inner-banner book-banner">
        <div class="container">
            <div class="row">
                <div class="banner-txt">
                    <h1>BOOKS</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->     

    @elseif(isset($segment[0]) && $segment[0] == 'book-details')
       <!-- banner start -->
    <section class="banner inner-banner book-banner">
        <div class="container">
            <div class="row">
                <div class="banner-txt">
                    <h1>Book Details</h1>
                </div>
            </div>
        </div>
    </section> 


       @elseif(isset($segment[0]) && $segment[0] == 'story')
       <!-- banner start -->
    <section class="banner inner-banner contact-bann stories story_banner">

        <div class="container">

            <div class="row">

                <div class="banner-txt">

                    <h1 class="text-right">Stories</h1>

                </div>

            </div>

        </div>

    </section>
    <!-- banner end -->
     @endif

    <!-- banner end -->
    <!-- header strat -->
    <header>
        <div class="main-navigate">
            <div class="container">
                <div class="row nav-flex">
                    <div class="sidenav" id="mySidenav">
                        <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
                    </div>
                    <div class="mobilecontainer d-lg-none  d-md-none">
                        <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer">☰</span>
                    </div>
                    <div class="col-12  d-none d-md-block ">
                        <div class="navigation">
                            <ul class="navbar-set ">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url(book)}}">Books <i class="fa-solid fa-angle-down"></i> </a>
                                    <ul>
                                        @foreach($books as $value)
                                        <li><a href="{{url('book-details/'.$value->slug)}}">{{$value->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Stories <i class="fa-solid fa-angle-down"></i></a>
                                    <ul>
                                        {{-- @foreach($stories as $value) --}}
                                        {{-- <li><a href="{{url('story/'.$value->slug)}}">{{$value->name}}</a></li> --}}
                                        {{-- @endforeach --}}
                                        <li><a href="{{url('shadow-of-robert-gray')}}">Shadow Of Robert Gray</a></li>
                                        <li><a href="{{url('the-shoot-horses')}}">The Shoot Horses</a></li>
                                        <li><a href="{{url('the-spirit-of-the-tillamook-people')}}">The Spirit Of The Tillamook People</a></li>
                                        <li><a href="{{url('give-em-hell-harry')}}">Give Em Hell Harry</a></li>
                                        <li><a href="{{url('rescue-from-the-rock')}}">Rescue From The Rock</a></li>
                                        <li><a href="{{url('fortress-astoria')}}">Fortress Astoria</a></li>

                                  <!--       <li><a href="the-shoot-horses.html">Shoot Horses</a></li>
                                        <li><a href="the-spirit-of-the-tillamook-people copy.html"> Spirit Tillamook People</a></li>
                                        <li><a href="give-em-hell-harry.html">Give ’em Hell, Harry</a></li>
                                        <li><a href="rescue-from-the-rock.html">Rescue from the Rock</a></li>
                                        <li><a href="fortress-astoria.html">Fortress Astoria</a></li> -->
                                    </ul>
                                </li>
                                <li><a href="{{url('video')}}">Videos</a></li>
                                <li><a href="{{url(blog)}}">Blogs</a></li>
                                <li><a href="{{url('about')}}">About</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header strat -->