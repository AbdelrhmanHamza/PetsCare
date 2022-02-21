<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use Exception;
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
        return response()->json(auth()->user()->with('BusinessProfile')->get());
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

        try{

            $user = auth()->user()->businessProfile()->create(array_merge($validator->validated()));
            dd($user);
        }catch(Exception $e){
            throw $e;
        }

        // $business_profile = BusinessProfile::create(array_merge(
        //     $validator->validated(),
        //     ['user_id' => ]
        // ));
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
