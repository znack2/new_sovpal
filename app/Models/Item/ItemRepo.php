<?php namespace App\Models\Item;

use App\Models\Item\Item;
use App\Models\User\User;
use App\Models\_partials\Element;

use App\Models\Filters\AbstractRepo;
use App\Models\Item\ItemInterface;
// RepositoryFoundException
/*********************************************************************

                ( Item Material Tool )

**********************************************************************/

class ItemRepo extends AbstractRepo implements ItemInterface 
{
    protected $element;
    protected $_price;

    
    public function __construct(Item $item,Element $element)
        {
            $this->model    = $item;
            $this->element  = $element;
        }
/**
 *
 *  create Item
 *  
 *  TODO:
 *  - assign to room ( inject Room ) ??? 
 *  - assign user
 *  - set type
 *  - assign element
 *  - assign tag
 *  - set Info
 *  - set Image
 *  - set private
 *  - set premium
 *
 */

    public function storeItem($data, $item = null)
        {
          DB::beginTransaction();
       
          try {
              $item = isset($item) ? $item : DB::table('items')->insert();
              $this->addModel($item,'user',$this->currentUser);
              $this->set_Basic_Info($item, $data);
              $this->set_Image($item, $data);
              $this->assign_Tags($item,$data);
              $this->assign_Element($item,$data);
              $item->push();
          } catch(\Exception $e)
          {
              DB::rollback();
              throw $e;
          }
          DB::commit();
        }
/**                  
 *
 *  set Extra Info for item
 *  
 *
 */
    private function Set_Basic_Info($item,$data){
       $item->type            = e($data('type'));
       $item->title           = e($data('title')) ?: null; 
       $item->description     = e($data('description')) ?: null;  
       $item->order_condition = e($data('order_condition')) ?: null; 
       $item->condition       = e($data('condition')) ?: null; 
       $item->default_price   = e($data('default_price')) ?: null; 
       $item->qty             = e($data('qty')) ?: null; 
       return $item;
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function set_Image($item,$data){
          if($request->has('image'))
              {
                $this->removeImage($item,'item');
              } 
          if($request->hasFile('image'))
            {
              $image = $this->saveImage('items','items',$request->file('image'));
              $this->addImage($item,$request->file('image'),'item','cover_for_item_'.$item->title);
            }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function set_Private($item,$data){
       if($this->request->has('private')) {
            $item->private =  e($request->input('private'));
            $item->save();
          }
          if($request->has('private')) {           $item->title            = e($request->input('private')); }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function set_Premium($item,$data){
                //if item->role = premium
          $request = $this->request; 
          if($request->has('premium')) {           $item->premium          = e($request->input('premium')); }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function assign_Tags($item,$data){
      if($request->has('style') || $request->has('category'))
          {
            $tag = $item->tags()->where('type','style')->first();
            $tag = $item->tags()->where('type','category')->first();
            $this->removeModel($item,'tag',$tag);
            $this->addTag($item,$request);
          }
    }
/**
 *
 *  set Image for item
 *  
 *  TODO:
 *  - remove image is exist
 *
 */
    private function assign_Element($item,$data){
        if($request->has('element'))
      {
        $element = Element::find($item->element_id);
        $this->removeModel($item,'element',$element);
        $this->addModel($item,'element',$request->input('element'));
      }    
    }


    public function getPrice($format = false)
    {
        if(!isset($this->_price)){

            //todo calculate product options

            $this->_price = $this->product()->first()->price;

        }

        return $format ? price($this->_price) : $this->_price;
    }


    public function getSubtotal($format = false)
    {
        if(!isset($this->_subtotal)){

            $this->_subtotal = $this->getPrice() * $this->qty;

        }

        return $format ? price($this->_subtotal) : $this->_subtotal;
    }
}
