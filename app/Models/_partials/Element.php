<?php namespace App\Models\_partials;

use App\Models\Base;

use App\Models\Item\Item;
use App\Models\Room\Room;

class Element extends Base
{
    protected $fillable = [
    //create
     'name',
     'description',
     //count
     'item_count',
     'room_count',
     //do
     'active',
     ];

     protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    protected $cascadeDeletes = ['comments'];

    protected $with = ['images'];//'items','rooms','tagged','images'
    
    public function items(){return        $this->HasMany(Item::class)->orderBy('title');}
    public function Rooms(){return        $this->belongsToMany(Room::class)->withPivot('step')->withTimestamps()->latest('pivot_updated_at');}
}

