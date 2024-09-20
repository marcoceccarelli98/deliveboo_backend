<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;


class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Log::info('Inizio processPayment');

        // Validazione dei dati in entrata
        try {
            $validatedData = $request->validate([
                'paymentMethodNonce' => 'required|string',
                'name' => 'required|string',
                'email' => 'required|email',
                'address' => 'required|string',
                'cart' => 'required|array',
                // Aggiungi qui altri campi necessari
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Errore di validazione: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Errore di validazione: ' . $e->getMessage()], 422);
        }

        DB::beginTransaction();

        try {
            Log::info('Creazione nuovo ordine');
            // Creazione di un nuovo ordine
            $order = new Order();

            $cart = $validatedData['cart'];

            $order->restaurant_id = $cart['restaurantId'];
            $order->total = $this->calculateTotalAmount($cart['items']);  // Corretto: usa $this->

            $order->customer_name = $validatedData['name'];
            $order->customer_email = $validatedData['email'];
            $order->customer_address = $validatedData['address'];
            // Aggiungi qui altri campi dell'ordine se necessario
            $order->save();

            Log::info('Ordine salvato, ora associo i piatti');

            // Prepara i dati per la relazione molti a molti
            $orderDishes = [];
            foreach ($cart['items'] as $item) {
                $orderDishes[$item['id']] = ['quantity' => $item['quantity']];
            }

            // Associa i piatti all'ordine usando la relazione molti a molti
            $order->dishes()->attach($orderDishes);

            DB::commit();

            Log::info('Ordine creato con successo. ID: ' . $order->id);

            // Invia l'email di conferma
            Mail::to($validatedData['email'])->queue(new OrderConfirmation($order));

            return response()->json([
                'success' => true,
                'message' => 'Pagamento simulato effettuato con successo',
                'order_id' => $order->id
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Errore durante il processamento del pagamento: ' . $e->getMessage());
            // Gestione degli errori
            return response()->json([
                'success' => false,
                'message' => 'Si è verificato un errore: ' . $e->getMessage()
            ], 500);
        }
    }

    private function calculateTotalAmount($items)
    {
        return array_reduce($items, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
