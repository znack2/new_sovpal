<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
	  public function forbiddenResponse()
  		{
  		    return $this->redirector->back();
  		}

    public function response(array $errors)
      {
        dump($errors);
      }

    protected function failedValidation(Validator $validator)
      {
          $this->session()->flash('validation_error', [
              'msg-type' => 'danger',
              'msg-text' => 'Please complete the form.',
          ]);

          return parent::failedValidation($validator);
      }
}


//     protected function getValidatorInstance(){
//         $v = parent::getValidatorInstance();
//         $input = $this->all();
//         $v->sometimes(['street', 'house','first_name','last_name'], 'required', function($input)
//             {
//                 return $input['type'] == 'owner';
//             });                
//         return $v;
//     }
