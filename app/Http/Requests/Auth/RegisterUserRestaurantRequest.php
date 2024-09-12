<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class RegisterUserRestaurantRequest extends FormRequest
{
    public function rules()
    {
        return [
            // Validazione dati utente
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // Validazione dati ristorante
            'companyName' => [
                'required',
                'string',
                'max:20',
                Rule::unique('restaurants', 'companyName'),
            ],
            'city' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:30'],
            'pIva' => [
                'required',
                'string',
                'size:11',
                'regex:/^[0-9]{11}$/',
                Rule::unique('restaurants', 'pIva'),
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
            ],
            'types' => [
                'required',
                'array',
                'min:1',
            ],
            'types.*' => [
                'integer',
                Rule::exists('types', 'id'),
            ],
        ];
    }

    public function messages()
    {
        return [
            'companyName.unique' => 'Questo nome di ristorante è già stato registrato.',
            'pIva.unique' => 'Questa Partita IVA è già stata registrata.',
            'pIva.regex' => 'La Partita IVA deve contenere 11 cifre numeriche.',
            'types.required' => 'Seleziona almeno un tipo di cucina.',
            'types.min' => 'Seleziona almeno un tipo di cucina.',
            // Aggiungi qui altri messaggi personalizzati se necessario
        ];
    }
}
