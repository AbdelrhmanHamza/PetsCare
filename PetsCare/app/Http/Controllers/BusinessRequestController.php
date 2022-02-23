<?php

namespace App\Http\Controllers;

use App\Models\ClientBusinessResquest;
use Illuminate\Http\Request;

class BusinessRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = auth()->user()->businessProfile()->with('businessRequest')->get();
        return response()->json($request, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessrequest = ClientBusinessResquest::find($id);
        if (!$businessrequest) {
            return response()->json("the request isnot found", 404);
        }
        $businessrequest->get()->only(['is_read'])->all();
        if ($businessrequest->is_read == false) {
            $businessrequest->is_read = true;
            $businessrequest->save();
        }

        return response()->json($businessrequest, 200);
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
