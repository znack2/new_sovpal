<?php namespace App\Helpers;


link(Request::route()->getName(), $category )
link(Request::route()->getName(), $skill )


if ( ! function_exists('link')) {
    function link($route, $segment, $title, $icon = null)
    {

        title = menu_back
        class = visible-xs grey_c bold
        title class = hidden-xs/bold sidebar_text
        title = trans('sovpal.forms.'.$title)


        $url = route($route, $segment);
        $icon = isset($icon) ? '<i class="fa fa-'.$icon.'">' : null;
                $this->image($item,'image-one-item','alt');
        $class = isset($title) ? 'link btn btn-blog' : 'green_c bold size18';
        $title_result = isset($title) ? $title.trans('sovpal.$') : trans('sovpal.Free');
        // $extradiv = <div class="pull-right">
        return '<a href="'.$url.'" class="'.$class.'">'.$icon.$title_result.'</i></a>';
    }
}

button($toggle){
    return type="button" data-toggle="'.$toggle'" data-target="'.$toggle."
}


if ( ! function_exists('image')) {
    function image($item, $alt = 'icon', $class = 'image-responsive')
    {
         $image = string($image) ? $image : $this->image($image);
        //set tags/skill into $image path when image store;
        //set users/ into $image path store $data->getImage('avatar') 
        //tags/category/'.$category->images->first()->url.'.'.$category->images->first()->file
        //tags/skill/'.$skill->images->first()->url.'.'.$skill->images->first()->file
        //elements/'.$tag->images->first()->url.'.'.$tag->images->first()->file
        //icons/help/
         //assets/images/tags/room/

        icon
        $item->free
        $item->condition
        $skill->name

        $class = based on alt inline/avatar img-circle/round_icon/image-one-item/button_image;
        $alt = {{ $data->getImage('avatar',true) }} / avatar_{{ $data->user->first_name }}
        $width = based on alt 100/20/200/15/25/35/46;

        return '<img src="'.asset('assets/images/'.$item->images->get(['url']).'.'.$item->images->get(['file'])).'class="'.$class.'" alt="'.$alt.'" width="'.$width.'">';
    }
}

if ( ! function_exists('functionExtra')) {
    function functionExtra($url,$type)
    {
        if($url == route('items')) 
             return 'default_price';
         elseif($url  == route('users') && $type == 'profis')
             return 'hour_cost';
         elseif($url  == route('groups'))
             return 'price';
         else
             return 'first_name';
    }
}

if ( ! function_exists('meta')) {
    function meta($type,$data)
    {
        $data->getMeta($type, Request::route()->getName());
    }
}

if ( ! function_exists('flash')) {
    function flash($message,$style = 'info')
    {
        session()->flash('flash_message',[
                'message' => trans('sovpal.flash'.$message),
                'style'   => $style,
            ]);
        // if ( ! is_null($message)) {
        //     return app('flash')->info($message);
        // }
        // return app('flash');
    }
}

