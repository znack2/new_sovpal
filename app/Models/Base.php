<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\BasePresenterTrait;
use App\Models\Traits\NullTrait;

use App\Models\_partials\Image;
use App\Models\_partials\Tag;

use Illuminate\Database\Eloquent\Relations\Relation;
use LogicException;

class Base extends Model
{
      use BasePresenterTrait,SoftDeletes,NullTrait;
 
      public $timestamps = true;
      protected $casts = ['room_number'=>'integer','active'=>'boolean'];

      public function images(){ return            $this->morphToMany(Image::class, 'imagged'); }
      public function tags(){ return              $this->morphToMany(Tag::class,   'tagged');}

}






