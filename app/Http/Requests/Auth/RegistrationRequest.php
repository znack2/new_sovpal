<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class RegistrationRequest extends Request
{
    public function authorize() {return true; }

    public function rules()
    {
        return [   
            'type'                   => 'required|in:owner,profi,shop', 
            'street'                 => 'required|alpha|min:5',//exists:addresses,street
            'house'                  => 'required|numeric|min:2',//exists:addresses,house
            'corpus'                 => 'required|alpha_num|max:4',//exists:addresses,corpus

            'first_name'             => 'required|min:4|max:23|alpha_dash',
            'last_name'              => 'required|min:4|max:23',
            'email'                  => 'required|email|min:6|unique:users,email,',
            'password'               => 'required|alpha_num|between:2,20',//regex:/^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/
            'password_confirmation'  => 'required|alpha_num|between:2,20|same:password',
            'terms'                  => 'required|accepted',

          // 'role'     => 'required|exists:roles,name',//free or pay
           // 'g-recaptcha-response' => 'required|recaptcha'

           // // if (!env('APP_DEBUG', false)) {
           // //     $validate['g-recaptcha-response'] = 'required|recaptcha';
           // // }
        ]; 
    }

    public function messages()
      {
          return [
              'type.required'                       => 'Please provide a User Type', 
              'email.required'                      => 'Please provide an Email',
              'email.email'                         => 'xxx',
              'email.min:6'                         => 'The field labeled "email" must be at least :min.',
              'email.unique:users,email'            => 'xxx',
              'password.required'                   => 'Please provide a Password',
              'password.alpha_num'                  => 'Password must be only letters and numbers',
              'password.between:2,20'               => 'Password must be between 2 and 20 characters',
              'password_confirmation.same:password' => 'Password must be the same',
              'terms.accepted'                      => 'Please check terms',
              'first_name.min:4'                    => 'The field labeled "first_name" must be at least :min.',
              'first_name.max:23'                   => 'The field labeled "first_name" must be less than :max characters.',
              'first_name.alpha_dash'               => 'The field labeled "first_name" may only contain letters, numbers, and dashes',
              'last_name.min:4'                     => 'The field labeled "last_name" must be at least :min.',
              'last_name.max:23'                    => 'The field labeled "last_name" must be less than :max characters.',
              'street.required'                     => 'The field labeled "Street" required.',
              'street.alpha'                        => 'The field labeled "Street" may only contain letters,',
              'street.min:5'                        => 'The field labeled "Street" must be at least :min.',
              'house.required'                      => 'The field labeled "House" required.',
              'house.numeric'                       => 'The field labeled "House" must be a number',
              'house.min:2'                         => 'The field labeled "House" must be at least :min.',

              'corpus.alpha_num'                    => 'The field labeled "Corpus" may only contain letters, numbers',
              'corpus.max:4'                        => 'The field labeled "Corpus" must be less than :max characters.',
              
            ];
      }
}
