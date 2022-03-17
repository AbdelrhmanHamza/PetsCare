<?php

namespace App\Http\Controllers\API;
use App\Models\Pet;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PetControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets=Pet::get()->all();
        return response()->json($pets, 200);
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
            'pet_type' => 'required',
            'pet_breed' => 'required',
            'pet_age' => 'required',
            'has_medical_condition' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $foundProfile = auth()->user()->clientprofile;

        if (!$foundProfile)
            return response()->json('No profile found, Please fill profile data to be able to add pets!', 400);

        try {
            $user = $foundProfile->pet()->create(array_merge($validator->validated()));
            return response()->json(['created new profile', $user], 200);
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
        $pets = Pet::find($id);
        if (!$pets) {
            return response()->json("the client isnot found", 404);
        }
        return response()->json($pets) ;
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
        $pets = Pet::find($id);
        if (!$pets) {
            return response()->json("the pet is not found", 404);
        }
        $validator = Validator::make($request->all(), [
            'pet_type' => 'required',
            'pet_breed' => 'required',
            'pet_age' => 'required',
            'has_medical_condition' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $update = array_merge($validator->validated());
            $user = auth()->user()->clientProfile->pet()->where('id', $id)->update($update);

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
        $pets = Pet::find($id);
        $pets->delete();
        return response()->json('done' , 200);
    }
}
