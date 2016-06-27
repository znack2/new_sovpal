<?php namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\Room\Room;
use App\Models\Group\Group;

use App\Policies\UserPolicy;
use App\Policies\ItemPolicy;
use App\Policies\RoomPolicy;
use App\Policies\GroupPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class   => UserPolicy::class,
        Item::class   => ItemPolicy::class,
        Room::class   => RoomPolicy::class,
        Group::class  => GroupPolicy::class,
    ];

    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);
    }
}
