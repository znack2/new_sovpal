<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndexRequest extends Request {

    public function rules()
    {
        return [
            'keyword' => 'required|min:3',
        ];
    }

}
