<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        /*$profile=Profile::all();
        return response()->json($profile);*/
        return ProfileResource::collection(Profile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFileds=$request->all();
        $formFileds['password']=Hash::make($request->value);
        $profile=Profile::create($formFileds);
        //dd($profile);
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return response([
            'data'=>new ProfileResource($profile),
            'status'=>200
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFileds=$request->all();
        //HashPassword
        $formFileds['password']=Hash::make($request->password);
        $profile->fill($formFileds)->save();
        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response([
            'message'=>'etait bien supprmer !!',
            'status'=>200,
        ]);
    }
}
