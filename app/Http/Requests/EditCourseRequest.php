<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseRequest extends FormRequest
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
            'image' => 'nullable|image'
        ];
    }
}
