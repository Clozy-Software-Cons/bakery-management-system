<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductOrderController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = array();
        $product_orders = array();

        if ($request->isMethod('post')) {
            session(['product_order' => [
                'status' => $request->input('status')
            ]]);
        }

        $search = session('product_order') ?? $search;
        $product_orders = ProductOrder::get_records($search);

        return view('product_orders.index', [
            'status' => ['pending' => 'Pending', 'ready' => 'Ready', 'delivery' => 'Delivery'],
            'search' => $search,
            'product_orders' => $product_orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPage(Request $request)
    {
        return view('product_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrder(Request $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'cust_name' => ['required', 'max:255'],
            'cust_hpn' => ['required', 'max:255'],
            'type' => ['required', 'max:255'],
            'quantity' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
            'flavour' => ['required', 'max:255'],
            'filling' => ['required', 'max:255'],
            'shape' => ['required', 'max:255'],
            'size' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d{0,8}(\.\d{1,2})?$/'],
            'order_datetime' => ['required'],
            'dispatch_datetime' => ['required'],
            'dispatch_place' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
        ]);

        ProductOrder::create($validated);

        return redirect()->back()->withSuccess('New order created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_order = ProductOrder::find($id);
        if (!$product_order) {
            Session::flash('error', 'Invalid Order');
            return redirect()->route('product_orders.index');
        }

        return view('product_orders.show', [
            'order' => $product_order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOrder $productOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOrder $productOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOrder  $productOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $productOrder)
    {
        //
    }
}
