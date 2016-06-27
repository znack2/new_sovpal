<?php namespace App\Models\Presenters;

trait TagPresenterTrait
{
  /**
   *
   *  get Tag's type count
   *  
   *
   */
	public function getTagCount($type)
		{
			logger()->info(__METHOD__);
			switch ($type) {
				case 'items': return $this->item_count;
					break;				
				case 'tools': return $this->tool_count;
					break;				
				case 'materials': return $this->material_count;
					break;		
				case 'owners': return $this->owner_count;
					break;		
				case 'profi': return $this->profi_count;
					break;		
				case 'shops': return $this->shop_count;
					break;
				default: throw new Exception();
					break;
			}
		}
}