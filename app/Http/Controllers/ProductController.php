<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    $categories = Category::all();

    return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'current_price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
    ]);

    Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'current_price' => $request->current_price,
        'category_id' => $request->category_id,
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produkt wurde erfolgreich erstellt.');
}

    /**
     * Display the specified resource.
     */
  public function show(string $id)
{
    $product = Product::findOrFail($id);

    return view('products.show', compact('product'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
