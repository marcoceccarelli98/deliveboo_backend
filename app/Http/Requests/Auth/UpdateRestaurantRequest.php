<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
        $restaurantId = auth()->user()->restaurant->id;
        return [
            'companyName' => [
                'required',
                'max:20',
                Rule::unique('restaurants')->ignore($restaurantId),
            ],
            'city' => ['required', 'max:30'],
            'address' => ['required', 'max:30'],
            'pIva' => [
                'required',
                'size:11',
                Rule::unique('restaurants')->ignore($restaurantId),
            ],
            'types' => ['required', 'array', 'min:1'],
            'types.*' => ['exists:types,id'],
            'image' => ['nullable', 'image', 'max:2048'], // Aggiungi la validazione per l'immagine
        ];
    }

    public function messages()
    {
        return [
            'companyName.unique' => 'Il nome del ristorante è già stato registrato. Per favore, scegline un altro.',
            'pIva.unique' => 'Questa Partita IVA è già stata registrata.',
            'types.required' => 'Seleziona almeno un tipo di cucina.',
        ];
    }
}
