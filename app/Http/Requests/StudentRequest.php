<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            'birthday' => 'required|date_format:Y-m-d|before:today|nullable',
            'phone_number' => [
                'required',
                'numeric',
                'digits:10',
                Rule::unique('students')->ignore($this->id)
            ],
            'address' => 'required|max:255',
            'gender'=> 'required|between:0,1',
            'faculty_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
