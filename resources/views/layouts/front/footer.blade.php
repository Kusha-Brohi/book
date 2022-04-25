@php $footer = DB::table('pages')->where('id', 7)->where('is_deleted',0)->first(); @endphp
<div class="newslatte-sec" style="background-image: url({{ asset($footer->image) }});">
        <div class="container">
            <div class="newsletter_inner">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <?= html_entity_decode($footer->content) ?>
                    </div>
                    <div class="col-md-6">
                        <div class="news-latr-form">
                            <form method="post" id="newsletterSubmit">
                                @csrf
                                <input type="text"  name="newsletter_email" placeholder="Email Address">
                                <button class="btn-1">Subscribe <i class="fa-regular fa-arrow-right-long"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Begin: FOOTER -->
    <!-- footer strat  -->
    <div class="footerSec">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="logo-part">

                        <div class="contact_info">
                            <img src="{{asset($logo->img_path)}}" alt="">
                            <p>Sunset Lake Publishing LLC</p>
                            <a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">{{ App\Http\Traits\HelperTrait::returnFlag(218) }}</a>
                            <a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}">{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</a>
                            <!-- <ul>
                                <li> <a href="#"><i class="fa-solid fa-envelope"></i> loremipsumn@gmail.com</a></li>
                                <li> <a href="#"><i class="fa-solid fa-phone"></i> 123-456-78900</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="menu-ftttr">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('book')}}">Books</a>
                       <!--  <a href="#">Stories</a> -->
                        <a href="{{url('video')}}">Videos</a>
                        <a href="{{url(blog)}}">Blogs</a>
                        <a href="{{url('about')}}">About</a>
                    </div>
                    <div class="social-links">
                        <div>
                            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><img src="{{asset('images/img-16.png')}}" alt="">
                            </a>
                            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1962) }}" target="_blank"><img src="{{asset('images/img-18.png')}}" alt="">
                            </a>


                            <h4>GET IN TOUCH</h4>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- footer strat  -->


    <div class="audio-onload">
        <audio src="audio/web.mp3"></audio>
        <button class="play-audio-btn"><i class="fa-solid fa-volume-slash"></i></button>
    </div>
   
<!-- END Footer -->  





