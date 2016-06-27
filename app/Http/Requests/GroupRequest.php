<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class GroupRequest extends Request
{
    public function authorize()
        {
//            section in route
//            $group_id = $this->route('group_id');
//            return Group::where('id', $group_id)->where('user_id', Auth::id())->exists();





          // switch ($this->method()) {
          //     case 'PATCH' || 'PUT': 
          //         \Auth::check() && 
          //         $this->request->route('user')->type == 'shop';
          //user_id == request->item_id
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
          //      // $this->sanitize();
          //      $user = User::find($this->users);

            // 'expires'   => 'required|after:tomorrow|before:date("Y-m-d", strtotime("today +3 days"))',
            // 'expires'   => 'required|after:' . date("Y-m-d", strtotime("+1 day")) . '|before:' . date("Y-m-d", strtotime("+3 month")).'',//tomorrow - 3 months

            $rules = [];

            switch ($this->method()) {
                case 'PUT':
                    foreach($this->request->all() as $key => $val)
                    {        
                        //item ??? 
                        $rules['price.'.$key]       = 'numeric';
                        $rules['expires.'.$key]     = 'in:1,2,4,8,24';
                        $rules['user_need.'.$key]  = 'in:5,10,20,50,100'; 
                    }
                  return $rules;
                  break;
                case 'POST':
                    foreach($this->request->all() as $key => $val)
                    {        
                        //item ??? 
                        $rules['price.'.$key] = 'required|numeric';
                        $rules['expires.'.$key] = 'required|in:1,2,4,8,24';
                        $rules['user_need.'.$key] = 'required|in:5,10,20,50,100'; 
                    }
                return $rules;
                break;
            }
        }

        public function messages()
        {
          $messages = [];

            foreach($this->request->all() as $key => $val)
            {
               $messages['price.'.$key]       = 'The field labeled "Price" required.';
               $messages['price.'.$key]       = 'The field labeled "Price"';
               $messages['expires.'.$key]     = 'The field labeled "Expires" required.';
               $messages['expires.'.$key]     = 'The field labeled "Expires"';
               $messages['user_need.'.$key]   = 'The field labeled "User Count" required.'; 
               $messages['user_need.'.$key]   = 'The field labeled "User Count"'; 
            }

          return $messages;
        }
}


