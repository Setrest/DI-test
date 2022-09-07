<?php

namespace App\Http\Context\Authenticate\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthByEmailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
}
