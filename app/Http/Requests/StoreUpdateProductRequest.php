<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(3);
        $rules = [
            'title' => 'required|min:3|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1200,height=300|max:2048',
            'price' => 'required',
            'description' => 'nullable|min:3|max:10000',
        ];

        if($this->method() == 'PUT')
        {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1200,height=300|max:2048';
        }
    }
}
