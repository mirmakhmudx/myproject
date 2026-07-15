<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCoursePost extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ];
    }
}
