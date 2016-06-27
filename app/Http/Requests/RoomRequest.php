<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoomRequest extends Request
{
    public function authorize()
        {
            // switch ($this->method()) {
            //     case 'PATCH' || 'PUT': 
            //         \Auth::check() && 
            //         $this->request->route('user')->type == 'owner';
            //         return false;
            //       break;
            //     case 'POST': \Auth::check() &&
            //         $this->request->route('user')->id == $this->request->
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
              //      // $this->sanitize();
              //      $user = User::find($this->users);

                switch ($this->method()) {
                    case 'PUT':
                      return $rules = [
                            'complete'      => 'boolean',
                            'start_remont'  => 'date|date_format:Y-m-d|before:end_remont',
                            'end_remont'    => 'date|date_format:Y-m-d|after:start_date',
                            'area'          => 'integer',
                        ];
                      break;
                    case 'POST': $rules['room'] = 'required|integer';
                      return $rules;
                      break;
                }
            }
}
