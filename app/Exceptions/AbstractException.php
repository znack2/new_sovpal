<?php namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractException extends Exception
	{
	    protected $id;
	    protected $status = '404';
	    protected $title;
	    protected $details;
        protected $model;
    	protected $messages;
	 
	    public function __construct($message)
	    {
	    	$message = $this->create(func_get_args())
	        parent::__construct($message);
	    }

     //    public function __construct(MessageBag $errors)
	    // {
	    //     $this->errors = $errors;
	    //     parent::__construct('Validation has failed.');
	    // }


	    public function getStatus()
	    {
	        return (int) $this->status;
	    }

	    public function toArray()
	    {
	        return [
	            'id'     => $this->id,
	            'status' => $this->status,
	            'title'  => $this->title,
	            'details' => $this->details,
	        ];
	    }

	    protected function create(array $args)
	    {
	        $this->id = array_shift($args);
	        $error = config(sprintf('errors.%s', $this->id));
	        $this->title  = $error['title'];
	        $this->detail = vsprintf($error['details'], $args);
	        return $this->details;
	    }

	    public function __toString()
	    {
	        $lines = explode("\n", parent::__toString());

	        return array_shift($lines)." \nValidation errors:\n".implode($this->errors->all(), "\n")."\n".implode($lines, "\n");
	    }
	    
	    public function toJson($options = 0)
	    {
	        return json_encode($this->toArray(), $options);
	    }
}