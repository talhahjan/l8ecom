<?php

namespace App\Http\Requests;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreProduct extends FormRequest
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
    public function rules(Request $request)
    {


        $rules = [
            'title'=>'required|string',
            'slug' => 'required|unique:products,slug,',
            'description'=>'required',
            'status' => 'required|numeric',
            'category_id' => 'required',
            'price' => 'required|numeric'
        ];
        return $rules;
        
    }
}
