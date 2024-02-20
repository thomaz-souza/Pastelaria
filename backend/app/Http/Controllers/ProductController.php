<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Product::create($request->all()))
            return response()->json([
                'message' => 'Product created with success!'
            ], 201);

        return response()->json([
            'message' => 'Error when creating product'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Product)
    {
        if (!Product::find($Product))
            return response()->json([
                'message' => 'The product was not found'
            ], 404);;

        return Product::find($Product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Product)
    {
        $ProductResult = Product::findOrFail($Product)->update($request->all());

        if (!$ProductResult)
            return response()->json([
                'message' => 'Error in update the product'
            ], 404);

        return $ProductResult;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Product)
    {
        if (Product::destroy($Product))
            return response()->json([
                'message' => 'Product deleted created with success!'
            ], 201);

        return response()->json([
            'message' => 'Error in create the product'
        ], 404);
    }
}
