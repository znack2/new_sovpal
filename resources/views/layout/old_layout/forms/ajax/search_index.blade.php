<form class="text-center" action="{{ route(Request::route()->getName(),['type'=>Request::input('type')]) }}" method="GET" accept-charset="UTF-8">
  {!! csrf_field() !!}
        <input id="searchIndex" name="date" type="text" class="form-control" placeholder="{{ trans('sovpal.forms.Search') }}"
        value="{{ $search or ''}}" onchange="this.form.submit()">

        <input id="field" name="field" type="hidden" value="{{ Request::input('type') == 'owner' || Request::input('type') == 'profi' ? trans('sovpal.forms.first_name')  : trans('sovpal.forms.title')}}">
</form>

{{-- <p>{{ trans('sovpal.forms.byClickSearch') }}</p> --}}