<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $period = $request->input('period', 'mensile');

        $user = Auth::user();

        $restaurantId = $user->restaurant->id;

        if ($period === 'mensile') {
            $stats = Order::select(
                DB::raw('MONTH(created_at) as mese'),
                DB::raw('COUNT(*) as totale_ordini'),
                DB::raw('SUM(total) as totale_incasso')
            )
                ->whereYear('created_at', date('Y'))
                ->groupBy('mese')
                ->orderBy('mese')
                ->get();
        } else {
            $stats = Order::select(
                DB::raw('YEAR(created_at) as anno'),
                DB::raw('COUNT(*) as totale_ordini'),
                DB::raw('SUM(total) as totale_incasso')
            )
                ->groupBy('anno')
                ->orderBy('anno')
                ->get();
        }


        try {
            $dishes = DB::table('dishes_orders')
                ->join('dishes', 'dishes_orders.dish_id', '=', 'dishes.id')
                ->join('orders', 'dishes_orders.order_id', '=', 'orders.id')
                ->where('dishes.restaurant_id', $restaurantId)
                ->select('dishes.name', DB::raw('SUM(dishes_orders.quantity) as total_ordered'))
                ->groupBy('dishes.id', 'dishes.name')
                ->orderByDesc('total_ordered')
                ->limit(10)
                ->get();

            Log::info('Query SQL:', ['sql' => DB::getQueryLog()]);
            Log::info('Raw dishes data:', ['dishes' => $dishes->toArray()]);

            $dishesData = [];
            $hasDishesData = false;

            if ($dishes->isNotEmpty()) {
                $totalOrdered = $dishes->sum('total_ordered');
                $dishesData = $dishes->map(function ($item) use ($totalOrdered) {
                    return [
                        'name' => $item->name,
                        'percentage' => round(($item->total_ordered / $totalOrdered) * 100, 2)
                    ];
                })->toArray();
                $hasDishesData = true;
            }

            Log::info('Processed dishes data:', ['dishesData' => $dishesData, 'hasDishesData' => $hasDishesData]);
        } catch (\Exception $e) {
            Log::error('Error executing the query:', ['error' => $e->getMessage()]);
            $dishesData = [];
            $hasDishesData = false;
        }

        return view('admin.statistics', compact('stats', 'period', 'dishesData', 'hasDishesData'));
    }
}
