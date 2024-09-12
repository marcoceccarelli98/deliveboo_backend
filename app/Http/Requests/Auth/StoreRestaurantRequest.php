<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'companyName' => ['required', 'max:20', 'unique:restaurants,companyName'],
            'address' => ['required', 'max:30'],
            'pIva' => ['required', 'size:11', 'unique:restaurants,pIva'],
            'types' => ['required', 'array', 'min:1'],
            'types.*' => ['exists:types,id'],
        ];
    }
}
