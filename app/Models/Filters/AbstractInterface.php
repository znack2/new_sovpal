<?php namespace App\Models\Filters;

interface AbstractInterface
{
	public function Filter($request);

    // public function getCertainFilter($table,$filter,$field,$field_id);
    // public function Search();
    // public function SpecificSearch($table,$field,$keyword);
    // public function SortBy();
    // public function Sort();



	public function getPrivate($type,$data);
	public function getPopular($order);
	public function getRecent($order);
	public function take($count);
	public function getSortBy($sort,$order);
	public function getlimitBy($field);
	public function getExpire($date);
	
	public function ByKeyword($type,$field,$keyword);
	public function ById($id);
    public function ByType($type);
    public function ByElement($type,$name);
	public function ByTag($type,$tag);
	public function getByAddress($address, $data);
}

// best this week
// best all time
	

