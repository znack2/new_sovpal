<?php namespace App\Validator;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider;
use RuntimeException;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;
use Exceptions\AbstractException;

class ValidationException extends RuntimeException implements MessageProvider , Jsonable, Arrayable
{

}
