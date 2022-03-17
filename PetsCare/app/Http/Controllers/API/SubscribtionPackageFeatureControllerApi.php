<?php

namespace App\Http\Controllers\API;

use App\Models\Feature;
use App\Models\SubscribtionPackage;
use Illuminate\Http\Request;

class SubscribtionPackageFeatureControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptionPackage = SubscribtionPackage::with('feature')->get();
        if (!$subscriptionPackage) {
            return response()->json('Profile not found', 400);
        }

        return response()->json([$subscriptionPackage], 200);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($subscriptionPackageId,$featureId)
    {
        $packageResult = SubscribtionPackage::find($subscriptionPackageId);
        $featureResult = Feature::find($featureId);
        $attachResult = $packageResult->feature()->attach($featureResult);
        return response()->json([$packageResult, $featureResult, 'Success']);


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
