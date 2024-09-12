<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterUserRestaurantRequest;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(RegisterUserRestaurantRequest $request): RedirectResponse
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $request) {
            // Creo il nuovo utente
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            if ($user) {
                // Se un'immagine è stata caricata
                $imagePath = $request->hasFile('image')
                    ? $request->file('image')->store('restaurants', 'public')
                    : null;

                $restaurant = $user->restaurant()->create([
                    'user_id' => $user->id,
                    'companyName' => $data['companyName'],
                    'city' => $data['city'],
                    'address' => $data['address'],
                    'pIva' => $data['pIva'],
                    'slug' => Str::slug($data['companyName'], '-'),
                    'path_img' => $imagePath,
                ]);

                // Gestisci l'associazione dei types
                if (isset($data['types']) && !empty($data['types'])) {
                    $restaurant->types()->sync($data['types']);
                }
            } else {
                // Log l'errore o mostra un messaggio per il debug
                //Log::error('Utente non creato correttamente');
                throw new \Exception('Utente non creato correttamente');
            }

            event(new Registered($user));

            Auth::login($user);
        });

        return redirect(RouteServiceProvider::HOME);
    }
}
