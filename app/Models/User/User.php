<?php namespace App\Models\User;

use App\Models\Base;
use App\Models\Presenters\UserPresenterTrait;
use App\Models\Traits\AddressTrait;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Models\_partials\Address;
use App\Models\Group\Group;
use App\Models\Item\Item;
use App\Models\Room\Room;

class User extends Base implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, UserPresenterTrait,AddressTrait;   
  
    protected $fillable = [
            //register
            'email',
            'password',
            'type',
            //oauth
            'provider_id',
            'provider',
            //activate
            'activation_code',
            'activated_at',
            //profile
            'first_name',
            'last_name',
            'level',
            'gender',
            'skills',
            'hour_cost',       
            'education',
            'own_remont',
            'with_designer',
            'phone',
            'phone_code',
            
            'refund_policy',
            'delivery_policy',
            'birthday',
            //meta
            // 'style',
            // 'website',
            // 'slogan',
            // 'terms_of_service',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',
            //count 
            'join_count',
            'group_count',
            'room_count',
            'item_count',
            'element_count',
            //security 
            'language',
            'last_login',
            //admin 
            'active',
            ];

    public function getRouteKeyName() {return 'slug'; }

    protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    protected $cascadeDeletes = ['comments'];

//     protected $with = ['rooms','items','groups','join_groups','orders'];

    public function join_groups(){return    $this->belongsToMany(Group::class)->withTimestamps()->withPivot('qty')->latest('pivot_updated_at');}
    public function addresses(){return      $this->belongsToMany(Address::class)->withTimestamps()->latest('pivot_updated_at');}
    public function orders(){return         $this->belongsToMany(Item::class)->withTimestamps()->withPivot('how_long')->latest('pivot_updated_at');}


    public function Groups(){return         $this->HasMany(Group::class,'user_id')->orderBy('created_at');}
    public function Items(){return          $this->HasMany(Item::class, 'user_id')->orderBy('created_at');}
    public function Rooms(){return          $this->HasMany(Room::class,'user_id')->orderBy('updated_at');}
    
}
