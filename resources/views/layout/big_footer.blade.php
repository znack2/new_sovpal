<footer class="content">
    <div class="col-md-12 big_footer text-center">
        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.AboutService')}}</h5>
            <ul>
                {{--<li><a class="size12 upper" href="{{ route('pages',['page'=>'about']) }}">{{trans('sovpal.pageabout')}}</a></li>--}}
                {{--<li><a class="size12 upper" href="#">{{trans('sovpal.pagejob')}}</a></li>--}}
                {{--<li><a class="size12 upper" href="#">{{trans('sovpal.pagepress')}}</a></li>--}}
                {{--<li><a class="size12 upper" href="#">{{trans('sovpal.pageblog')}}</a></li>--}}
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'how']) }}">{{trans('sovpal.pagehow')}}</a></li>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'faq']) }}">{{trans('sovpal.pagefaq')}}</a></li>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'contacts']) }}">{{trans('sovpal.pagecontacts')}}</a></li>
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.UseSovpal')}}</h5>
            <ul>
                <li><a class="size12 upper" href="{{ route('auth.login') }}"> {{trans('sovpal.Login')}}</a></li>
                <li><a class="size12 upper" href="{{ route('auth.register') }}"> {{trans('sovpal.SignUp')}}</a></li>
                {{--<li><a class="size12 upper" href="#">{{trans('sovpal.pagepremium')}}</a></li>--}}
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.Extras')}}</h5>
            <ul>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'security']) }}">{{trans('sovpal.pageprivacy')}}</a></li>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'terms']) }}">{{trans('sovpal.pageterms')}}</a></li>
                {{--<li><a class="size12 upper" href="{{ route('pages',['page'=>'support']) }}">{{trans('sovpal.pagesupport')}}</a></li>--}}
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.MoreResources')}}</h5>
            <ul>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'owners']) }}">{{trans('sovpal.pageowners')}}</a></li>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'designers']) }}"> {{trans('sovpal.pagedesigners')}}</a></li>
                <li><a class="size12 upper" href="{{ route('pages',['page'=>'shops']) }}">{{trans('sovpal.pageshops')}}</a></li>
                {{--<li><a class="size12 upper" href="#">{{trans('sovpal.pagebuilders')}}</a></li>--}}
            </ul>
        </div>
    </div>
    @include('pages.footer')
</footer>
