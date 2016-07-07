//element
      public function CreateElement(AdminElementRequest $request)
        {
          //name
          //description
          //add image
          //add tag filter
          //add tag for room

            //event(increment_item or increment_room)

              $this->model->addMyTag('');
              return Redirect::to('admin/extra/'.$extra->id.'/create?select='.$this->selection.'&id='.$id);


              $image = $this->images()->where('user_id', \Auth::user()->id;)->first();

              if($image)
              { 
                $this->incrementImageCount();
              }
              else
                {
                  $image = new Image();
                  $image->user_id = $userId;
                  return $this->images()->save($image);
                }
        }
      public function updateElement(AdminElementUpdateRequest $request)
        {   $this->model->CreateNewTag(new Tag)
            return Redirect::to('admin/seo/'.$id.'/edit?type='.$this->type.'&id='.$itemID)->with('seo_updated', true);
        }
      public function removeElement($id)
          {

          }