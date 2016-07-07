filter

    addModel + $this->currentUser,'orders',
    profile with filter!



Check auth If false take just first five users! 
Owner index filter by address

2)Метод filter
     - сортирует  
    По цене
    По имени
    По дате
    - фильтрует
    По ключевому слову или паре слов
    По категориям
    По типу 
    По полю в таблице
    - Использует пагинацию
    - использует Кеш для всех методов 
    - запоминает популярные поисковые запросы 
    Юзер может использовать все сразу и фильтры и сортировку

    
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
          }



          

public function index(Request $request)
{
    if (config('cache.cache_results')) {
        $data = Cache::tags(['data'])->remember("data.index", 60, function() use ($memberId, $this->model){
            return $this->model->paginate();
        });
    } else {
        $data = $this->model->paginate();
    }

    $transformedData = $this->fractal->paginatedCollection($data, new ContributionTransformer());
    return $this->sendResponse($transformedData['data'], $transformedData['meta']);
}
===================
sorting by ajax!!!
$request->session()->put('data', $data);
===================
paginate

public function index()
{
    $result = (new App\Employers)->where('required_to_report', true)->paginate($this->perPage);
    $result = Model::get()->filter(function($item) {return $item->require_to_report === true; });

    $paginator = new Illuminate\Pagination\Paginator($result, 10);
}





$users = User::where(function ($q) use ($query) {
    $q->where(DB::raw('CONCAT( firstname, " ", lastname)'), 'like', '%' . $query . '%')
    ->orWhere(DB::raw('CONCAT( lastname, " ", firstname)'), 'like', '%' . $query . '%')
    ->orWhere('email', 'like', '%' . $query . '%')
});


$entry = Entry::with([
    'elements',
    'competition.groups.fields',
    'competition.groups.reviews' => function($q){
        $q->where('user_id', Auth::id()); 
    }
])->find($id);










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