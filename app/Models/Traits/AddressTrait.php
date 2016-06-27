<?php namespace App\Models\Traits;

use App\Models\_partials\Address;

trait AddressTrait
{
/**
 *
 *  Activate user by code
 *
 */
	public function assignAddress($data)
	  {
        logger()->info(__METHOD__);
	    $street = $data['street'];
	    $house  = $data['house'];
	    $corpus = $data['corpus'];

	    if(!$address = Address::whereStreet($street)->whereHouse($house)->whereCorpus($corpus)->first())
	      {
	        $address = $this->createAddress($street,$house,$corpus);
	      }
  			$address->increment('user_count');

	    return $this->addresses()->attach($address);
	  }
/**
 *
 *  Activate user by code
 *
 */ 
	public function createAddress($data = null)
	  {
        logger()->info(__METHOD__);
	  	if(!$data){
	  		throw new Exception();
	  	}
	  	//get address
	  	//ask google api geo location
	  	//record just GEO
	  		return Address::create([
	        'street' => $data['street'],
	        'house'  => $data['house'],
	        'corpus' => $data['corpus'],
	        ]);
	  }
}