<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use Exception;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth('api')->user();
        return response()->json(BusinessProfile::where('user_id','=',$user->id)->get());
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
            'business_type' => 'required',
            'business_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'service_description' => 'required',
            'open_at' => 'required',
            'close_at' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $profile = auth()->user()->businessProfile()->create(array_merge($validator->validated()));
        return response()->json($profile , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessProfile = BusinessProfile::find($id);
        if (!$businessProfile) {
            return response()->json("business Profile not found", 400);
        }
        return $businessProfile;
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
        $businessProfile = BusinessProfile::find($id);
        if (!$businessProfile) {
            return response()->json("businessProfile not found", 400);
        }

        $validator = Validator::make($request->all(), [
            'business_type' => 'required',
            'business_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'service_description' => 'required',
            'open_at' => 'required',
            'close_at' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $updatedProfile =  array_merge($validator->validated());
            auth()->user()->businessProfile()->where('id', $id)->update($updatedProfile);
        } catch (Exception $e) {
            throw $e;
        }

        return response()->json($updatedProfile, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataToBeDeleted = BusinessProfile::find($id);
        $dataToBeDeleted->delete();
        return response()->json('deleted', 200);
    }
}
