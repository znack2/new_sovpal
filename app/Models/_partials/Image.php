<?php namespace App\Models\_partials;

use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Models\Item\Item;
use App\Models\Group\Group;
use App\Models\Room\Room;

class Image extends Eloquent
{
    public $timestamps = false;
    protected $softDelete = false;

	protected $fillable = [
         //create
    	 'url',
          //count
         'logo_count',
         'avatar_count',
         'item_count',
         'room_count',
         'wallpaper_count',
         'address_count',
         'icon_count',
         'website_count',
         //do
         'file',
         'alt',
         'type',//change it for tag later
         'active'
    	 ];

     protected $cascadeDeletes = ['comments'];

     protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    public function items(){return         $this->morphedByMany(Item::class, 'imagged'); }
    public function rooms(){return         $this->morphedByMany(Room::class, 'imagged'); }
    public function groups(){return        $this->morphedByMany(Group::class, 'imagged'); }
}