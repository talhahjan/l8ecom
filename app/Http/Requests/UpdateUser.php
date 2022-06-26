<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'first_name' => 'required', 'string', 'max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->email, 'email'),
            ],


            'slug' => [
                'required',
                Rule::unique('profiles')->ignore($request->slug, 'slug'),
            ],

            'phone' => 'required|numeric',
            'status' => 'required|numeric|max:1',
            'role' => 'required|numeric|',
        ];

        if (isset($request->avatar)) {
            $rules = Arr::add($rules, 'avatar', 'mimes:jpg,png,jpeg');
        }

        if (isset($request->password)) {
            $rules = Arr::add($rules, 'password', 'required|min:8|confirmed');
        }

        //       dd($rules);
        return $rules;
    }
}
