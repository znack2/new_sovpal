<?php namespace App\Models\Filters;

use App\Models\Filters\AbstractInterface;
use App\Models\Traits\ImageTrait;
use App\Models\Traits\TagTrait;
use App\Models\Traits\IncrementTrait;

// use App\Exceptions\Exceptions;
// use App\Exceptions\RepositoryFoundException;

use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

use \App\Models\_partials\Tag;
use \App\Models\_partials\Element;
use \App\Models\Item\Item;

abstract class AbstractRepo implements AbstractInterface
{
  use ImageTrait,TagTrait,IncrementTrait;

  public $message;
  public $model;
  public $currentUser;
  public $currentModel;

  protected $request;
  protected $query;

  private function __construct(Builder $query, Model $model = null)
      {
          // firstOrCreate(['github_id', $githubUser->id], ['avatar' => $githubUser->avatar])
              
          $this->model        = $model;
          $this->currentModel = $this->model->getMorphClass();
          $this->currentUser  = \Auth::user();
          $this->request      = collect(Request::all());
          $this->query        = $query;
      }
/**
 *
 *  create new room
 *  
 *  TODO: chech request return null???
 *
 */
  public function Filter()
      {
        foreach ($this->request->all() as $name=>$value){
          if(method_exists($this,$name)){
            call_user_func_array([$this,$name],array_filter([$value]));
          }
        } 
         return Cache::remember(array_keys($this->request), 10080, function(){
              $this->query->count() > 1 ? $this->query->paginate(15) : $this->query->get();
          });

          //  $this->request->each(function ($value, $name) {
          //     $this->getFilterFor($name)->filter($this->query, $value);
          // });




        // if users index in landing



       $address = Address::where('street',$request['street'])->where('house',$request['house'])->first();

      if($address->user_count != 0)
        {
           foreach($address->users as $user)
            {
              $response['name']    = $user->getFullName() ? 'Here should be your name!';
              $response['image']   = asset('assets/images/users/'.$user->getImage('avatar'));
            }
              $response['message'] =  trans( 'sovpal.We have found' )
                          .$address->user_count 
                          .trans('sovpal.people around you,please registr to use webservice') ? 'You are first!' ;
        }




      }
/**
 *
 *  create new room
 *  
 *  TODO:
 *
 */
  public function getExpire($date)
    {
          if($date == 'today'){$expire = Carbon::tomorrow();}
          elseif($date == 'nextweek'){$expire = Carbon::now()->addWeek(1);}
          else{$expire = Carbon::now()->addMonth(1);}
          return $data->where('active',1)->whereBetween('expires',[Carbon::now(),$expire]);
    }
/**
 *
 *  order by field
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function getSortBy($sort,$order = 'desc')
    {
       logger()->info(__METHOD__);
      return $this->model->orderBy($sort, $order);
    }  
/**
 *
 *  by Field value
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function getlimitBy($field)
    {
       logger()->info(__METHOD__);
      return $this->model->where($field, '1');
    }
/**
 *
 *  limit data
 *  
 *  TODO:
 *
 */
  public function take($count)
    {
        logger()->info(__METHOD__);
        return $this->model->limit($count);
        // return skip($offset)->take($limit);
    }
/**
 *
 *  By updated_at field
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function getRecent($order = 'desc')
    {
       logger()->info(__METHOD__);
        return $this->model->orderBy('created_at',$order);
    }
/**
 *
 *  By view_count field ( view )
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function getPopular($order ='desc')
    {
       logger()->info(__METHOD__);
      return $this->model->orderBy('views',$order);
    }
/**
 *
 *  By Private filed
 *  
 *  TODO:
 *  - check room complete
 *  - assign type_tag
 *  - assign style_tag
 *  - assign work_tag
 *  - set Room Info
 *
 */
  public function getPrivate($type, $data)
    {
      $data = $data->where('private',0);
      $currentAdress = Auth::user()->addresses()->first()->id;

      foreach($data->where('private',1) as $item)
        {
          $author_address = $item->user->addresses()->first()->id;

          if($author_address == $currentAdress)
            {
               $data = $data->merge($item);
            }
        }
      return $data;
    }
/**
 *
 *  By Keyword(search)
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function ByKeyword($type,$field,$keyword)
     {
      logger()->info(__METHOD__);
      if($type == 'groups'){
            $items = Item::with('groups')->where($field, 'LIKE', '%'.trim($keyword).'%')->get();
            $data = $items->groups();
          }
      if(! $data = $this->ByType($type)->where($currentModel == 'Item' ? 'title' : 'first_name' , 'LIKE', '%'.trim($keyword).'%'))
           {
               throw new Exception('Data for "' . $keyword . '" does not exist!');
           }
         return $data;
     }
/**
 *
 *  By Id
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function ById($id)
    {
      logger()->info(__METHOD__);

      // DB::table('states')->where('states.id',1)
      //   ->join('countries','states.country_id','=','countries.id')
      //   ->select('countries.label as country','states.label as state')
      // ->get();

      if(! $data = $this->model->find($id))
         {
             throw new Exception('Data for "' . $id . '" does not exist!');
         }
       return $data;
    }  
/**
 *
 *  By Tag
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function ByTag($type,$name)
    {    
      //by tag-image english 
      //or use trans() tag-name?
      logger()->info(__METHOD__);    
      if(! $tag = Tag::where('name',trim($name))->first())
        {
          throw new Exception('Data for "' . $tag . '" does not exist!');
        }
      $data = $tag->items()->where('type',$type);
      
      return $data;
    }  
/**
 *
 *  By Element
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function ByElement($type,$name)
    {        
      logger()->info(__METHOD__);
      if(! $element = Element::where('name',trim($name))->first())
        {
          throw new Exception('Data for "' . $element . '" does not exist!');
        }
      $data = $element->items()->where('type',$type);
      
      return $data;
    }
/**
 *
 *  By Type field
 *  
 *  TODO:
 *  - check room complete
 *
 */
  public function ByType($type)
      {
        switch ($this->currentModel) {
          case 'Item': $type = 'items';
            break;      
          case 'User': $type = 'owners';
            break;      
        }

        logger()->info(__METHOD__);
        $type   = strtolower(substr($type,0,-1));
        $data = $this->model->where('type',$type);

        if(!in_array($type, ['items','shops'])){
              $result = $this->getByAddress($address, $data);
            }

        if(in_array($type,['tools','materials'])){
              $result = $this->getPrivate($type, $data);
        }

        if(! $result)
           {
               throw new Exception('Data for "' . $type . '" does not exist!');
           }

         return $data;
      }  
/**
 *
 *  By Address
 *  
 *  TODO:
 *  - check room complete
 *  - assign type_tag
 *  - assign style_tag
 *  - assign work_tag
 *  - set Room Info
 *
 */
  public function getByAddress($address, $data)
       {

        //tools or mats
        //owners or designers
        //groups

         return $data->whereHas('users',function( $query ) use ($address)
           {
               $query->where('street',trim($address['street']))
                     ->where('house',trim($address['house']))
                     ->orWhere('corpus',trim($address['corpus']));
          });


        //1
        //find users by address
        //get all items or groups (by users who join or add it)
          $users = User::with('items','groups')->whereHas('addresses',function( $query )
             {
                 $query->find(Auth::user()->addresses()->first()->id);
             })->get();

          if(in_array($type,['items','tools','materials'])){
              $data = $users->items();
          }elseif($type == 'groups'){
              $data = $users->groups();
          }else{
              $data = $users->items();
          }


          //2
          //find items/groups by users with the same address
          //find users with the same address

          if(in_array($type,['tools','materials','groups'])){
                $data = $this->model->where('type',$type)->whereHas('users',function( $query ) use ($users)
             {
                $query->whereIn($users->list('id'));
            });
            }
          else{
               $data = $this->model->where('type',$type)->whereHas('addresses',function( $query )
            {
               $query->find(Auth::user()->addresses()->first()->id);

            });
          }
       }
}

