<?php

namespace App\Http\Controllers\API;

use App\Models\ClientBusinessResquest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class ClientRequestControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = auth()->user()->clientProfile->clientRequest;
        return response()->json([$request], 200);
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
            'business_profile_id' => 'required',
            'package_id' => 'required',
            'description' => 'required',
            'request_due_date' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foundProfile = auth('api')->user()->clientProfile;
        if (!$foundProfile)
            return response()->json('No profile found, Please fill profile data to be able to add pets!', 400);

        try {

            $requestInput = array_merge($validator->validated());
            $requestInput["client_profile_id"]=$foundProfile->id;
            $clientrequest = ClientBusinessResquest::create($requestInput);
            return response()->json(['created new request', $clientrequest], 200);
        } catch (Exception $e) {
            throw $e;
        }
        return response()->json("Something went wrong!", 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientrequest = ClientBusinessResquest::find($id);
        if (!$clientrequest) {
            return response()->json("the request isnot found", 404);
        }
        return response()->json($clientrequest);
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
        $clientrequest = ClientBusinessResquest::find($id);
        if (!$clientrequest) {
            return response()->json("the pet isnot found", 404);
        }
        $validator = Validator::make($request->all(), [
            'business_profile_id' => 'required',
            'package_id' => 'required',
            'description' => 'required',
            'request_due_date' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $update = array_merge($validator->validated());
            $update["client_profile_id"]=auth('api')->user()->clientProfile->id;
            $user = auth('api')->user()->clientProfile->clientRequest()->where('id', $id)->update($update);
        } catch (Exception $e) {
            throw $e;
        }
        return response()->json($update, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientrequest = ClientBusinessResquest::find($id);
        $clientrequest->delete();
        return response()->json('done', 200);
    }
}
