<?php namespace App\Models\Traits;

use App\Models\_partials\Tag;
// use App\Models\_partials\Tagged;

trait TagTrait
{
  /**
 *
 *  Activate user by code
 *
 */
  public function getTags($type = null)
    {
        logger()->info(__METHOD__);
        if(!$type) {
            throw new UserBannedException;
        }
        return isset($type) ? $this->tags()->where('type',$type)->all() : $this->tags()->all();
    }
/**
 *
 *  Activate user by code
 *
 */
  public function getTag($type = null,$example = null)
    {
        logger()->info(__METHOD__);
        if(!$type) {
            throw new UserBannedException;
        }
        $tags = isset($type) ? $this->tags()->where('type',$type) : $this->tags();
        $tag = isset($example) ? $tags->where('name',$example)->first() : $tags->first();

        isset($tag) && $tag->name == $example ? true : false;
        return $tags->first() ? $tag['name'] : 'default';
    }
/**
 *
 *  Activate user by code
 *
 */
	public function addTag($model,$request)
	  {
          logger()->info(__METHOD__);
          if(!$model) {
            throw new UserBannedException;
          }
          $tags = [];

          $tags[] = $request->has('style') ? Tag::find($request->input('style')) : '';
          $tags[] = $request->has('room') ? Tag::find($request->input('room')) : '';
          $tags[] = $request->has('category') ? Tag::find($request->input('category')) : '';

          if($request->has('skills'))
          {
              foreach ($request->get('skills') as $key=>$value) {
                  $tags[] = Tag::where('name',$value)->first();
              }
          }
          foreach($tags as $tag)
          {
              $tag->increment(class_basename($model).'_count');
              $tag->save();
              $model->tags()->attach($tag);
          }
          return $model;
	  }
/**
 *
 *  Activate user by code
 *
 */
	public function removeTag($tag)
	  {
          logger()->info(__METHOD__);
          if(!$tag) {
            throw new UserBannedException;
          }
          $tag = $this->model->tags()->where('name', trim($tag))->first();
          $tag->delete() ? $this->decrementModel($this->model,'tag',$tag) : false;
          return true;
	  }
}

