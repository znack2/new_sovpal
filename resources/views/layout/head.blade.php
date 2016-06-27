<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="author" content="{{ trans('sovpal.meta_author') }}">
<meta name="env" content="{{ App::environment() }}">
<meta name="token" content="{{ Session::token() }}">
<meta name="google-site-verification" content="-XzMWTv_fEHVI0CyT7zyFRgInFeUkvBmk-4z6IvvPFc" />


{{--<link rel="shortcut icon" type="image/png" href="favicon32.png" sizes="32x32" />--}}
{{--<link rel="shortcut icon" type="image/png" href="favicon16.png" sizes="16x16" />--}}

<meta property="og:type" content="website" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />
<meta property="og:site_name" content="{{ trans('title') }}" />
<meta property="og:title" content="{{meta('title', $data)}}&nbsp;|&nbsp;{{ trans('title') }}" />
<meta property="og:description" content="{{meta('description', $data)}}" />

<title>{{ meta('title', $data) }}&nbsp;|&nbsp;{{ trans('title') }}</title>
<meta name="description" content="{{meta('description', $data)}}">
<meta name="keywords" content="{{meta('keywords', $data)}}">

<!-- Font Awesome -->
{{--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>--}}
{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
{{-- <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
{{-- etline-font ??? --}}
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}" >
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href="{{asset('assets/css/color.css')}}" >
<link rel="stylesheet" href="{{asset('assets/css/text.css')}}" >
@if(isset($page) && $page == 'landing')
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/freeze.css')}}">
    <script type="text/javascript" src="{{asset('assets/js/modernizr.custom.32033.js')}}"></script>
    <div class="pre-loader">
        <div class="load-con">
            <img src="{{ asset('assets/images/freeze/logo.png') }}" class="animated fadeInDown" alt="">
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
        </div>
    </div>
@endif
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->