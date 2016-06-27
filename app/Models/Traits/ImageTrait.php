<?php namespace App\Models\Traits;

use App\Models\_partials\Image;
use App\Models\_partials\Imagged;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
/**
 *
 *  get images
 * TODO: use storage?
 */
    public function getImages($type = null)
    {
        logger()->info(__METHOD__);
          if(!$type) {
            throw new UserBannedException;
          }
        return isset($type) ? $this->images()->where('type',$type)->all() : $this->images()->all();
    }
/**
 *
 *  get image
 * TODO: use storage?
 *
 */
    public function getImage($type,$alt = null)
    {
        logger()->info(__METHOD__);
        //function($filename)
		// $file = Storage::disk('public')->get($filename);
		// return Response($file,200)
		//src={{ route('image',['filename'=>$user->name.'-'.$user->id.'.jpg']) }}
        $images = $type == 'group' ? $this->item->images() : $this->images();

	      if(!$images->where('type',$type)->first()) {
	        throw new UserBannedException;
	      }
        
        $result =  $image ? $image->url.'.'.$image->file : $this->type.'.png';
        return isset($alt)  ? 'image'.$type.'for'.$this->first_name : $result;


          if(!$image = $this->images()->where('type','tag')->first()){
            throw new Exception(); //response $this->type.'.png';
          }
 		   return $image->url.'.'.$image->file
    }
/**
 *
 *  save image
 * TODO:use storage?
 */
	public function saveImage($type,$podtype = null,$data)
		{
		  logger()->info(__METHOD__);
          if(!$type) {
            throw new UserBannedException;
          }
	//setup info about ftp in config
	//create new disk
	//save filename = $request->input('image').$user->id.'.jpg'
	//Storage::disk('public')->put($filename,File::get($request->input('image')));
	// Storage::put('avatars/'.$request->route('user')->id, file_get_contents($request->file('url')->getRealPath()));
	// Storage::put($request->file('url'), $resource);	

		   $extension = $data->getClientOriginalExtension();
		   $file_name = strtotime(\Carbon\Carbon::now()).trim($data->getClientOriginalName());
		   $file_type = $data->getClientMimeType();
		   $name 	  = $data->getFilename();
		   // $path = '/img/';
		   // $name = sha1(Carbon::now()).'.'.$image->guessExtension();
		   // $image->move(getcwd().$path, $name);
		   $data->move(public_path().'/assets/images/'.$type.'/'.$podtype.'/', $file_name); 
	       return $data->getClientOriginalName();
	    }
/**
 *
 *  Add image
 *
 */
	public function addImage($model,$request,$type=null,$alt=null)
	  {
	  	  logger()->info(__METHOD__);
          if(!$model) {
            throw new UserBannedException;
          }
	    // $path_parts = pathinfo(trim($data));
		$image          = new Image;
		$image->url     = strtotime(\Carbon\Carbon::now()).substr($request->getClientOriginalName(),0,-4);
		$image->file    = $request->getClientOriginalExtension();
		$image->alt     = $alt;
		$image->type    = $type;
		$image->save();

	    // $model->image_count = $model->images->count();
	    // $this->incrementImageCount($image);
	    return $model->images()->attach($image);
	  } 
/**
 *
 *  remove image
 *
 */
	public function removeImage($model,$type)
	  {
          logger()->info(__METHOD__);
          if(!$model) {
            throw new UserBannedException;
          }
	      $image = $model->images()->where('type',$type)->first();
    	  $image_path = getcwd().$image->url;
      	  unlink(realpath($image_path));
	      $model->images()->detach($image);
	      return true;
	      // $image = $model->images()->where('user_id', $this->currentUser->id)->first();
	      // if(!$image) return;
	      // $image->delete();
	  }
}