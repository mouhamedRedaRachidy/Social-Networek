<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\View\Components\profil;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index()
    {
        $profiles=Profile::orderby('id','desc')->paginate(9);
        
        return view('profiles.index',compact('profiles'));
    }

    public function show(Profile $profile)
    {
        
        /*$id=$request->id;
        //findOrfile
        $profile=Profile::find($id);
        if($profile === NULL){
            return abort(404);
        };*/
        return view('profiles.show',compact('profile'));
    }

    public function create()
    {
      
        return view('profiles.create');
    }


    public function store(ProfileRequest $request)
    {

        /*$name=$request->name;
        $email=$request->email;
        $password=$request->password;
        $bio=$request->bio;*/

        //validate
        $formFildes=$request->validated();
        //hash
        $formFildes['password']=Hash::make($request->password);
        //dd($formFildes);
        //insertion
        try{
            Profile::create($formFildes);
            return redirect()->route('profile.index')
            ->with('success','ajouter profile suuccess');
        }catch(\Exception $e){
            return redirect()->route('profile.index')
            ->with('danger','Errore Insertion');
        };
    }

    public function delete(Profile $profile)
    {
        //dd($profile->toArray());
        $profile->delete();
        return to_route('profile.index')->with('success','Delete Item '.$profile->name);
    }

}
