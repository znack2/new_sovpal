<?php namespace App\Policies;

use App\Models\Item\Item;

class ItemPolicy extends Policy
{
    public function __construct(Item $item)
        {
            $this->model = $item;
        }

    public function update($item)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($item))
                {
                    throw new \Exception('User can not update this item');
                }
            return true;
        }
    
    public function delete($item)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($item))
                {
                    throw new \Exception('User can not delete item');
                }
            return true;
        }
}
