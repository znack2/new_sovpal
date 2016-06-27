
<form action="{{ route($route,['type'=>$type]) }} " method="GET" style="margin-bottom:0;" >
    {{ csrf_field() }}
    @include('layout.forms.search'.'.'.$type);
</form>
