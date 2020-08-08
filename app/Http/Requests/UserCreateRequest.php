<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'login' => [
                'required',
                'min:5',
                'max:100',
            ],
            'password' => [
                'required',
                'min:6',
                'max:100',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            ],
            'email' => [
                'required',
                'email',
                'regex:/^\S+@\S+\.\S+$/'
            ],
            'phone' => [
                'required',
                'digits_between:8,12',
                'numeric'
            ],
            'first_name' => [
                'required',
                'string'
            ],
            'last_name' => [
                'required',
                'string'
            ],
            'birthday' => [
                'nullable',
                'date',
                'before:' . Carbon::now()->subYears(18)->format('d/m/Y')
            ]
        ];
    }
}
