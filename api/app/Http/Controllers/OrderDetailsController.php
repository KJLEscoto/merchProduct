<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OrderDetailsRequest;
use Illuminate\Http\JsonResponse;

class OrderDetailsController extends Controller
{
    public function index()
    {
        $order_details = OrderDetails::all();
        return response()->json(['order_details' => $order_details], 200);
    }

    public function store(OrderDetailsRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|numeric', 
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $order_details = OrderDetails::create($request->all());
        return response()->json(['order_details' => $order_details], 201);
    }

    public function show($id)
    {
        $order_details = OrderDetails::find($id);
        if (!$order_details) {
            return response()->json(['error' => 'Order details not found'], 404);
        }
        return response()->json(['order_details' => $order_details], 200);
    }

    public function destroy($id): JsonResponse
    {
        $order_details = OrderDetails::find($id);
        if (!$order_details) {
            return response()->json(['error' => 'Order details not found'], 404);
        }

        $order_details->delete();

        return response()->json(['message' => 'Order details soft deleted successfully'], 200);
    }
}