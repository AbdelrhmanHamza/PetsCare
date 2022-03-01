<?php

namespace App\Http\Controllers;

use App\Models\ClientBusinessResquest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BusinessRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth('api')->user();
        $request = DB::table('business_profiles')
        ->join('client_business_resquests', 'business_profiles.id', '=', 'client_business_resquests.business_profile_id')
        ->join('client_profiles', 'client_business_resquests.client_profile_id', '=', 'client_profiles.id')
        ->where('business_profiles.user_id','=',$user->id);
        return response()->json($request->get(), 200);
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
