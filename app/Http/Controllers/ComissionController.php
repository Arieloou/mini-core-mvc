<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Http\Request;

class ComissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers = Seller::all();
        $rules = Rule::orderBy('threshold_amount')->get();

        return view('index', compact(
            'sellers',
            'rules'
        ));
    }

    /**
     * Processes the date filter, calculates commissions
     * and redisplays everything (including rules).
     */
    public function calculate(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
        ]);

        // Sales in the range
        $sales = Sale::with('seller')
        ->whereBetween('date', [
            $data['start_date'],
            $data['end_date'],
        ])->get();

        // Comission Calculate 
        $results = [];

        foreach ($sales as $sale) {

            $name = $sale->seller->name;
            $rule = Rule::where('threshold_amount', '<=', $sale->amount)
            ->orderByDesc('threshold_amount')
            ->first();

            $percentage = $rule?->percentage ?? 0;
            $comission   = $sale->amount * $percentage;

            $results[$name] = ($results[$name] ?? 0) + $comission;
        }

        // Data for the view
        $sellers = seller::select('name', 'email')->get();
        $rules = rule::orderBy('threshold_amount')->get();

        return view('index', [
            'sellers'   => $sellers,
            'rules'       => $rules,
            'results'   => $results,
            'start_date' => $data['start_date'],
            'end_date'    => $data['end_date'],
        ]);
    }
}
