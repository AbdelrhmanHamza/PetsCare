<?php

namespace App\Http\Controllers\API;

use App\Models\BusinessProfile;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;
use Illuminate\Support\Facades\DB;
use Validator;

class BusinessFilterControllerApi extends Controller
{

    public function businesses(Request $request){
        return response()->json(BusinessProfile::paginate(6));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dataToFilter = DB::table('business_profiles')
            ->join('business_profile_service_package', 'business_profiles.id', '=', 'business_profile_id')
            ->join('service_packages', 'service_package_id', '=', 'service_packages.id');

        if ($request->address) {
            $dataToFilter->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->open_at && $request->close_at) {
            $dataToFilter->where('open_at', (int)$request->open_at);
            $dataToFilter->where('close_at', (int)$request->close_at);
        }

        if ($request->max_price) {
            $dataToFilter->where('package_price', '>=', (float)$request->max_price);
        }

        $data = $dataToFilter->paginate(10);
        return response()->json($data);
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

    // public function index(Request $request)
    // {
    //     $dataToFilter= BusinessProfile::with(['servicePackage']);
    //     if($request->address)
    //     {
    //         $dataToFilter->where('address','like','%'. $request->address.'%');
    //     }
    //     if($request->open_at && $request->close_at)
    //     {
    //         $dataToFilter->where('open_at' , (int)$request->open_at);
    //         $dataToFilter->where('close_at' , (int)$request->close_at);
    //     }
    //     if($request->max_price)
    //     {
    //         // $dataToFilter->servicePackage
    //         // ->where('package_price','<=', (double)$request->max_price);

    //         // $dataToFilter->servicePackage
    //         // ->where('package_price','<=', $request->max_price);
    //     }

    //     $data =$dataToFilter->get();
    //     return response()->json($data);
    // }
}
