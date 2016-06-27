<?php namespace App\Models\_partials;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class Review extends Model
{
    protected $fillable = [
        'comment',
        'stars',
    ];

    public function User(){return         $this->belongsTo(User::class)->orderBy('first_name');}
}

