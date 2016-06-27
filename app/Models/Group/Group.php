<?php namespace App\Models\Group;

use App\Models\Presenters\GroupPresenterTrait;
use App\Models\Base;

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\_partials\Address;

class Group extends Base
{
    use GroupPresenterTrait;

    protected $fillable = [
         'item_id',
         'user_id',
         'price',
         'user_need',
         'expires',
         //meta
         'meta_title',
         'meta_description',
         'meta_keywords',
         //count
         'item_count',
         'user_count',
         //do
         'type',
         'active',
         'complete'];

    protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    public function getRouteKeyName() {return 'slug'; }
        
    protected $cascadeDeletes = ['comments'];

    protected $with = ['user','item','images'];//'users','addresses','comments','likes','views','tags'

    public function addresses(){   return $this->hasManyThrough(User::class,Address::class)->orderBy('name');}
    public function users(){       return $this->belongsToMany(User::class)->withPivot('qty')->withTimestamps()->latest('pivot_updated_at');}
    public function user(){        return $this->belongsTo(User::class);}
    public function item(){        return $this->belongsTo(Item::class);}  
}