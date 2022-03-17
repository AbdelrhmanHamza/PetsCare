<?php

namespace App\Http\Controllers\API;

use App\Models\BusinessProfile;
use Exception;
use Illuminate\Cache\Repository;
use App\Models\UsersImage;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessProfileControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        return response()->json(BusinessProfile::leftJoin('users_images', 'business_profiles.id', '=', 'business_profile_id')
        ->where('user_id', '=', $user->id)
        ->select('business_profiles.*','users_images.image_path')
        ->distinct()
        ->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {/*
        -> create business profile
        -> use it's id to create images
         */
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
        if ($request->file) {
            $newRequest["business_profile_id"] = $profile->id;
            $newRequest["file"] = $request->file('file');
            $newRequest["name"] = $request->file('file')->getClientOriginalName();
            $image_added = $this->storeImg($newRequest);
            $profile["img"] = $image_added;
            return response()->json($profile, 200);
        }
        return response()->json($profile, 200);
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
        $businessProfile->usersImage;
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
            if ($request->file) {
                $updateImg["imgID"] = $businessProfile->usersImage[0]->id;
                $updateImg["file"] = $request->file('file');
                $updateImg["name"] = $request->file('file')->getClientOriginalName();
                $image_added = $this->updateImg($updateImg);
                $profile["img"] = $image_added;
                return response()->json($profile, 200);
            }
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

    private function storeImg($request)
    {
        $validator = Validator::make($request, [
            'business_profile_id' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $file = $request["file"];
        $name = $request["name"];
        try {

            $path = Storage::disk('public')->put('/BusinessProfiles', $file);
        } catch (Exception $e) {
            throw $e;
        }
        // dd($name);

        $uploaded = array_merge($validator->validated(), ['image_name' => $name, 'image_path' => 'storage/' . $path]);
        $addToDatabase = UsersImage::create($uploaded);
        return asset('storage/' . $path);
    }
    private function updateImg($request)
    {
        $validator = Validator::make($request, [
            'id' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg'
        ]);
        $old_img = UsersImage::find($request["imgID"]);
        unlink($old_img->image_path);
        $file = $request["file"];
        $name = $request["name"];
        try {

            $path = Storage::disk('public')->put('/BusinessProfiles', $file);
        } catch (Exception $e) {
            throw $e;
        }
        $updated = array_merge($validator->validated(), ['image_name' => $name, 'image_path' => 'storage/' . $path]);
        $old_img->update($updated);
        return asset('storage/' . $path);
    }
}
