//role
      public function CreateRole(AdminRoleRequest $request)
        {
          //name = 'admin','moderator','owner','designer','builder','shop','free','month','year'
          //description
          //level
          //slug
          //active
          //user_count

          $this->access->checkEditRoles();

          $user = User::findOrFail($user_id);

          $arrayRoles = $user->roles()->lists('id');
          $arrayRoles[] = $role_id;
          $arrayRoles = array_unique($arrayRoles);

          $user->roles()->sync($arrayRoles);

          return Redirect::back();



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


          $user = User::firstOrFail($id);

          $founder = new Role;
          $founder->name = 'Member';
          $founder->save();

          $user->roles()->attach($founder->id);

          $manageTopics = new Permission;
          $manageTopics->name = 'manage_topics';
          $manageTopics->display_name = 'Manage Topics';
          $manageTopics->save();

          $founder->perms()->sync([$manageTopics->id, $manageUsers->id]);
          $admin->perms()->sync([$manageTopics->id]);

          return view('one', compact('item'));


          //assign role
          $role = Role::whereName('administrator')->first();
          $user->assignRole($role);
          //remove role
          $user->removeRole(3);
          //check if
          if ($user->hasRole('owner')) return 'you are the owner';
          return $user->roles;
        }
      public function updateRole(AdminRoleUpdateRequest $request)
        {
          foreach ($inputs as $key => $value)
          {
              $role = $this->role->where('slug', $key)->firstOrFail();
              $role->title = $value;
              $role->save();
          }
        }
      public function removeRole($id)
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

//ban user
      public function updateUser(ItemRequest $request,$id)
        {
          
        }