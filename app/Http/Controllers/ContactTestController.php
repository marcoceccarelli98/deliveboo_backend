<?php

namespace App\Http\Controllers;

use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactTestController extends Controller
{
    public function testNewContact()
    {
        // Crea un'istanza di NewContact senza passare argomenti
        $newContact = new NewContact();

        // Invia l'email
        Mail::to('test@example.com')->send($newContact);

        // Accedi ai dati provvisori per il debug
        $leadData = $newContact->lead;

        // Restituisci una risposta
        return response()->json([
            'message' => 'Email di test inviata con successo',
            'lead_data' => $leadData
        ]);
    }
}
