<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Subscription;
use App\Models\Test;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request)
    {
        try {
            $request_data = $request->only([
                'mail_address',
            ]);
            $data = new Subscription($request_data);
            $data->save();

            return response()->json([
                'status'=>true,
                'message'=>'Successfully is subscribe',
            ],200);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Internal Error!',
                'log' => $e->getMessage(),
                'log1' => $e->getFile(),
                'log2' => $e->getLine(),
                'log3' => $e->getCode(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
