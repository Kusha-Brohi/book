<?php $segment = Request::segments();

?>

<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
         @if(isset($segment) && $segment == null)
         <meta name="description" content="Official page of Brian D. Ratty, award winning author and storyteller, bring history alive. Historical and nonfiction books about the Pacific north coast wildness and those who came before us. These are powerful stories of our past that gave birth to our future.">
        <meta name="keywords" content="Brian D. Ratty, Dutch Clarke, The Early Years, The War Years, Voyage of
         Atonement, Destination Astoria, Tillamook Passage, Tillamook Rock Lighthouse, Broken
        Arrow, action, adventure, bring history alive">
        <title>Brian Book | Home</title>
        @elseif(isset($segment[0]) && $segment[0] == 'home')
         <meta name="description" content="Official page of Brian D. Ratty, award winning author and storyteller, bring history alive. Historical and nonfiction books about the Pacific north coast wildness and those who came before us. These are powerful stories of our past that gave birth to our future.">
        <meta name="keywords" content="Brian D. Ratty, Dutch Clarke, The Early Years, The War Years, Voyage of
         Atonement, Destination Astoria, Tillamook Passage, Tillamook Rock Lighthouse, Broken
        Arrow, action, adventure, bring history alive">
        <title>Brian Book | Home</title>
        @elseif(isset($segment[0]) && $segment[0] == 'video')
        <meta name="description" content="The goal of these videos is to whisk the reader away to another frame of mind… the results being a suspenseful and brisk read. Readers Wanted!">
        <meta name="keywords" content="Call of the Columbia , Tillamook Rock Lighthouse, Pathfinders Trilogy, Tillamook
         Passage, Tilly Today, Fortress Astoria video,">
        @elseif(isset($segment[0]) && $segment[0] == 'blog')
         <title>Brian Book | Blogs</title>    

        @elseif(isset($segment[0]) && $segment[0] == 'about')
        <title>Brian Book | About</title>
        <meta name="description" content="Brian D. Ratty, is a retired media executive and graduate of Brooks Institute of
         Photography, he also holds an honorary Master of Science degree. Brian is an award-winning
         historical fiction novelist, and has written numerous books and articles about the Pacific Northwest. ">

        <meta name="keywords" content="Brian D. Ratty, Brian Ratty, Dutch Clarke, Brooks Institute of Photography">



        @endif
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset(!empty($favicon->img_path)?$favicon->img_path:'')}}">
        <title>{{ config('app.name') }}</title>
        <!-- ============================================================== -->
        <!-- All CSS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
        @include('layouts.front.css')
        @yield('css')

    </head>
    <body class="responsive">
      

        @include('layouts/front.header')
		
		
		 
	

		
        @yield('content')
        @include('layouts/front.footer')
        <!-- ============================================================== -->
        <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->
        <!-- ============================================================== -->
        @include('layouts/front.scripts')
        @yield('js')

    </body>
</html>