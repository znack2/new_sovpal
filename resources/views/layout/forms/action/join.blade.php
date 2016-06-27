@if(!isset($remove)) 
		<h4 class="form-heading text-center"> {{ trans('sovpal.forms.JoinGroup') }} </h4> 
		<p class="minitext text-center"> {!! trans('sovpal.forms.JoinGroup_message') !!} </p> 
@else
		<h4 class="form-heading text-center"> {{ trans('sovpal.forms.WithdrowGroup') }} </h4> 
		<p class="minitext text-center"> {!! trans('sovpal.forms.WithdrowGroup_message') !!} </p> 
@endif


{{--  checkbox with delivery (save more money)--}}
{{--- select delivery date(show ho much can be safe)--}}
{{--- or create new date(how much can be lost)--}}




