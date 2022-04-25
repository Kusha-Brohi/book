<aside class="left-sidebar">
    <ul class="nav-bar  @if(!auth()->check()) d-none @endif navbar-inverse hidden-xs-down">
     <li class="nav-item">
        <a class="nav-link navbar-toggler sidebartoggler  waves-effect waves-dark float-right" href="javascript:void(0)"><span class="navbar-toggler-icon"></span></a></li>
    </ul>
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->


            <nav class="sidebar-nav ">
                <ul id="sidebarnav">
                    <li class="clearfix"></li>

                        <li class=""><a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="flaticon-desktop-computer-screen-with-rising-graph"></i>
                            <span class="hide-menu">Home</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/dashboard')}}" class="">Dashboard</a></li>
                                <li><a href="{{ URL('') }}" target="_blank" class="">Visit Website</a></li>
                                <li><a href="{{url('admin/favicon/edit')}}" class="">Favicon Management</a></li>
                                <li><a href="{{url('admin/logo/edit')}}" class="">Logo Management</a></li>
                                <li><a href="{{url('admin/banner')}}" class="">Banner Management</a></li>
                                <li><a href="{{url('admin/config/setting')}}" class="">Config</a></li>
                            </ul>
                        </li>
                        
                        <li><hr></li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-envelope"></i>
                            <span class="hide-menu">Inquires</span></a>
                            <ul aria-expanded="false" class="collapse">
                            <li><a href="{{url('admin/contact/inquiries')}}" class="">Contact Inquiries</a></li>
                            <li><a href="{{url('admin/newsletter/inquiries')}}" class="">Newsletter Inquiries</a></li>
                            </ul>
                        </li>

                        <li><hr></li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="{{url('dashboard')}}" aria-expanded="false"><i class="fas fa-edit"></i>
                            <span class="hide-menu">CMS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ url('admin/page') }}" class="">Pages Content</a></li>
                            </ul>
                        </li>
                    
                    <li><hr></li>

                       <!--  <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                                        class="flaticon-restaurant"></i><span class="hide-menu">Ecommerce</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/category')}}">Categories</a></li>
                                <li><a href="{{url('admin/product')}}">Products</a></li>
                                <li><a href="{{url('admin/order/list')}}">Orders</a></li> 
                            </ul>
                        </li>

                    <li><hr></li> -->

                    <li>
                        <a href="{{url('admin/blog')}}">
                            <i class="fab fa-blogger-b">
                                
                            </i><span class="hide-menu">Blog</span>
                        </a>
                    </li>

                    <li><hr></li>
<!-- 
                    <li>
                        <a href="{{url('admin/testimonial')}}">
                            <i class="fas fa-users"></i>
                            <span class="hide-menu">Testimonials</span>
                        </a>
                    </li>
                    <li><hr></li> -->

                    @foreach($laravelAdminMenus->menus as $section)
                        @if(count(collect($section->items)) > 0)
                            @foreach($section->items as $menu)
                                    <li>
                                        <a class="waves-effect" href="{{ url($menu->url) }}">
                                            <i class="{{$menu->icon}}"></i>
                                            <span class="hide-menu">  {{ $menu->title }}</span>
                                        </a>
                                    </li>
                                    <hr>
                            @endforeach
                        @endif
                    @endforeach

                    <li>
                        <a href="{{url('admin/account/settings')}}">
                            <i class="fa fa-cog"></i>
                            <span class="hide-menu">Account Settings</span>
                        </a>
                    </li>

                </ul>

            </nav>

    <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
