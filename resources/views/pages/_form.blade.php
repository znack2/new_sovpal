@extends('layout.app')

@section('content')

<div class="row" id="slider">
	<div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
		@include('layout.forms._basic.default',[$model,$type,$method,$button,'modal_data'=>null])
	</div>
</div>  

@endsection

<style>
.panel{
	-webkit-box-shadow: 0px 6px 23px -3px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 6px 23px -3px rgba(0,0,0,0.75);
	box-shadow: 0px 6px 23px -3px rgba(0,0,0,0.75);
}
</style>
