<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addTeacherRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'job' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ];
    }
}
