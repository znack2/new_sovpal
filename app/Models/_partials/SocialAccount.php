<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class SocialAccount extends Model
{
    protected $table = ‘socialAccounts’;   
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}