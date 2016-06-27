<?php namespace App\Models\Traits;

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\Group\Group;

use App\Models\_partials\Element;
use App\Models\_partials\Tag;

trait IncrementTrait
{
/**
 *
 *  Activate user by code
 *
 */
    public function getLevel($user)
        {
            switch ($this->type) {
            case 'owner':
                $this->OwnerLevel();
                break;            
            case 'shop':
                $this->ShopLevel();
                break;            
            case 'profi':$rooms = $this->room_count;
                $this->ProfiLevel();
                break;
            }
            $user->level = $result;
            return $user->save();
        }
/**
 *
 *  Activate user by code
 *
 */
    protected funciton OwnerLevel()
        {
            $rooms      = $this->room_count;
            $elements   = $this->element_count;
            $items      = $this->item_count;
            $join_group = $this->join_count;

            switch (true) {
                case ($rooms > 1 && $elements > 1): $result = 1;
                    break;              
                case ($rooms > 2 && $elements > 10): $result = 2;
                    break;              
                case ($rooms > 3 && $elements > 50): $result = 3;
                    break;              
                case ($rooms > 5 && $elements > 50): $result = 4;
                    break;         
                 case ($rooms > 1 && $items > 10 && $join_group > 1 ): 5;
                    break;
                case ($rooms > 1 && $items > 30 && $join_group > 5): 6;
                    break;
                case ($rooms > 1 && $items > 40 && $join_group > 10): 7;
                    break;
                case ($rooms > 1 && $items > 70 && $join_group > 20): 8;
                    break;
                case ($rooms > 1 && $items > 100 && $join_group > 50): 9;
                    break;
                default: $result = 0;
                    break;
                }
        }
/**
 *
 *  Activate user by code
 *
 */
     protected funciton ShopLevel()
        {

         $items      = $this->item_count;
                    $own_group  = $this->group_count;

                    switch (true) {
                        case ($items > 10 && $own_group > 1): $result = 1;
                            break;
                        case ($items > 20 && $own_group > 5): $result = 2;
                            break;                        
                        case ($items > 30 && $own_group > 5): $result = 3;
                            break;
                        case ($items > 40 && $own_group > 10): $result = 4;
                            break;
                        case ($items > 50 && $own_group > 20): $result = 5;
                            break;                        
                        case ($items > 60 && $own_group > 20): $result = 6;
                            break;                        
                        case ($items > 70 && $own_group > 20): $result = 7;
                            break;                        
                        case ($items > 80 && $own_group > 20): $result = 8;
                            break;                        
                        case ($items > 90 && $own_group > 20): $result = 9;
                            break;
                        default: $result = 0;
                            break;
                    } 
        }
/**
 *
 *  Activate user by code
 *
 */
     protected funciton ProfiLevel()
        {
            switch (true) {
                    case ($rooms > 10): $result = 1;
                        break;
                    case ($rooms > 20): $result = 2;
                        break;                            
                    case ($rooms > 30): $result = 3;
                        break;
                    case ($rooms > 40): $result = 4;
                        break;                            
                    case ($rooms > 50): $result = 5;
                        break;
                    case ($rooms > 60): $result = 6;
                        break;                            
                    case ($rooms > 70): $result = 7;
                        break;                            
                    case ($rooms > 80): $result = 8;
                        break;                            
                    case ($rooms > 90): $result = 9;
                        break;
                    default: $result = 0;
                        break;
                }
            }
    }