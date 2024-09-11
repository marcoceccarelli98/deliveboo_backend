<?php

namespace App\Http\Controllers\Auth;

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
    public function store(Request $request): RedirectResponse
    {

        $data =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'companyName' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:30'],
            'pIva' => ['required', 'digits:11'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validazione dell'immagine
            'types' => 'nullable|exists:types,id',
        ]);



        DB::transaction(function () use ($request) {
            // Creo il nuovo utente
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            if ($user) {

                // Se un'immagine è stata caricata
                $imagePath = $request->hasFile('image')
                    ? $request->file('image')->store('restaurants', 'public')
                    : null;

                $user->restaurant()->create([
                    'user_id' => $user->id,
                    'companyName' => $request->companyName,
                    'city' => $request->city,
                    'address' => $request->address,
                    'pIva' => $request->pIva,
                    'slug' => Str::slug($request->companyName, '-'),
                    'path_img' => $imagePath, // Salviamo il percorso dell'immagine
                ]);

                if (isset($data['types'])) {
                    $user->restaurant()->types()->attach($data['types']);
                }
            } else {
                // Log l'errore o mostra un messaggio per il debug
                dd('Utente non creato correttamente');
            }

            event(new Registered($user));
            // event(new Registered($restaurant));

            Auth::login($user);
        });

        return redirect(RouteServiceProvider::HOME);
    }
}
