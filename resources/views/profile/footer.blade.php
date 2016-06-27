<section class="col-md-12" id="footer_down">

<div class="row">
    <div class="col-md-8 text-center">

	    	<div class="col-sm-4 col-md-4 text-center">
	    		<h4><img src="{{ asset('assets/images/icons/help/delivery.png') }}" width="25" height="25"></h4>
				<div class="dropdown">
			        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('sovpal.profile.'.$data->type.'.SettingHelp') }}
			        </a>
				</div>
	  		</div>	
	  		<div class="col-sm-4 col-md-4 text-center">
	  			<h4><img src="{{ asset('assets/images/icons/help/delivery.png') }}" width="25" height="25"></h4>
	  			<div class="dropdown">
  			        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ trans('sovpal.profile.'.$data->type.'.SettingHelp') }}
  			        </a>
	  			</div>
	  		</div>	
	  		<div class="col-sm-4 col-md-4 text-center">
	  			<h4><img src="{{ asset('assets/images/icons/help/delivery.png') }}" width="25" height="25"></h4>
	  			<div class="dropdown">
  			        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	  			        {{ trans('sovpal.profile.'.$data->type.'.SettingHelp') }}
  			        </a>
	  			</div>
	  		</div>
  	</div>
  	<div class="visible-sm hidden-md clearfix"></div>

    <div class="hidden-sm col-md-4 text-center">
        <h4 class="upper">{{ trans('Related Pages') }}</h4>
        <ul>
            <li><a href="{{ route('pages',['page'=>'premium']) }}" class="link">{{ trans('sovpal.pagepremium') }}</a></li>
            <li><a href="{{ route('pages',['page'=>'how']) }}" class="link">{{ trans('sovpal.pagepremium') }}</a></li>
            <li><a href="{{ route('pages',['page'=>'contacts']) }}" class="link">{{ trans('sovpal.pagepremium') }}</a></li>
        </ul>
    </div>
</div>
<br>
<h5 class="row text-center">
    <ul class="list-inline bold upper">
        <li><span>2016</span></li>
        <li> <a href="{{ route('pages',['page'=>'premium']) }}" class="link"><p>{{ trans('sovpal.pagepremium') }}</p></a></li>
        <li> <a href="{{ route('pages',['page'=>'about']) }}" class="link"><p>{{ trans('sovpal.pageabout') }}</p></a></li>
        <li> <a href="{{ route('pages',['page'=>'contacts']) }}" class="link"><p>{{ trans('sovpal.pagecontacts') }}</p></a></li>
    </ul
</h5>

</section>

