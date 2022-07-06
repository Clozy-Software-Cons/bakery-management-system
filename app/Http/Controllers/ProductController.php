<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function indexPage()
    {
        $products = Product::latest()->get();

        return view('products.index', compact(['products']));
    }

    public function createPage()
    {
        return view('products.create');
    }

    public function editPage($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact(['product']));
    }

    public function editStockPage($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit-stock', compact(['product']));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
            'quantity' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
            'measure_unit' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'warn_threshold' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
        ]);

        Product::create($validated);

        return redirect()->back()->withSuccess('New product created.');
    }

    public function updateProduct(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'name' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
            'measure_unit' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'warn_threshold' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
        ]);

        $id = $validated['id'];
        unset($validated['id']);

        Product::findOrFail($id)->update($validated);
        return redirect()->route('products.page.index')->withSuccess($validated['name'] . ' updated successfully.');
    }

    public function updateProductStock(Request $request)
    {
        //  stock_action (1 = inbound, 2 = outbound)
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
            'stock_action' => ['required', Rule::in(['1', '2'])],
            'quantity' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
        ]);

        $id = $validated['id'];
        $quantity = $validated['quantity'];
        $action = $validated['stock_action'];

        $selectedProduct = Product::findOrFail($id)->toArray();
        $stockQuantity = $selectedProduct['quantity'];

        if ($action == '2' && $quantity > $stockQuantity) {
            return redirect()->back()->withErrors([
                'quantity' => 'Quantity value cannot greater than the stock quantity.',
            ])->withInput();
        }

        switch ($validated['stock_action']) {
            case '1':
                $quantity += $stockQuantity;
                break;

            case '2':
                $quantity = $stockQuantity - $quantity;
                break;
        }

        Product::find($id)->update(['quantity' => $quantity]);

        return redirect()->route('products.page.index')->withSuccess($selectedProduct['name'] . ' stock updated from ' . $selectedProduct['quantity'] . ' ' . $selectedProduct['measure_unit'] . ' to ' . number_format($quantity, 2) . $selectedProduct['measure_unit'] . '.');
    }

    public function deleteProduct(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'numeric'],
        ]);

        Product::findOrFail($validated['id'])->delete();
        return redirect()->route('products.page.index')->withSuccess('Product deleted successfully.');
    }
}
