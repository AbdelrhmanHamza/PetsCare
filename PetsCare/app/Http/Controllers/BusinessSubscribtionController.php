<?php

namespace App\Http\Controllers;

use App\Models\UserSubsrcibtionPackage;
use Exception;
use Illuminate\Http\Request;
use Validator;

class BusinessSubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $subscribedpackage=auth()->user()->userSubscribtionPackages()->get()->all();

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
            'user_id' => 'required',
            'subscribtion_package_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $subscribedpackage=auth()->user()->userSubscribtionPackages()->where('is_expired', false)->get()->first();

        if($subscribedpackage){
            return response()->json("User is already subscriped to an active package", 200);
        }

        $input = array_merge($validator->validated(),['is_expired' => false,'subscribtion_date'=> date("Y-m-d H:i:s")]);
        try {
            $packageResult = UserSubsrcibtionPackage::create($input);
            return response()->json([$packageResult, 'Success'], 200);
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $subscribedpackage=auth()->user()->userSubscribtionPackages()->latest()->first();
        return response()->json($subscribedpackage);
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
