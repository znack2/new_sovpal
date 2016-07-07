   public function CreateTag(AdminTagRequest $request)
        {
         $name = $request->name;

         $tag->type = // array_keys('style','filter','brand','country','room','house')));
         $tag->name = $name
         $tag->slug = $this->getSlug($name);
         $tag->description = // if country ( country_code / region_code / sub_region_code )
         $tag->image = 
         $tag->parent_id = //tag_id
         $tag->priority = //?
         $tag->save();
         // $id = Input::get('id');
         // $item = $this->Extra($this->selection, $id);

         // Forma::create('seoForm');
         // $seo = new Newsletters;
         // $seo->updateFromInput();
         // $item->seo()->save($seo);

         //get item id
         //create new  seo
         //save credentials for seo
              $this->model->CreateTag(new Tag)
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
      public function updateTag(AdminTagUpdateRequest $request)
        {   
          //create categories
          //create elements
          //create types

          //create all extra stuff

          //1
          //country
          //brands-->associate(country_id)
          //attach->(category)

          //type->attach(category)

          //2
          //categories
          //elements-->associate(category_id)

          $itemID = $selected::get('id');
          $item = $this->getItem($this->selection, $itemID);
          $seo = Newsletters::find($id);

          View::share('input', $this->selection);
          return View::make('admin.item.edit', compact('seo','item'));

          $seo = $selected::find($id);

          $itemID = Input::get('id');

          $seo->updateFromInput();




          $this->model->CreateNewTag(new Tag)
            return Redirect::to('admin/seo/'.$id.'/edit?type='.$this->type.'&id='.$itemID)->with('seo_updated', true);
        }
      public function removeTag($id)
          {
            $this->access->checkEditRoles();

            $user_id = Input::get('user_id');
            $role_id = Input::get('role_id');

            // Запрещено сниматьсебе админский статус
            // TODO переделать на $this->access->... в модуле Admin, который тоже надо сделать.
            if( ! (Auth::user()->id == $user_id AND $role_id == 1))
            {
              $user = User::findOrFail($user_id);

              $arrayRoles = $user->roles()->lists('id');
              $arrayRoles = array_diff($arrayRoles, [$role_id]);
              $arrayRoles = array_unique($arrayRoles);

              $user->roles()->sync($arrayRoles);
            }

            return Redirect::back();




            if(is_null($userId)) {
                $userId = \Auth::user()->id;
            }

            if($userId) {
                $like = $this->likes()->where('user_id', $userId)->first();

                if(!$like) return;

                $like->delete();
            }
            event('roomUpdate');
            // $this->decrementLikeCount();
          }