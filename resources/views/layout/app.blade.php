<!DOCTYPE html>
<!--[if lt IE 7]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
    @include('layout.head')
</head>
<body>
{{--<div class="loader"></div>--}}

    <header>
        <nav class="navbar navbar-default navbar-fixed-top" id="header" role="navigation">

             <div id="flash_message" style="display: none;z-index: 9999;background-color:#ED742A;color:#fff;width:100%;margin:0;" class="text-center bold alert alert-{{ Session::get('flash.style') }}" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ trans('Beta version!') }}</strong>
            </div>

            <div class="container">
                <div class="visible-xs navbar-header">
                    @include('layout.mobile_header')
                </div>
                @include('layout.header')
            </div>
        </nav>
        @if(isset($page) && $page == 'landing')
            @include('pages.intro')
        @endif
    </header>


<!-- Errors/Message -->

//session('flash_message.style')

@if (session()->has('flash_message'))
    @foreach (session('flash_message') as $message)
        <div class="text-center alert alert-{{ $message->style }}" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                  <strong>{{ $message->title }}</strong>

                    @if (count($errors) > 1)
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}.</li><br><br>
                       @endforeach
                    @else
                        {{ $message->message }}.
                    @endif
            </div>
    @endforeach
@endif


    <!-- Main Content -->

    <main class="main_wrap {{ Auth::check() ? 'padding5' : ''}}">
        @include('layout.mobile_profile')
    	@yield('content')
    </main>

    <div class="scroll-top-wrapper hidden-xs">
      <span class="scroll-top-inner">
        <i class="fa fa-2x fa-arrow-circle-up"></i>
      </span>
    </div>

    <!-- Injected Scripts -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/loading.js')}}"></script>--}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    @yield('scripts')


<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try
{ w.yaCounter37132015 = new Ya.Metrika({ id:37132015, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, ut:"noindex" });
 } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); };
 s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]")
  { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");
  </script> <noscript><div><img src="https://mc.yandex.ru/watch/37132015?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div>
  </noscript>
  <!-- /Yandex.Metrika counter -->


<script>
  $("form").submit(function(event){
    yaCounter11111111.reachGoal('order');
  });

  $("a.call").click(function(event){
    yaCounter11111111.reachGoal('callback')
  });
</script>

</body>
</html>
