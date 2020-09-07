<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed birthday
 */
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
                'required',
                'date',
                'before:' . Carbon::now()->subYears(18)
            ]
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'birthday' => Carbon::parse($this->birthday)
        ]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'birthday.before' => 'You must be 18 years old or above'
        ];
    }
}
