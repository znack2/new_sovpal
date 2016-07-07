<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MailRequest extends Request
{
    public function authorize()
        {
            return true;
        }

    public function rules()
        {
          return $rules = [
               'name'       => 'required|min:3',
               'email'      => 'required|email|max:255',
               'message'    => 'required'
                '_token' => 'required',
                'email' => 'required|email',
                'io' => 'required|min:5|max:100',
                'body' => 'required|min:5|max:1000'
            ];
        }
}
