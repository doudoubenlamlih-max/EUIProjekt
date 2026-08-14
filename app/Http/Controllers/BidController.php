<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
        ]);

        if ($validated['amount'] <= $product->current_price) {
            return back()
                ->withErrors([
                    'amount' => 'Das Gebot muss höher als das aktuelle Gebot sein.'
                ])
                ->withInput();
        }

        Bid::create([
            'user_id' => 1,
            'product_id' => $product->id,
            'amount' => $validated['amount'],
            'is_winning' => true,
        ]);

        $product->update([
            'current_price' => $validated['amount'],
        ]);

        return redirect()
            ->route('products.show', $product->id)
            ->with('success', 'Gebot wurde erfolgreich abgegeben.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}