<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $period = $request->input('period', 'mensile');

        $user = Auth::user();
        $restaurantId = $user->restaurant->id;

        $now = Carbon::now();
        $startDate = $period === 'mensile' ? $now->startOfMonth() : $now->startOfYear();
        $endDate = $period === 'mensile' ? $now->endOfMonth() : $now->endOfYear();
        $previousStartDate = $period === 'mensile' ? $startDate->copy()->subMonth() : $startDate->copy()->subYear();
        $previousEndDate = $period === 'mensile' ? $endDate->copy()->subMonth() : $endDate->copy()->subYear();

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

        // Calcolo delle nuove statistiche
        $averageDailyOrders = $this->calculateAverageDailyOrders($startDate, $endDate, $restaurantId);
        $averageOrderValue = $this->calculateAverageOrderValue($startDate, $endDate, $restaurantId);
        $mostPopularDish = $this->getMostPopularDish($startDate, $endDate, $restaurantId);
        $orderGrowth = $this->calculateGrowth('totale_ordini', $startDate, $endDate, $previousStartDate, $previousEndDate, $restaurantId);
        $revenueGrowth = $this->calculateGrowth('totale_incasso', $startDate, $endDate, $previousStartDate, $previousEndDate, $restaurantId);
        $returningCustomersRate = $this->calculateReturningCustomersRate($startDate, $endDate, $restaurantId);

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

        return view('admin.statistics', compact('stats', 'period', 'dishesData', 'hasDishesData', 'averageDailyOrders', 'averageOrderValue', 'mostPopularDish', 'orderGrowth', 'revenueGrowth', 'returningCustomersRate'));
    }

    private function calculateAverageDailyOrders($startDate, $endDate, $restaurantId)
    {
        $totalOrders = Order::where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        $days = $startDate->diffInDays($endDate) + 1;
        return $totalOrders / $days;
    }

    private function calculateAverageOrderValue($startDate, $endDate, $restaurantId)
    {
        $result = Order::where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('AVG(total) as average_value')
            ->first();
        return $result ? $result->average_value : 0;
    }

    private function getMostPopularDish($startDate, $endDate, $restaurantId)
    {
        return DB::table('dishes_orders')
            ->join('dishes', 'dishes_orders.dish_id', '=', 'dishes.id')
            ->join('orders', 'dishes_orders.order_id', '=', 'orders.id')
            ->where('dishes.restaurant_id', $restaurantId)
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->select('dishes.name', DB::raw('SUM(dishes_orders.quantity) as total_ordered'))
            ->groupBy('dishes.id', 'dishes.name')
            ->orderByDesc('total_ordered')
            ->first();
    }

    private function calculateGrowth($metric, $startDate, $endDate, $previousStartDate, $previousEndDate, $restaurantId)
    {
        $currentPeriod = Order::where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum($metric === 'totale_ordini' ? DB::raw('1') : 'total');

        $previousPeriod = Order::where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$previousStartDate, $previousEndDate])
            ->sum($metric === 'totale_ordini' ? DB::raw('1') : 'total');

        if ($previousPeriod == 0) {
            return $currentPeriod > 0 ? 100 : 0;
        }

        return (($currentPeriod - $previousPeriod) / $previousPeriod) * 100;
    }

    private function calculateReturningCustomersRate($startDate, $endDate, $restaurantId)
    {
        $totalCustomers = Order::where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->distinct('customer_email')  // Assumendo che 'customer_email' sia il campo che identifica univocamente i clienti
            ->count();

        $returningCustomers = DB::table('orders')
            ->select('customer_email', DB::raw('COUNT(*) as order_count'))
            ->where('restaurant_id', $restaurantId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('customer_email')
            ->havingRaw('COUNT(*) > 1')
            ->count();

        return $totalCustomers > 0 ? ($returningCustomers / $totalCustomers) * 100 : 0;
    }
}
