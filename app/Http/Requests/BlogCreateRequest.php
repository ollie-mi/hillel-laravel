<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Http\Rules\UpperCaseRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'bail',
                'required',
                'min:3',
                'max:10',
                new UpperCaseRule,
            ],
            'email' => [
                'required',
                'email',
            ],
        ];
    }
}
