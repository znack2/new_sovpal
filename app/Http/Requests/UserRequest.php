<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    public function authorize()
        {
            // switch ($this->method()) {
            //     case 'PATCH' || 'PUT': 
            //         \Auth::check() && 
            //         return false;
            //       break;
            //     case 'POST': \Auth::check() &&
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
          //      $this->sanitize();
          //      $user = User::find($this->users);
            $rules = [
                //update address?
                //update role?
                'first_name'       => 'min:4|max:23|alpha_dash',
                'last_name'        => 'min:4|max:23',
                'gender'           => 'boolean',
                'birthday'         => 'date|date_format:Y-m-d',
                // owner
                'own_remont'       => 'boolean', 
                'with_designer'    => 'boolean', 
                // profi
                'hour_cost'        => 'numeric|min:1',       
                'education'        => 'alpha_dash',
                // shop
                'refund_policy'    => 'alpha_dash',
                'delivery_policy'  => 'alpha_dash',
                //contact
                'phone'            => 'max:10|min:9|numeric|',//unique:users,phone|globally_unique_number|valid_phone
            ];

            if($this->request->has('skills'))
            {
                foreach($this->request->get('skills') as $key => $val)
                  {        
                    //required at least 1 skill !!! 
                      $rules['skills.'.$key] = 'required';//|in:item,tool,material
                  }
            }
            return $rules;
        }

        public function messages()
        {
          $messages = [];

              if($this->request->has('skills'))
              {
                   foreach($this->request->get('skills') as $key => $val)
                   {
                      $messages['skills.'.$key.'.required']     = 'The field labeled "Skill" required.';
                   }
              }

            $messages['first_name.max']            = 'The field labeled "Title" required.';
            $messages['first_name.min']            = 'The field labeled "Title" must be at least :min.';
            $messages['first_name.alpha_dash']     = 'The field labeled "Title" may only contain letters, numbers, and dashes';

            $messages['last_name.min']             = 'The field labeled "Image" required.';
            $messages['last_name.max']             = 'The field labeled "Image" required.';
            $messages['last_name.alpha_dash']      = 'The field labeled "Image" required.';

            $messages['gender.boolean']            = 'The field labeled "Order Condition" required.';
            $messages['birthday.date']             = 'The field labeled "Order Condition" must be at least :min.';
            $messages['own_remont.boolean']        = 'The field labeled "Order Condition" may only contain letters, numbers, and dashes';
            $messages['with_designer.boolean']     = 'The field labeled "Order Condition" may only contain letters, numbers, and dashes';

            $messages['hour_cost.numeric']         = 'The field labeled "Hour_cost" must be a number';
            $messages['hour_cost.min']             = 'The field labeled "Hour_cost" must be at least :min.';
            $messages['education.alpha_dash']      = 'The field labeled "Condition" may only contain letters, numbers, and dashes';

            $messages['refund_policy.alpha_dash']  = 'The field labeled "Qty" must be at least :min.';
            $messages['delivery_policy.alpha_dash']= 'The field labeled "Qty" may only contain letters, numbers, and dashes';

            $messages['phone.numeric']             = 'The field labeled "Description" must be a number';
            $messages['phone.max']                 = 'The field labeled "Description" must be less than :max characters.';
            $messages['phone.min']                 = 'The field labeled "Description" must be at least :min.';

          return $messages;
        }
}
