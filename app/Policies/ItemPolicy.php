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
                    throw new PolicyException('User can not update this item');
                }
            return true;
        }
    
    public function destroy($item)
        {
            logger()->info(__METHOD__);
            if(!$this->checkAuthor($item))
                {
                    throw new PolicyException('User can not delete item',$item);
                }
            return true;
        }    

    public function add($item)
        {
            logger()->info(__METHOD__);
            if($this->checkAuthor($item))
                {
                    throw new PolicyException('User can not add own item');
                }
            return true;
        }    

    public function remove($item)
        {
            logger()->info(__METHOD__);
            if($this->checkAuthor($item))
                {
                    throw new PolicyException('User can not remove own item');
                }
            return true;
        }
}
