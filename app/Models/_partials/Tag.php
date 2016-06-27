<?php namespace App\Models\_partials;

use Illuminate\Database\Eloquent\Model as Eloquent;

use App\Models\_partials\Element;
use App\Models\_partials\Image;

use App\Models\Item\Item;
use App\Models\Group\Group;
use App\Models\Room\Room;

use App\Models\Presenters\TagPresenterTrait;

class Tag extends Eloquent
{
	use TagPresenterTrait;
	
	public $timestamps = false;
	protected $softDelete = false;

	protected $fillable = [
		'name',
		'type',
		'description',
		'parent_id',
		'priority',
		//count
		'user_count',
		'item_count',
		'room_count',
		'overall_count',
		'style_count',
		'category_count',
		'brand_count',
		'country_count',
		'skill_count',
		//security
		'active',
	];

    protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    protected $cascadeDeletes = ['comments'];

	protected $with = ['images'];

	public function Images() {return    $this->morphToMany(Image::class, 'imagged'); }
	public function elements(){return 	$this->morphedByMany(Element::class, 'tagged'); }
	public function items(){return 		$this->morphedByMany(Item::class, 'tagged'); }
    public function rooms(){return 		$this->morphedByMany(Room::class, 'tagged'); }
    public function groups(){return 	$this->morphedByMany(Group::class, 'tagged'); }
    

}
