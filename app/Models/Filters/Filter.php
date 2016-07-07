<?php namespace Acme\Filter;

use Acme\Repo\AbstractInterface;
use Acme\Repo\Eloquent\Helpers\FindRepository;
use Acme\Exceptions\Exceptions;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;

class Filter implements FilterInterface
{
    public function Filter($table,$filter, $field,$field_id)
    {
        $message = 'Result filter '.$table.'s '.$filter;

        switch ($table) {
            case 'Item':
                if(!$items = $this->getItems()->where($field, $field_id))
                {
                    $message = 'Nothing to find for '.$filter.'filter.<br>Try change filter settings or come back';
                }
                $this->indexItems($items,$message);
                break;
            default :
                $this->getCertainFilter($table,$filter,$field,$field_id);
        }
    }

    public function getCertainFilter($table,$filter,$field,$field_id){

        $message = 'Result filter '.$table.'s '.$filter;

        switch ($table) {
            case 'Item':
                if(!$items = $this->getItems()->WhereHas($table, function ($query) use ($field,$field_id) {$query->where($field, $field_id);})->get())
                {
                    $message = 'Nothing to find for '.$filter.'filter.<br>Try change filter settings or come back';
                }
                $this->indexItems($items,$message);
                break;

                if (!$materials = $this->getMaterials()->WhereHas('owner', function ($query) use ($field,$field_id) {$query->where($field, $field_id);})->get())

                if (!$owners = $this->getOwners()->WhereHas('remont','tools','materials','posts', function ($query) use ($field,$field_id) {$query->where($field, $field_id);})->get())

                if (!$shops = $this->getShops()->WhereHas('items', function ($query) use ($field,$field_id) {$query->where($field, $field_id);})->get())
                if(!$remonts = $this->getRemonts()->WhereHas('rooms', function ($query) use ($field,$field_id) {$query->where($field, $field_id);})->get())
   
                return Redirect::back();
        }
    }

    public function Search()
    {
        //send keyword to view show "result for keyword"!!!!!!!!!!!!!!!
        /* !!!  index not working if one item find !!! */
        //search only 10 characters!!!!!!!
        //if keyword not exist get all-->search inside repo???
        $keyword    = trim(strip_tags(Request::get('search')));
        $table      = trim(strip_tags(Request::get('table')));
        $field      = trim(strip_tags(Request::get('field')));

        if(!$field)
        {
            try
            {
                $result =  $this->model
                    ->orWhere('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('description', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('brand', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%')//rus
                        ->orWhere('image', 'LIKE', '%' . $keyword . '%');//eng
                    })
                    ->orWhereHas('element', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%')//rus
                        ->orWhere('image', 'LIKE', '%' . $keyword . '%');//eng
                    });
            }
            catch(Exception $e)
            {
                $this->redirectBack();
            }
            $this->Output($result,$table,$message = 'Result for "'.$keyword.'"');
        }

        $result = $this->SpecificSearch($table,$field,$keyword);
        $this->Output($result,$table,$message = 'Result for "'.$keyword.'"');
    }

    public function SpecificSearch($table,$field,$keyword)
    {
        return $results = $table::where('status','active')
            ->whereHas($table,function($query) use($field,$keyword){
                $query->where($field,'LIKE','%'.$keyword.'%');});
        //            $result = $model::where('active', '1')->where($field, 'LIKE', '%' . $keyword . '%');



//      Paginate(Auth::user()->categories);

//        $posts = DB::table('posts')->select('id', 'title', 'summary', 'created_at', 'category_id', 'title_slug',
//            DB::raw('(match (title,content) against (\''.$keyword.'\' in boolean mode)) as score'))
//            ->whereRaw('match (title,content) against (\''.$keyword.'\' in boolean mode)')
//            ->where('publish','1')->orderBy('score', 'desc')->orderBy('created_at', 'desc');

// $items = Item::whereRaw("MATCH(name,description) AGAINST(? IN BOOLEAN MODE)", [$keyword])->get();
//        $query = isset($data['query']) ? $data['query'] : '';
    }

    public function SortBy()
    {
        $allowed    = ['first_name', 'last_name'];
        $sortBy       = in_array(Request::get('sortBy'), $allowed) ? Request::get('sortBy') : 'name';
        $order      = Input::get('order') ? Input::get('order') : 'ASC';

        switch ($sortBy) {
            case 'has_designer' or 'has_worker':
                $owners = $this->getOwners()->where($sortBy, '1')->paginate(4);
                break;
            case 'step_id':
                $owners = $this->getOwners()->WhereHas('remont',function($query) use($sortBy){$query->WhereIn($sortBy,'>',1);})->paginate(4);
                break;
            default :
                $owners = $this->getOwners()->where($sortBy, '>', '0')->paginate(4);
        }
        $message = 'Result for sort by '.$sortBy;
        $this->indexOwners($owners,$message);
    }

    public function Sort()
    {
        $table = Request::get('table');
        $sortBy = Request::get('sortBy');
        $direction = Request::get('direction');

        if ($sortBy && $direction) {
            switch ($table) {
                case 'Item':
                    $results = $this->getItems()->orderBy($sortBy, $direction)->paginate(8);
                    break;
                default :
                    return false;
            }
            $message = 'Result for sort by '.$sortBy;
            $this->Output($results,$table,$message);
        }
        return Redirect::back();
    }


//public function appendValue($data, $type, $element)
//{
//    // operate on the item passed by reference, adding the element and type
//    foreach ($data as $key => & $item) {
//        $item[$element] = $type;
//    }
//    return $data;
//}


//public function appendURL($data, $prefix)
//{
//    // operate on the item passed by reference, adding the url based on slug
//    foreach ($data as $key => & $item) {
//        $item['url'] = url($prefix.'/'.$item['slug']);
//    }
//    return $data;
//}


//public function index()
//{
//    $query = e(Input::get('q',''));
//
//    if(!$query && $query == '') return Response::json([], 400);
//
//    $products = Product::where('published', true)
//        ->where('name','like','%'.$query.'%')
//        ->orderBy('name','asc')
//        ->take(5)
//        ->get(['slug','name','icon'])->toArray();
//
//    $categories = Category::where('name','like','%'.$query.'%')
//        ->has('products')
//        ->take(5)
//        ->get(['slug', 'name'])
//        ->toArray();
//
//    // Data normalization
//    $categories = $this->appendValue($categories, url('img/icons/category-icon.png'),'icon');
//
//    $products 	= $this->appendURL($products, 'products');
//    $categories   = $this->appendURL($categories, 'categories');
//
//    // Add type of data to each item of each set of results
//    $products = $this->appendValue($products, 'product', 'class');
//    $categories = $this->appendValue($categories, 'category', 'class');
//
//    // Merge all data into one array
//    $data = array_merge($products, $categories);
//
//    return Response::json(['data'=>$data]);
//}
}
