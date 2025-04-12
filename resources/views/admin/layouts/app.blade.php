<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>@yield('title', 'Admin | Dashboard')</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

@include('admin.layouts.inc.style')

</head>
<body class="theme-red">

<!-- Overlay For Sidebars -->
<div class="overlay"></div><!-- Search  -->
<div class="search-bar">
    <div class="search-icon"> <i class="material-icons">search</i> </div>
    <input type="text" placeholder="Explore Nexa...">
    <div class="close-search"> <i class="material-icons">close</i> </div>
</div>

@include('admin.layouts.inc.top-navbar')

<!-- Left Sidebar -->
@include('admin.layouts.inc.left-sidebar')

<!-- Right Sidebar -->
@include('admin.layouts.inc.right-sidebar')

<!-- Chat-launcher -->
@include('admin.layouts.inc.chat-launcher')

<!-- Main Content -->
<section class="content home">
    @yield('admin_content')
</section>
<!-- Jquery Core Js -->

@include('admin.layouts.inc.script')


</body>
</html>
