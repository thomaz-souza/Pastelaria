<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Order::create($request->all()))
            return response()->json([
                'message' => 'Order created with success!'
            ], 201);

        return response()->json([
            'message' => 'Error when creating order'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Order)
    {
        if (!Order::find($Order))
            return response()->json([
                'message' => 'The order was not found'
            ], 404);;

        return Order::find($Order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Order)
    {
        $OrderResult = Order::findOrFail($Order)->update($request->all());

        if (!$OrderResult)
            return response()->json([
                'message' => 'Error in update the order'
            ], 404);

        return $OrderResult;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Order)
    {
        if (Order::destroy($Order))
            return response()->json([
                'message' => 'Order deleted created with success!'
            ], 201);

        return response()->json([
            'message' => 'Error in create the order'
        ], 404);
    }
}
