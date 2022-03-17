<?php

namespace App\Http\Controllers\API;

use App\Models\SubscribtionPackage;
use Exception;
use Illuminate\Http\Request;
use Validator;

class SubscribtionPackageControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPackages = SubscribtionPackage::all();
        return response()->json($allPackages, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscribtion_package_name' => 'required',
            'subscribtion_package_description' => 'required',
            'activation_period' => 'required',
            'subscribtion_package_price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        try {
            $updatedProfile =  array_merge($validator->validated());
            SubscribtionPackage::create($updatedProfile);
        } catch (Exception $e) {
            throw $e;
        }

        return response()->json($updatedProfile, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = SubscribtionPackage::find($id);
        if(!$package){

            return response()->json('package not found',400);
        }
        return response()->json($package);
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
        $package = SubscribtionPackage::find($id);
        if (!$package) {
            return response()->json('package not found', 400);
        }
        $validator = Validator::make($request->all(), [
            'subscribtion_package_name' => 'required',
            'subscribtion_package_description' => 'required',
            'activation_period' => 'required',
            'subscribtion_package_price' => 'required'
        ]);
        if ($validator->fails())
        {
        return response()->json($validator->errors(),400);
        }
        try {
            $updatedPackage = array_merge($validator->validated());
            $package->update($updatedPackage);
            return response()->json($package);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packageToBeDeleted=SubscribtionPackage::find($id);
        $packageToBeDeleted->delete();
        $message=['message'=>'package succesfully deleted'];
        return response()->json([$message,$packageToBeDeleted],200);
    }
}
