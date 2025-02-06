<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PublicationRequest;
use App\Models\Profile;
use App\Models\Publication;
use Illuminate\Auth\GenericUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {

        $publications = Publication::orderby('id', 'desc')->get();
        return view('publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
   
        
        /*$formFildes = $request->validate(
            [
                'titre' => 'required|min:5|max:150',
                'body' => 'required|min:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ],/* [
            'image.required' => 'الرجاء رفع صورة.',
            'image.image' => 'يجب أن يكون الملف صورة صحيحة.',
            'image.mimes' => 'يجب أن تكون الصورة بصيغة: jpeg, png, jpg.',
            'image.max' => 'حجم الصورة يجب ألا يتجاوز 2MB.',
        ]
        );*/
        $formFields =$request->validated();
        if($request->hasFile('image')){
            $formFields ['image']=$request->file('image')->store('publication','public');
        }
        
        $formFields ['profile_id']=Auth::id();

        Publication::create($formFields );
        return to_route('publication.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publication $publication)
    {
        //dd(Gate::allows('update-publication',$publication));

        /*if(!Gate::allows('update-publication',$publication)){
            return abort(403);
        }*/
        $this->authorize('update', $publication);

        /*if(Auth::id()!==$publication->profile_id){
            return abort(403);
        }*/
        return view('publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $formFildes = $request->validated();
        if ($request->hasFile('image')) {
            $formFildes['image'] = $request->file('image')->store('publication', 'public');
        };
        $publication->fill($formFildes)->save();
        return to_route('publication.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publication $publication)
    {
        $publication->delete();
        return to_route('publication.index');
    }
}
