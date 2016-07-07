<?php namespace App\Models\Traits;

trait FilterTrait
{
    public static function filter(Request $request)
        {
          //call __construct
          //apply filters
            return (new self($request, User::query())
                    ->applyFilters()
                    ->getResults();

        //->except($user->id)  // ->appends(['search' => $search]);
        }


    private function applyFilters()
        {
            $this->filters->each(function ($value, $name) {
                $this->getFilterFor($name)->filter($this->query, $value);
            });
            return $this;
        }


    private function getResults(Builder $query)
        {
            $result = Cache::remember(array_keys($this->request), 10080, function(){
                $query->count() > 1 ? $query->paginate(15) : $query->get();
            }

        if(!$result->first()) { 
            return back()
              ->withInput()
              ->with('status', 'Could not find anything try again!');
           }
            return $result;
        }



    private function getFilterFor($name)
        {
            return $this->filters->map(function ($value, $name) {
                return $this->createFilterDecorator($name);

            })->filter(function ($filterClassName) {
                return class_exists($filterClassName);

            })->map(function ($filterClassName) {
                return new $filterClassName;

            })->get($name, new NullFilter); 
        }


    private function createFilterDecorator($name)
        {
            return return __NAMESPACE__ . 
                str_replace(' ', '', 
                    ucwords(str_replace('_', ' ', $name)));
        } 
}