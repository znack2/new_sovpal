<?php namespace App\Models\User;

use App\Models\User\User;

use App\Models\User\UserInterface;
use App\Models\Filters\AbstractRepo;
use Session;

/*********************************************************************

                ( User / Owner Professional Shop )

**********************************************************************/

class UserRepo  extends AbstractRepo implements UserInterface
{
    public function __construct(User $user)
        {
            $this->model = $user;
        }
/**
 *
 *  
 *  TODO:
 *  - firstOrNew
 *  - set Plan ($customer = $bullable->createCustomer('token');)
 *  - check return $user to registration? 
 *
 */
    public function storeUser($user = null)
        {
          $data = $this->filters;

          DB::beginTransaction();
          $user = User::where('id', $id)->update(['name', $request->name]);

          try {
              $user = isset($user) ? $user :  $this->set_Basic_Info($data,\Session::get('provider'));
              $this->set_Extra_Info($user, $data);
              $this->set_Image($user, $data);
              // $this->set_Plan($user,$data);
              $user->assing_Address($data);
              $user->push();
              return 'Your profile information successfully has been'. isset($user) ? 'updated' : 'stored';
          } catch(ValidationException $e)
          {
              DB::rollback();
              return redirect()
                    ->back()
                    ->withErrors( $e->getErrors() )//'error' => $e->getMessage()
                    ->withInput();
          } catch(\Exception $e)
          {
              DB::rollback();
              throw $e;
          }
          DB::commit();
        }
/**
 *
 *  
 *  TODO: - check if provider really give data
 *
 */
    private function set_Basic_Info_for_User($data,$provider = null){
          $user = DB::table('users')->insert([]);
          $user->activation_code = str_random(60);
          $user->password        = bcrypt($data['password']);
          $user->type            = e($data['type']);
          $user->first_name      = $provider->getName()  ?: e($data['first_name']);
          $user->email           = $provider->getEmail() ?: e($data['email']);
          $user->provider        = $provider ?: null;
          $user->provider_id     = $provider->getId() ?: null;
          return $user;
    }
/**                  
 *
 *
 */
    private function Set_Extra_Info_for_User($user,$data){
           $user->language        = \Session::has('locale') ? \Session::get('locale') : 'ru';
           $user->last_name       = $data['type'] != 'shop' ? e($data['last_name']) : null;
           $user->gender          = $data['type'] != 'shop' ? e($data['gender']) : null;
           $user->birthday        = $data['type'] != 'shop' ? date("Y-m-d",strtotime($data['birthday'])) : null;
           $user->hour_cost       = $data['type'] == 'profi' ? e($data['hour_cost']) : null;
           $user->own_remont      = $user->type == 'owner' ? e($data['own_remont']) : null; 
           $user->with_designer   = $user->type == 'owner' ? e($data['with_designer']) : null; 
           $user->education       = $user->type == 'profi' ? e($data['education']) : null; 
           $user->refund_policy   = $user->type == 'shop' ? e($data['refund_policy']) : null; 
           $user->delivery_policy = $user->type == 'shop' ? e($data['delivery_policy']) : null; 
           $user->phone_code      = substr($data['phone'], 0, 3);
           $user->phone           = substr($data['phone'], 3);
           $this->set_SKills($user,$data);
           return $user;
    }
/**
 *  
 *  TODO: - remove image is exist
 *
 */
    private function set_Image_for_User($user,$data){
        if($data->hasFile('avatar_image') && $data->file('profile_picture')->isValid()) {
          $this->removeImage($user,'avatar');
          $this->saveImage('users',$user->type,$data->file('avatar_image'));
          $this->addImage($user,$data->file('avatar_image'),'avatar','avatar_for_'.$user->first_name);
        }
        return $user;
    }
/**
 *
 *  TODO: - check if tags exist remove them
 *
 */
    private function set_Skills_for_Profi($user,$data){
          if($user->type == 'profi' && $data('skills') && $user->tags()->where('type','skill')->first()) {
             $tags = $user->tags()->where('type','skill')->get();
             //remove all old tags
               foreach ($tags as $tag) {
                  $this->removeModel($user,'tags',$tag);
               }
          } 
          $this->addTag($user,$data);
          return $user; 
    }
}



