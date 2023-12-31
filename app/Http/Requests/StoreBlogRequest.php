<?php

namespace App\Http\Requests;


class StoreBlogRequest extends MainRequest
{
    public function rules(): array
    {
        return [
            'category_id'=>'required | integer',
            'user_id'=>'nullable | integer',
            'title'=>'required | string',
            'img'=>'required | string',
            'description'=>'required | string',
            'release_date'=>'nullable | date',
        ];
    }
    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}
