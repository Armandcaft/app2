<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|max:255|unique:posts,title,'.$this->id,
            'excerpt' => 'required',
            'body' => 'required',
            'image_path' => ['mimes:jpg,png,jpeg', 'max:5048', ],
            // 'is_published' => '',
            'min_to_read' => 'min:0|max:10',
        ];

        if (in_array($this->method(), ['POST', /*'PUT'*/])) {
            if(($rules['image_path']) != null)
            // dd('eee');
                $rules['image_path'] = ['nullable', 'mimes:jpg,png,jpeg', 'max:5048'];
        }

        return $rules;
    }
}
