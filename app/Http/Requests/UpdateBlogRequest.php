<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{ public function rules(): array
{
    return [
        'category_id'=>'sometimes | required | integer',
        'user_id'=>'sometimes | nullable | integer',
        'title'=>'sometimes | required | string',
        'description'=>'sometimes | required | string',
        'release_date'=>'sometimes | nullable | date',
    ];
}
    public function messages()
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }
}