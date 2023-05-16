<!-- Title -->
<title>{{__('dashboard.dashboard')}}</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
@yield('css')
    @if(LaravelLocalization::getCurrentLocale()=='ar')
        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
        {{-- //  Style css  --}}
        <link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
        {{-- //  Dark-mode css  --}}
        <link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
        {{-- // Skinmodes css --}}
        <link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
    @else
        <!-- Sidemenu css -->
        <link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">
        {{-- //  Style css  --}}
        <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
        {{-- //  Dark-mode css  --}}
        <link href="{{URL::asset('assets/css/style-dark.css')}}" rel="stylesheet">
        {{-- // Skinmodes css --}}
        <link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet">
    @endif
