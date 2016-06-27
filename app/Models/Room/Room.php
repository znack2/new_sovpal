<?php namespace App\Models\Room;

use App\Models\Presenters\RoomPresenterTrait;
use App\Models\Base;


use App\Models\_partials\Element;
use App\Models\User\User;
use App\Models\Item\Item;

// room - project
class Room extends Base
{
    use RoomPresenterTrait;

    protected $fillable = [
                //create
                'start_remont',
                'end_remont',
                'area',
                'title',
                'privacyType',
                //count
                'element_count',
                'item_count',
                //meta
                'meta_title',
                'meta_description',
                'meta_keywords',
                //do
                'type',
                'last_added_item_id',
                'user_id',
                'designer_id',
                'active',
                'complete'];

    protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    protected $cascadeDeletes = ['comments'];
    
    protected $with = ['user','elements'];
    
    public function user(){return       $this->belongsTo(User::class);}
    public function elements(){return   $this->belongsToMany(Element::class)->withTimestamps()->latest('pivot_updated_at');}
}

