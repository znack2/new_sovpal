<?php

// if ( ! function_exists('flash')) {
//     function flash($message = null)
//     {
//         $notifier = app('flash');
//         if ( ! is_null($message)) {
//             return $notifier->info($message);
//         }
//         return $notifier;
//     }
// }

function flash($title,$message,$style = 'info')
{
	session()->flash('flash_message',[
            'message' => $message,
            'title'   => $title,
            'style'   => $style,
        ]);
}

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

function meta($type,$data)
{
    $data->getMeta($type, Request::route()->getName());
}

// if (!function_exists('setActive')) {
//     function setActive($path,$segment, $value)
//     {
//         //1
//         Request::url() == route('groups')
//         //2
//         Request::input('type') == '' ? 'active' : ''
//         Request::input('sortBy') == 'level' 
//         // || 
//         Request::input('sortBy') == 'created_at'



//         return Request::is($path) ? 'active' : '';

//         if(!is_array($value)) {
//             return Request::segment($segment) == $value ? 'active' : '';
//         }
//         foreach ($value as $v) {
//             if(Request::segment($segment) == $v) return 'active';
//         }
//         return '';
//     }
// }








// input('input','first_name',$item,$errors,'col-sm-12','col-sm-12')

// function input($type,$label,$item,$errors,$col_label = 'col-md-4',$col_input='col-md-8')
// {
// 	if($type == 'textarea')
// 		{
// 			$input_type = '<textarea type="text" class="form-control" id="'.$label(isset($item) ? $item->id : '')'" name="'
// 			.$label(isset($item) ? $item->id : '')'" placeholder="'.old( $label(isset($item) ? $item->id : ''), 
// 			(isset($item)) ? $item->$label : trans('sovpal.forms.'.$label.'_example')  ).'" rows="5"></textarea>';
// 		}
// 	else
// 		{
// 			$input_type = '<input type="text" class="form-control" id="'.$label(isset($item) ? $item->id : '')'" name="'
// 			.$label(isset($item) ? $item->id : '')'" placeholder="'.old( $label(isset($item) ? $item->id : ''), 
// 			(isset($item)) ? $item->$label : trans('sovpal.forms.'.$label.'_example')  ).'">';
// 		}

// 	return '<div class="form-group">
// 	 		<label for="'.$label(isset($item) ? $item->id : '').'" class="'.$col_label.' control-label">' . trans('sovpal.forms.'.$label) . '</label>
// 	 		<div class="'.$col_input.'">' . $input_type . $errors->first($label(isset($item) ? $item->id : '') ,'<li class="error">:message</li>') . '</div></div>';
// }



    
        
       
