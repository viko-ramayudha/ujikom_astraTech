<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response{

        $products = Product::all();
        // Variabel $products kemudian kita passing sebagai parameter ketika render view
        return response(view('products.index', ['products' => $products]));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        // Variabel $products kemudian kita passing sebagai parameter ketika render view
        return response(view('products.create'));
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       // Custom validation messages (optional, for more informative error messages)
    $messages = [
        'price.numeric' => 'Price produk harus berupa angka.',
        'stock.integer' => 'Stock produk harus berupa angka bulat (tanpa koma atau desimal).',
    ];

    // Validation rules with clear explanations
    $validatedData = $request->validate([
        'kode' => 'required|string|max:10|unique:products',
        'name' => 'required|string|regex:/^[a-zA-Z\s]+$/u|max:255',
        'price' => [
            'required',
            'numeric', 
            'min:0',   
        ],
        'stock' => [
            'required',
            'integer', 
            'min:0',   
        ],
    ], $messages);

    if (Product::create($validatedData)) {
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    return redirect()->route('products.index')->with('error', 'Gagal menambahkan produk!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        dd('halaman show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return response(view('products.edit', ['product' => $product]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Custom validation messages (optional, for more informative error messages)
        $messages = [
            'price.numeric' => 'Price produk harus berupa angka.',
            'stock.integer' => 'Stok produk harus berupa angka bulat (tanpa koma atau desimal).',
        ];

        // Validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/u|max:255', 
            'price' => [
                'required',
                'numeric', 
                'min:0',   
            ],
            'stock' => [
                'required',
                'integer',
                'min:0',   
            ],
        ], $messages); 

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect(route('products.index'))->with('success', 'Produk berhasil diperbaruhi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect(route('products.index'))->with('success', 'Produk berhasil dihapus!');
        }

        return redirect(route('products.index'))->with('error', 'Maaf, gagal menghapus data!');
    }
}
