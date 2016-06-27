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
        return $this->checkAuthor($item);
    }

    
    public function delete($item)
    {
        logger()->info(__METHOD__);
        return $this->checkAuthor($item);
    }
}