if (!function_exists('active')) {
    function active($url, $segment)
    {
        // Request::input('type/sortBy/page') == '$segment'
        //
        // Request::path() == $url 
        //
        // Request::route()->getName() == $url

        // Request::is($url) 

        // Request::url() == $url

        if(!is_array($segment)) {
            return Request::segment($segment) == $segment ? 'active' : '';
        }
        foreach ($segment as $v) {
            if(Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}

if ( ! function_exists('checkCurrentUser')) {
    function checkCurrentUser($data, $first, $second = null)
    {
        //use policy
        return $data != $currentUser->id ? $first : $second;
    }
}

if ( ! function_exists('dropdown')) {
    function dropdown($title)
    {
        return '<div class="dropdown">
            <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-question-circle"></i></a>
            <ul class="tooltip-dropdown dropdown-menu" role="menu">
                <li class="size10 blue_c text-center">'
                    .$title.
                '</li>
            </ul>
        </div>';
    }
}

if ( ! function_exists('filter')) {
    function filter()
    {
        $active = Request::input('sortBy') == in_array('default_price','hour_cost','first_name','level','created_at' ? 'active': '';
        $class = '"filter_item pull-right"';

        $route = route(Request::route()->getName(),
              ['type'       => Request::input('type'),
               'tag'        => Request::input('tag'),
               'element'    => Request::input('element') : $tag->name,
               'skill'      => Request::input('skill') : $skill->name,
               'category'   => Request::input('category') : $category->name,
               'search'     => Request::input('search'),
               'sortBy'     => Request::input('sortBy') : Request::url() == route('users') ? 'level' : 'created_at',
               'direction'  => (Request::input('direction') == 'desc') ? 'asc' : 'desc' ]

        $badge = <span class="pull-right badge">{{ $category->item_count : $skill->profi_count : $tag->item_count}}</span>

       //remove from image Request::input('sortBy') == in_array('default_price','price','hour_cost','created_at') 
        $image =  <i class="fa fa-arrow-{{ Request::input('direction') == 'desc'? 'down': 'up' }}"></i> 
        $title = trans('sovpal.price/cost/name');
               = trans('sovpal.'.Request::url() == route('users') ? 'level' : 'date')
               = trans('tags.'.$category->name) 
               = trans('tags.'.$skill->name)
               = trans('tags.'.$tag->name)
        return '<div class='.$class.$active.'>'.$this->link(,).'</div>' ;
    }
}

if ( ! function_exists('checkbox')) {    
    function checkbox()
    {
        checked = (Request::input('limitBy') == 'close/premium/$expire_selection/$selection') ? 'checked' : '' ;
        <input class="css-checkbox"'. $checked .' id="" type="checkbox" 
        onchange="window.location.href='{{ route(Request::route()->getName(), 
        ['type'=>Request::input('type'),
        'tag'=>Request::input('tag'),
        'element'=>Request::input('element'),
        'search'=>Request::input('search'),
        'sortBy'=>Request::input('sortBy'),
        'direction'=>Request::input('direction'),
        'limitBy'=>(Request::input('limitBy') != 'close/premium/$expire_selection/$selection') ? close/premium/$expire_selection/$selection : '']) }}'">
        <label class="css-label dark-plus-cyan" for="">{{ trans('sovpal.close/premium/$expire_selection/$selection') }}</label>
    }
}



// input('input','first_name',$item,$errors,'col-sm-12','col-sm-12')

// function input($type,$label,$item,$errors,$col_label = 'col-md-4',$col_input='col-md-8')
// {
//  if($type == 'textarea')
//      {
//          $input_type = '<textarea type="text" class="form-control" id="'.$label(isset($item) ? $item->id : '')'" name="'
//          .$label(isset($item) ? $item->id : '')'" placeholder="'.old( $label(isset($item) ? $item->id : ''), 
//          (isset($item)) ? $item->$label : trans('sovpal.forms.'.$label.'_example')  ).'" rows="5"></textarea>';
//      }
//  else
//      {
//          $input_type = '<input type="text" class="form-control" id="'.$label(isset($item) ? $item->id : '')'" name="'
//          .$label(isset($item) ? $item->id : '')'" placeholder="'.old( $label(isset($item) ? $item->id : ''), 
//          (isset($item)) ? $item->$label : trans('sovpal.forms.'.$label.'_example')  ).'">';
//      }

//  return '<div class="form-group">
//          <label for="'.$label(isset($item) ? $item->id : '').'" class="'.$col_label.' control-label">' . trans('sovpal.forms.'.$label) . '</label>
//          <div class="'.$col_input.'">' . $input_type . $errors->first($label(isset($item) ? $item->id : '') ,'<li class="error">:message</li>') . '</div></div>';
// }


// function redirectBack()
//     {
//         \Redirect::back();
//     }

// function liked($item_id)
// {
//     // return $item_id == $item_id ? 'liked' : '';
//     return true;
// }

// function set_check($true){
//     return $true ? 'check txt-green' : 'remove txt-red';
// }

// function sort_by($path,$column,$table){
//     $direction = (Request::get('direction') == 'asc') ? 'desc' : 'asc';
//     return route($path,['sortBy'=>$column,'direction'=>$direction,'table'=>$table]);
// }

// {{ form($errors,'Name',$input,$placeholder = 'Name :'); }}

// function form($label, $type, $data=null)//$value if select // $errors,$label,$input,$placeholder = null,$class='form-control'
// {

//     $result = '<div class="form-group">'
//     $result .= '<label for="'.$input.'" class="col-sm-3 control-label">'.$input.'</label>'
//     $result .= '<input type="text" name="'.$input.'" class="'.$class.'" placeholder="'.$placeholder.'" value="'.{{ old($input) }}.'"/>'
//     return $result .= $errors->first($input, 
//         '<div id="error" class="alert alert-danger alert-dismissable">
//          <i class="fa fa-alarm"></i>This is an <strong>.alert</strong>:message</div>');


//     // $tags[$type]
//     // $tool_tags
//     // $rooms
//     // $item_elements as $element_id => $element_name
//     // $data->items()->get()
//     // $myRooms
//     // $rooms
//     //password/date/text/email/file/number
//     // sr-only col-sm-4 control-label
//     // $input = '<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>';

//   // @if(Request::input('type') == 'items')
//   //     @foreach($item_elements as $element_id => $element_name)
//   //       <option value="{{$element_id}}">{{$element_name}}</option>
//   //     @endforeach
//   // @elseif(Request::input('type') == 'materials')
//   //     @foreach($mat_elements as $element_id => $element_name)
//   //       <option value="{{$element_id}}">{{$element_name}}</option>
//   //     @endforeach
//   // @endif  

//     $data = isset($data) ? $data->$type : trans('sovpal.forms.'.$type);
//     $old = (old($type)) ? old($type) : '';
//     $help = '<p class="help-block">'.trans('sovpal.forms.NotImportant').'</p>';
//     $label = '<label for=".$type." >'.trans('sovpal.'.$type).':</label>';
//     $error = $errors->first($type ,'<li class="error">:message</li>');

//     if($field == 'textarea'){
//         $field = '<div class="col-sm-8"><textarea class="form-control" id="'.$type.'" name="'.$type.'" cols="30" rows="9/5" 
//             value="'.$old.'"  placeholder="'.$data.'"/></textarea></div>';
//     } elseif( SELECT ){
//         $old = (old($type) == $selecter->name) ? 'selected' : '';
//         $label = '<label class="col-sm-4 control-label" for=".$type.">'.trans('sovpal.forms.Choose'.$type) .'</label>';
//         $default = '<option value="0"> '.trans('sovpal.forms.Select'.$type) .'</option>';

//         $default  = '<option value="'.$selecter->id.'"'.$old.'>'.trans('tags.'.$type.'.'.$selecter->name/title/$room->getTag()).'</option>';

//         $field = '<select class="form-control" name="'.$type.'">'.$default.
//             foreach($data as $selecter)
//                 {
//                     $this->GetOption($selecter,$type);
//                 }
//             .'</select>';
//     } elseif( radio ){
//         //radio-inline/col-sm-4 control-label
//         $image = '<div id='.$value.' class="'.$value.' img-circle img-thumbnail '.$type.'-check"></div>'
//         $field = '<label for='.$type.'class="">'.$image.'
//               <input name="'.$type.'" class="hidden" type="radio" id="'.$value.'" '.$data->$type == '0' ? 
//               'checked' : 'name="'.$type.'" value="'.$value.'" autocomplete="off"/>"'.trans('sovpal.forms.'.$value).'</label>'.$error
//     }
//      else {
//          $field = '<div class="col-sm-8">
//              <input type="" class="form-control" name="'.$type.'" id="'.$type.'"
//              required value="'.$old.'" placeholder="'.$data.'"></div>';
//     }
//     return $label.$field.$error;
// }