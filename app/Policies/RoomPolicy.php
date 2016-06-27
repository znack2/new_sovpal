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
            if(!$this->checkAuthor($room))
                {
                    throw new \Exception('User can not update room');
                }
            return true;
        }

    public function delete($room)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($room))
                {
                    throw new \Exception('User can not delete room');
                }
            return true;
        }
}
