<?php namespace App\Models\_partials;

use Illuminate\Database\Eloquent\Model;

use App\Models\User\User;
use App\Models\Group\Group;
use App\Models\_partials\Image;
use App\Models\_partials\Tag;

class Address extends Model
{
    protected $fillable = [
         //create
         'street',
         'house',
         'corpus',
         //count
         'user_count',
         'room_complete_count',
         //do
         'active'
         ];

     protected $nullable = [
        'facebook_profile',
        'twitter_profile',
        'linkedin_profile',
    ];

    protected $cascadeDeletes = ['comments'];

    // protected $with = ['users','groups','tags','images','tagged'];
    
    public function Users(){return         $this->belongsToMany(User::class)->withTimestamps()->latest('pivot_updated_at');}
    public function Groups(){return        $this->hasManyThrough(User::class,Group::class)->orderBy('name');}

    public function images(){return        $this->morphToMany(Image::class, 'imagged'); }
    public function tags(){return          $this->morphToMany(Tag::class,   'tagged');}
    
}

