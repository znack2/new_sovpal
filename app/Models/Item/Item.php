<?php namespace App\Models\Item;

use App\Models\Presenters\ItemPresenterTrait;
use App\Models\Base;

use App\Models\_partials\Element;
use App\Models\User\User;
use App\Models\Group\Group;
use App\Models\Room\Room;

class Item extends Base
{
    use ItemPresenterTrait;

    protected $fillable = [
        //create
        'title',
        'description',
        'default_price',
        'user_id',
        'premium',
        'qty',
        'private',
        //meta
        'meta_title',
        'meta_description',
        'meta_keywords',
        //count
        'group_count',
        'user_count',
        'room_count',
        //do
        'type',
        'element_id',
        'order_condition',
        'active',
        'last_add_user_id',
        ];

    protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];
    public function getRouteKeyName() {return 'slug'; }
    
    protected $cascadeDeletes = ['comments'];
    
    protected $with = ['user','images','element','groups','tags'];

    public function groups(){return         $this->hasMany(Group::class)->orderBy('price');}

    public function user(){return           $this->belongsTo(User::class);}
    public function element(){return        $this->belongsTo(Element::class);}

    public function users(){return          $this->belongsToMany(User::class)->withTimestamps()->latest('pivot_updated_at');}
}

