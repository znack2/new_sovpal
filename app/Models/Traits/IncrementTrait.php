<?php namespace App\Models\Traits;

use App\Models\User\User;
use App\Models\Item\Item;
use App\Models\Group\Group;

use App\Models\_partials\Element;
use App\Models\_partials\Tag;

use Auth;

trait IncrementTrait
{
  //      $message = 'You have been successfully withdrown from group';
  //      return $message;

    public function saveModel($model)
      {
        return $model->save();
      } 

    public function deleteModel($model)
      {
          switch ($class = class_basename($model)) {
              case 'Group': $name = $model->item()->title;
                  break;
              case 'Item': $name = $model->title;
                  break;
              case 'User': $name = $model->first_name;
                  break;
              case 'Room' || 'Element' : $name = $model->name;
                  break;
          }
          $model->delete();
          return $class . $name . 'successfully has been destroyed!';
      } 

      //   $previousCount = $this->model->tagged()->whereName($tag)->take(1)->count();
      //   if($previousCount >= 1) { return; }
      
      // $tagged = Tagged::whereName($tag)->first();
      //     // $tagged = new Tagged([
      //     //   'tag'=>$tag,
      //     //   'slug'=>str_slug($tag)]);
      
      // $this->model->tags()->save($tagged);
      // $this->incrementTagCount($tag, 1);
      // return true;
  
    public function addModel($model,$related,$item)
      {
          $this->incrementModel($model,$related,$item);

        // $user->join_groups()->save($group);
        // $group->increment('user_join_count');
        // $user->increment('join_count');

          if($related == 'elements' || $related == 'join_groups')
          {
              return $model->$related()->attach($item->id);
          }
          elseif($related == 'items' && $item == 'tool')
          {
              return $model->$related()->attach($item->id, ['how_long' => 22]);
          }
          elseif($related == 'items' && $item == 'tool')
          {
              return $model->$related()->attach($item->id, ['qty' => 22]);
          }
          else
          {
              return $model->$related()->associate($item->id);
          }
      }       

    public function removeModel($model,$related,$item)
      {
        $item->checkAdd($this->currentUser);//check if user have item
        $this->decrementModel($model,$related,$item);
        // $user->join_groups()->detach($group->id);
        // $group->decrement('user_join_count');
        // $user->decrement('join_count');

        return $model->$related()->detach($item->id);
      }   

    public function incrementModel($model,$related,$item)
      {
          switch ($related) {
              case 'user': $extra_model = $related::find($item->id);
                  break;
              case 'element': $extra_model = $related::find($item->id);
                  break;
              case 'elements' : $extra_model = Element::find($item->id);
                  break;
              case 'item': $extra_model = $related::find($item->id);
                  break;
              case 'items' : $extra_model = Item::find($item->id);
                  break;
              case 'join_groups' : $extra_model = Group::find($item->id);
                  break;
              default:
                  break;
          }
          $extra_model->increment(strtolower(class_basename($model)).'_count');
          return $this->saveModel($extra_model);
      }
    public function decrementModel($model,$related,$item)
      {
          $extra_model = $related::find($item->id);
          $related == 'user' ? $this->getLevel($extra_model) : false;

          strtolower(class_basename($model)) == 'user'
              ? $extra_model->decrement($model->type.'_count')
              : $extra_model->decrement(strtolower(class_basename($model)).'_count');

          return $this->saveModel($extra_model);
      }


      // $counter = $this->users()->first();

      // if($counter) {
      //     $counter->count++;
      //     $counter->save();
      // } else {
      //     $counter->count = 1;
      //     $this->views()->save($counter);
      // }

      // if($counter) {
      //     $counter->count--;
      //     if($counter->count) {
      //         $counter->save();
      //     } else {
      //         $counter->delete();
      //     }
      // }



      // if($count <= 0) { return; }
      
      // $tag = $this->tagged()->where('name',  $name)->first();

      // if(!$tag) {
      //   $tag = new Tag;
      //   $tag->name = $name;
      //   $tag->slug = str_slug($name);
      //   $tag->save();
      // }
      // elseif($tag)
      //   {
          //$tag->count = $tag->count - $count;
                 //    if($tag->count < 0) {
                 //      $tag->count = 0;
                 //    }
                 //    $tag->save();
        //}
      
      // $tag->count = $tag->count + $count;
      // $tag->save();

    public function activate($model)
       {    
         $model->active == true;   
         return $model->save();
       }   
}


// public function attachItem($room,$request)
//   {
//     if($request->has('item')) {   
//       $room->items()->attach($request['item']);
//       //update by default not in RoomRepo
//       $room->update(['last_added_item_id',$request['item']]);
//       $room->increment('item_count');
//       $this->incrementModel($room,'item',$request['item']);
//       $this->incrementModel($item,'user',\Auth::id());
//       $this->saveModel($room);
//     } 
//     if($request->has('element')) {   

//       $room->elements()->attach($request['element']);
//       $room->increment('element_count');
//       $this->incrementModel($room,'element',$request['element']);
//       $this->incrementModel($element,'user',\Auth::id());
//       $this->saveModel($room);
//     } 
//   } 

// public function detachItem($room,$request)
//   {
//     if($request->has('item')) {   

//       $room->items()->detach($request['item']);
//       $room->decrement('item_count');
//       $this->decrementModel($room,'item',$request['item']);
//       $this->decrementModel($item,'user',$currentUser->id);
//       $this->saveModel($room);
//     } 
//     if($request->has('element')) {   
//       $room->elements()->detach($request['element']);
//       $room->decrement('element_count');
//       $this->decrementModel($room,'element',$request['element']);
//       $this->decrementModel($element,'user',$currentUser->id);
//       $this->saveModel($room);
//     } 
//   }

