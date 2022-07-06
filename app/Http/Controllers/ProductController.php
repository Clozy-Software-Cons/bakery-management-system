<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexPage()
    {
        return view('products.index');
    }

    public function createPage()
    {
        return view('products.create');
    }

    public function editPage()
    {

    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d{0,8}?.\d{1,2}$/'],
            'quantity' => ['required', 'regex:/^\d{0,8}?.\d{1,2}$/'],
            'measure_unit' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'warn_threshold' => ['required', 'regex:/^\d{0,8}?.\d{1,2}$/'],
        ]);
        // dd($validated);

        Product::create($validated);

        return redirect()->back()->withSuccess('New product created.');
    }

    public function updateProduct()
    {

    }

    public function deleteProduct()
    {

    }
}
