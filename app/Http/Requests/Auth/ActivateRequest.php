<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ActivateRequest extends Request
{
	public function authorize()
		{
		    return true;
		}

	public function rules()
	{
	    return [
	    	'activation_code' => 'required|alpha_num|min:5'
    	];
	}
}
