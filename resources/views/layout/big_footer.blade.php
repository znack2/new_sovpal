<footer class="content">
    <div class="col-md-12 big_footer text-center">
        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.AboutService')}}</h5>
            <ul>
                <li class="size12 upper">{{ link(route('pages',['page'=>'about']),null,'pageabout') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'job']),null,'pagejob') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'press']),null,'pagepress') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'blog']),null,'pageblog') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'how']),null,'Login') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'faq']),null,'pagefaq') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'contacts']),null,'pagecontacts') }}</li>
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.UseSovpal')}}</h5>
            <ul>
                <li class="size12 upper">{{ link(route('auth.login'),null,'Login') }}</li>
                <li class="size12 upper">{{ link(route('auth.register'),null,'SignUp') }}</li>
                <li class="size12 upper">{{ link(route('auth.premium'),null,'pagepremium') }}</li>
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.Extras')}}</h5>
            <ul>
                <li class="size12 upper">{{ link(route('pages',['page'=>'security']),null,'pageprivacy') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'terms']),null,'pageterms') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'support']),null,'pagesupport') }}</li>
            </ul>
        </div>

        <div class="col-md-3">
            <h5 class="size16 bold upper">{{trans('sovpal.MoreResources')}}</h5>
            <ul>
                <li class="size12 upper">{{ link(route('pages',['page'=>'owners']),null,'pageowners') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'designers']),null,'pagedesigners') }}</li>
                <li class="size12 upper">{{ link(route('pages',['page'=>'shops']),null,'pageshops') }}</li>
            </ul>
        </div>
    </div>
    @include('pages.footer')
</footer>
