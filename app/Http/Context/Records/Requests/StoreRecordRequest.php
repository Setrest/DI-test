<?php

namespace App\Http\Context\Records\Requests;

use App\Domain\Records\Enums\SaveTo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRecordRequest extends FormRequest 
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:1',
            'second_name' => 'required|string|min:1',
            'patronymic' => 'required|string|min:1',
            'phone' => 'required|regex:/^(\+7)[0-9]{10}$/',
            'email' => 'required|email',
        ];
    }    
}