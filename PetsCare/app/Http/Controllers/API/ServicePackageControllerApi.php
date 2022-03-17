<?php

namespace App\Http\Controllers\API;

use App\Models\ServicePackage;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;


class ServicePackageControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profileResult = auth()->user()->businessProfile()->find($id);
        if (!$profileResult) {
            return response()->json('Profile not found', 400);
        }
        $profileResult->servicePackage;
        return response()->json([$profileResult], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $input = array_merge($validator->validated());

        try {
            $packageResult = ServicePackage::create($input);
            $profileResult = auth()->user()->businessProfile()->find($id);
            $attachResult = $profileResult->servicePackage()->attach($packageResult->id);
            return response()->json([$input, $packageResult, $profileResult, 'Success']);
        } catch (Exception $e) {
            throw $e;
        }

        return response()->json($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profileResult = auth()->user()->businessProfile()->find($id);
        $package = $profileResult->servicePackage;
        return response()->json($package);
    }
    public function clientShow($id)
    {
        $package = DB::table('business_profiles')
        ->join('business_profile_service_package', 'business_profiles.id', '=', 'business_profile_id')
        ->join('service_packages', 'service_package_id', '=', 'service_packages.id')
        ->where('business_profiles.id', '=',$id)->get();
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
        $package = ServicePackage::find($id);
        $validator = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_description' => 'required',
            'package_price' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $updatedPackage =  array_merge($validator->validated());

        $package->update($updatedPackage);

        return response()->json($updatedPackage, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = ServicePackage::find($id);
        $package->businessProfile()->detach();
        $package->delete();
        $messege = ['messege' => 'the package deleted'];
        return response()->json([$messege, $package], 200);
    }
}
