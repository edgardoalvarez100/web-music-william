<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{

    /**
             * Create a new controller instance.
             *
             * @return void
             */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::orderBy('created_at', 'desc')->get();
        return view('admin.speaker.index',compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.speaker.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $speaker = new Speaker();
        $speaker->name = $request->input('name');

        $speaker->featured = ($request->input('featured') == 'on') ? true : false;
        $speaker->save();

        return  redirect()->route('speaker')->with('success','Speaker added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Speaker::findOrFail($id);
        return view('admin.speaker.edit',compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $speaker = Speaker::findOrFail($id);
     $speaker->name = $request->input('name');
     $speaker->slug = $request->input('slug');
     $speaker->featured = ($request->input('featured') == 'on') ? true : false;
     $speaker->update();

     return  redirect()->route('speaker')->with('success','Speaker updated successfully');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::findOrFail($id);

        if($speaker->videos->count() > 0){
            return redirect()->route('speaker')
            ->with('danger','you cannot delete a speaker, if he have videos assigned');
        }
        else
            $speaker->delete();

        return redirect()->route('speaker')
        ->with('success','speaker deleted successfully');
    }

    
    public function addform(Request $request)
    {

        $speaker = new Speaker();
        $speaker->name = $request->input('name');
        $speaker->featured = ($request->input('featured') == 'on') ? true : false;
        $speaker->save();

        $speakers = Speaker::orderBy('created_at', 'desc')->get();
        $html='';
        foreach ($speakers as $speak) {
            $html.="<option value='$speak->id'>$speak->name</option>";
        }

        return  response()->json(['success' =>'Speaker created successfully','html'=> $html]);
    }


    public function videos($id)
    {
        $speaker = Speaker::findOrFail($id);

        return view('admin.speaker.videos.index',compact('speaker'));

    }

}
