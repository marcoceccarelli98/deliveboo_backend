<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'status_order' => 'required|string|max:20',
            'status_payment' => 'required|string|max:20',
            'customer_name' => 'required|string|max:30',
            'customer_email' => 'required|email|max:50',
            'customer_address' => 'required|string|max:30',
            'total' => 'required|numeric',
            'dishes' => 'required|array',
            'dishes.*.id' => 'required|exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1'
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create($validatedData);

            foreach ($validatedData['dishes'] as $dish) {
                $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Ordine creato con successo',
                'order_id' => $order->id
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Si è verificato un errore durante la creazione dell\'ordine',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        // Assumiamo che l'utente autenticato abbia una relazione con il ristorante
        $restaurant = auth()->user()->restaurant;

        if (!$restaurant) {
            // Gestisci il caso in cui l'utente non sia associato a un ristorante
            return redirect()->route('home')->with('error', 'Non sei associato a nessun ristorante.');
        }

        $orders = Order::with('dishes')
            ->whereHas('dishes', function ($query) use ($restaurant) {
                $query->where('restaurant_id', $restaurant->id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order): JsonResponse
    {
        $order->load('dishes');
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        try {
            $order->dishes()->detach();
            $order->delete();

            return redirect()->route('admin.orders.index')->with('message', 'ordine eliminato correttamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.orders.index')->with('message', 'Errore durante la cancellazione dell\'ordine' + $e);
        }
    }
}
