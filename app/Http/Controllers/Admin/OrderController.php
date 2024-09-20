<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
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

    public function show(Order $order): JsonResponse
    {
        $order->load('dishes');
        return response()->json($order);
    }

    // public function update(Request $request, Order $order): JsonResponse
    // {
    // $validatedData = $request->validate([
    //     'status_order' => 'sometimes|string|max:20',
    //     'status_payment' => 'sometimes|string|max:20',
    //     'customer_name' => 'sometimes|string|max:30',
    //     'customer_email' => 'sometimes|email|max:50',
    //     'customer_address' => 'sometimes|string|max:30',
    //     'total' => 'sometimes|numeric',
    //     'dishes' => 'sometimes|array',
    //     'dishes.*.id' => 'required_with:dishes|exists:dishes,id',
    //     'dishes.*.quantity' => 'required_with:dishes|integer|min:1'
    // ]);

    // try {
    //     DB::beginTransaction();

    //     $order->update($validatedData);

    //     if (isset($validatedData['dishes'])) {
    //         $order->dishes()->detach();
    //         foreach ($validatedData['dishes'] as $dish) {
    //             $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
    //         }
    //     }

    //     DB::commit();

    //     $order->load('dishes');
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Ordine aggiornato con successo',
    //         'order' => $order
    //     ]);
    // } catch (\Exception $e) {
    //     DB::rollBack();
    //     return response()->json([
    //         'success' => false,
    //         'message' => 'Si è verificato un errore durante l\'aggiornamento dell\'ordine',
    //         'error' => $e->getMessage()
    //     ], 500);
    // }
    // }

    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->dishes()->detach();
            $order->delete();

            return response()->json([
                'success' => true,
                'message' => 'Ordine eliminato con successo'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Si è verificato un errore durante l\'eliminazione dell\'ordine',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
