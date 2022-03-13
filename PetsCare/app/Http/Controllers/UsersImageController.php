<?php

namespace App\Http\Controllers;

use App\Models\BusinessProfile;
use App\Models\UsersImage;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Storage;
use Validator;
use App\Models\User;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UsersImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'file' => 'required|mimes:jpeg,png,jpg'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        try {

            $path = Storage::disk('public')->put('/BusinessProfiles', $file);
        } catch (Exception $e) {
            throw $e;
        }
        // dd($name);

        $uploaded = array_merge($validator->validated(), ['image_name' => $name, 'image_path' => 'storage/' . $path]);
        $addToDatabase = UsersImage::create($uploaded);
        return response()->json(asset('storage/' . $path));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersImage  $usersImage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $businessProfile = BusinessProfile::find($id);
        $businessProfile->usersImage;
        return response()->json($businessProfile, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersImage  $usersImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $old_img = UsersImage::find($request->id);
        unlink($old_img->image_path);
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        try {

            $path = Storage::disk('public')->put('/BusinessProfiles', $file);
        } catch (Exception $e) {
            throw $e;
        }
        $updated = array_merge($validator->validated(), ['image_name' => $name, 'image_path' => 'storage/' . $path]);
        $addToDatabase = $old_img->update($updated);
        return response()->json($addToDatabase);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersImage  $usersImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersImage $usersImage,$id)
    {
        $old_img = UsersImage::find($id);
        unlink($old_img->image_path);
        $deleteFromDatabase = $old_img->delete();
        return response()->json($deleteFromDatabase);
    }
}
