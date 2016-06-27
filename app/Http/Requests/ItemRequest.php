<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request
{
    public function authorize()
        {
            // switch ($this->method()) {
            //     case 'PATCH' || 'PUT': 
            //         \Auth::check() && 
            //         $this->request->route('user')->type == 'owner' || 
            //         $this->request->route('user')->type == 'shop';
            //         return false;
            //       break;
            //     case 'POST': \Auth::check() &&
            //         $this->request->route('user')->id == $this->request->
            //         //check if group->user_id == currentuser->id
            //         return false;
            //     break;
            //         default:
            //         return true;
            //     break;
            // }
            return true;
        }
    
    public function rules()
        {
          $rules = [];

            switch ($this->method()) {
                case 'PUT':
                    foreach($this->request->all() as $key => $val)
                    {        
                        $rules['type.'.$key]                 = 'in:item,tool,material';
                        $rules['title.'.$key]                = 'min:4|alpha_dash';
                        $rules['image.'.$key]                = 'image|mimes:png,jpg,jpeg|max:500'; 
                        //'dimension_min:128,128|regex:/\/images\/\d{4}\/\d{2}\/\d{2}\/([A-z0-9]){30}\.jpg/'
                        $rules['order_condition.'.$key]      = 'required|min:4|alpha_dash';
                        //conditional
                        $rules['premium.'.$key]              = '';
                        // 'element'            => '',
                        // 'products.1.product_id' => 'required|exists:products,id',
                        $rules['condition.'.$key]            = 'min:4|alpha_dash';
                        $rules['qty.'.$key]                  = 'min:4|alpha_dash';
                        $rules['description.'.$key]          = 'min:10|alpha_dash';
                        $rules['default_price.'.$key]        = 'numeric|min:1';
                    }
                  return $rules;
                  break;
                case 'POST':

                    $rules['type']                 = 'in:item,tool,material';
                    $rules['title']                = 'required|min:4|alpha_dash';
                    $rules['image']                = 'required|image|mimes:png,jpg,jpeg|max:500'; 
                    $rules['order_condition']      = 'required|min:4|alpha_dash';
                    // $rules['premium']              = '';

                    if ($this->request->get('type') == 'item') {
                         $rules['description']   = 'required|min:10|alpha_dash';
                         $rules['default_price'] = 'required|numeric|min:1';
                     }
                    else{
                        $rules['description']          = 'min:10|alpha_dash';
                        $rules['default_price']        = 'numeric|min:1';
                     } 

                    if ($this->request->get('type') == 'tool') {
                         $rules['condition'] = 'required|min:1|numeric';
                     }
                    else{
                        $rules['condition']  = 'min:1|numeric';
                    } 

                    if ($this->request->get('type') == 'material') {
                        $rules['qty'] = 'required|min:1|numeric';
                     } 
                    else{
                        $rules['qty'] = 'min:1|numeric';
                     } 
                return $rules;
                break;
            }
            // if(! is_null(Request::get('qty')))
            //      {
            //          $value = $this->checkField(Request::get('qty'));
            //      }
            // if($this->has('recurring'))
            //     {
            //         $rules['recurrence'] = $rules['recurrence'] + ['integer', 'min:1'];
            //     }
        }

    // protected function getValidatorInstance(){

    //     $v = parent::getValidatorInstance();
    //     //item
    //     $v->sometimes(['description', 'default_price'], 'required', function($input)
    //         {
    //             return $input->type == 'item';
    //         });                
    //     //tool
    //     $v->sometimes(['condition'], 'required', function($input)
    //         {
    //             return $input->type == 'tool';
    //         });
    //     //material
    //     $v->sometimes(['qty'], 'required', function($input)
    //         {
    //             return $input->type == 'material';
    //         });   
    //     return $v;
    // }


    public function messages()
    {
      $messages = [];

      foreach($this->request->all() as $key => $val)
      {
        $messages['title.'.$key.'.required']     = 'The field labeled "Title" required.';
        $messages['title.'.$key.'.min']          = 'The field labeled "Title" must be at least :min.';
        $messages['title.'.$key.'.alpha_dash']   = 'The field labeled "Title" may only contain letters, numbers, and dashes';

        $messages['image.'.$key.'.required']                = 'The field labeled "Image" required.';
        $messages['image.'.$key.'.image']                   = 'The field labeled "Image" required.';
        $messages['image.'.$key.'.mimes:png,jpg,jpeg']      = 'The field labeled "Image" required.';
        $messages['image.'.$key.'.max']                     = 'The field labeled "Image" must be less than :max characters.';

        $messages['order_condition.'.$key.'.required']      = 'The field labeled "Order Condition" required.';
        $messages['order_condition.'.$key.'.min']           = 'The field labeled "Order Condition" must be at least :min.';
        $messages['order_condition.'.$key.'.alpha_dash']    = 'The field labeled "Order Condition" may only contain letters, numbers, and dashes';

        // $messages['premium.'.$key]                  = 'The field labeled "Premium" must be.';

        $messages['condition.'.$key.'.min']            = 'The field labeled "Condition" must be at least :min.';
        $messages['condition.'.$key.'.alpha_dash']     = 'The field labeled "Condition" may only contain letters, numbers, and dashes';

        $messages['qty.'.$key.'.min']                  = 'The field labeled "Qty" must be at least :min.';
        $messages['qty.'.$key.'.alpha_dash']           = 'The field labeled "Qty" may only contain letters, numbers, and dashes';

        $messages['description.'.$key.'.min']          = 'The field labeled "Description" must be at least :min.';
        $messages['description.'.$key.'.alpha_dash']   = 'The field labeled "Description" may only contain letters, numbers, and dashes';

        $messages['default_price.'.$key.'.min']        = 'The field labeled "Default Price" must be at least :min.';
        $messages['default_price.'.$key.'.numeric']    = 'The field labeled "Default Price" must be a number';
      }
      return $messages;
    }
}
