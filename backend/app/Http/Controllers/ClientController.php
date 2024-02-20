<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Client::create($request->all()))
            return response()->json([
                'message' => 'Client created with success!'
            ], 201);

        return response()->json([
            'message' => 'Error when creating client'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Client)
    {
        if (!Client::find($Client))
            return response()->json([
                'message' => 'The client was not found'
            ], 404);;

        return Client::find($Client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Client)
    {
        $ClientResult = Client::findOrFail($Client)->update($request->all());

        if (!$ClientResult)
            return response()->json([
                'message' => 'Error in update the order'
            ], 404);

        return $ClientResult;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Client)
    {
        if (Client::destroy($Client))
            return response()->json([
                'message' => 'Client deleted with success!'
            ], 201);

        return response()->json([
            'message' => 'Error when deleting order'
        ], 404);
    }
}
