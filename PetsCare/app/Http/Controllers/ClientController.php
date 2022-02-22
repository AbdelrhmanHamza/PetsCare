<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json('hello amr', 200);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foundProfile = auth()->user()->clientProfile();
        dd($foundProfile);
        try {
            if ($foundProfile) {
                $result = auth()->user()->clientProfile()->update(array_merge($validator->validated()));
                return response()->json(["Data found and updated", $result] , 200);
            }
            else{
                $user = auth()->user()->clientProfile()->create(array_merge($validator->validated()));
                return response()->json(['created new profile', $user], 200);
            }
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
        $clientprofile = ClientProfile::find($id);
        if (!$clientprofile) {
            return response()->json("the client isnot found", 404);
        }
        return response()->json($clientprofile) ;
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
        $clientprofile = ClientProfile::find($id);
        if (!$clientprofile) {
            return response()->json("the client isnot found", 404);
        }
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $update = array_merge($validator->validated());
            $user = auth()->user()->clientProfile()->where('id', $id)->update($update);
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
        $clientprofile = ClientProfile::find($id);
        $clientprofile->delete();
        return response()->json('done' , 200);

    }
}