<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\View\Components\profil;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class profileController extends Controller
{

    function __construct()
    {
       // $this->middleware('auth');
    }
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
       /* $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);*/
        $formFildes=$request->validated();

        //hash
        $formFildes['password']=Hash::make($request->password);
        //dd($formFildes);

        //insertion image
        if ($request->hasFile('image') ) {
            $formFildes['image'] = $request->file('image')->store('profile', 'public');
        }
        //dd($formFildes);
        //insertion

            Profile::create($formFildes);
            return redirect()->route('profile.index')
            ->with('success','ajouter profile suuccess');
      
    }

    public function destroy(Profile $profile)
    {
        //dd($profile->toArray());
        $profile->delete();
        return to_route('profile.index')->with('success','Delete Item '.$profile->name);
    }

    public function edit(Profile $profile)
    {
   

        $this->authorize('view',$profile);
        /*if($profile===null){
            return abort('404');
        };*/
        return view('profiles.edit',compact('profile'));
    }

    public function update(Profile $profile,ProfileRequest $request)
    {
        $formFildes=$request->validated();
        if($request->hasFile('image')){
            $formFildes['image']=$request->file('image')->store('profile','public');
   
        }
        $formFildes['password']=Hash::make($formFildes['password']);
        //dd($formFildes['password']);
        $profile->fill($formFildes)->save();
        //dd($profile);
        return to_route('profile.index');
    }
}
