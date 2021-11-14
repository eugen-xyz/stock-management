<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\Order;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Cart',
            'description' => 'review your cart before your checkout'
        ];

        $products = [];
        $itemCount = 0;

        if(session('customerID') !== null) {
            $products = OrderItem::where('reference', session('customerID'))->get();
            $itemCount = OrderItem::where('reference', session('customerID'))->sum('quantity');
        }

        return view('shop.cart', compact('data', 'products', 'itemCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Validate for quantity */
        $product = Product::where('product_id', $request->product_id)->first();

        $qty = $request->input('quantity');

        $updatedQty = $product->quantity - $qty;

        if(is_null($qty)) {
            session()->flash('message', 'Please add quantity'); 
            return redirect()->route('get.shop');
        }

        if($qty == 0) {
            session()->flash('message', 'Quantity must not be 0'); 
            return redirect()->route('get.shop');
        }

        if($updatedQty < 0) {
            session()->flash('message', 'Not Enough Stock'); 
            return redirect()->route('get.shop');
        } 

        /** Save Order Items */
        $order = new OrderItem();
            
        $order->product_name = $product->name;
        $order->unit_price = $product->price;
        $order->reference = session('customerID');
        $order->quantity = $qty;
        $order->sub_total = $qty * $product->price;

        $order->save();

        /** Update product quantity */
        $product->quantity = $updatedQty;
        $product->save();
    

        session()->flash('message', 'Item successfully added!'); 

        return redirect()->route('get.shop');
    }

    public function pay()
    {
        if(session('customerID') === null) return redirect()->route('get.shop');
        
        $sub_total = OrderItem::where('reference', session('customerID'))->sum('sub_total');

        $order = new Order();

        $order->reference = session('customerID');
        $order->total_price = $sub_total;

        $order->save();

        session()->flush();


        $data = [
            'title' => 'Order Paid',
            'description' => 'thank you for shopping'
        ];

        return view('shop.paid', compact('data'));

    }

    public function clear()
    {
        session()->flush();
        
        return redirect()->route('get.shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
