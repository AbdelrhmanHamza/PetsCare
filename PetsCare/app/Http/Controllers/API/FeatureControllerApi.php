<?php

namespace App\Http\Controllers\API;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return response()->json(Feature::all());
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
            'feature_name' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $feature=array_merge($validator->validated());
        $createFeature=Feature::create($feature);
        return response()->json($createFeature);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feature=Feature::find($id);
        return response()->json($feature);
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
        $feature=Feature::find($id);
        if(!$feature)
        {
            return response()->json('feature not found',400);
        }
        $validator = Validator::make($request->all(), [
            'feature_name' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $feature->feature_name = $request->feature_name;
        $feature->update();
        return response()->json($feature);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature=Feature::find($id);
        $feature->delete();
        $message=['message'=>'feature deleted succesfully'];
        return response()->json([$message,$feature],200);
    }
}
