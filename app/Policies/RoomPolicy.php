<?php namespace App\Policies;

use App\Models\Room\Room;

class RoomPolicy extends Policy
{
    public function __construct(Room $room)
    {
        $this->model = $room;
    }

    public function update($room)
    {
        logger()->info(__METHOD__);
        return $this->checkAuthor($room);
    }

    public function delete($room)
    {
        logger()->info(__METHOD__);
        return $this->checkAuthor($room);
    }
}
