<?php

namespace App\Http\Controllers;

use App\{Video,Serie,Speaker,Promopack};
use Illuminate\Http\Request;

class VideoController extends Controller
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
    public function index($id)
    {

        $serie = Serie::findOrFail($id);        
        return view('admin.video.index',compact('serie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $serie = Serie::findOrFail($id);
        $speakers = Speaker::all();
        return view('admin.video.create',compact('serie','speakers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {


        $video = new Video();
        $video->title = $request->input("title");
        $video->date = $request->input("date");
        $video->week = $request->input("week");
        $video->video = $request->input("video");
        $video->title = $request->input("title");
        $video->serie_id = $id;
        $video->views = 0;
        $video->speaker_id = $request->input("speaker_id");
        $video->description = $request->input("description");

        if ($request->has('cover')) 
        {
            $filetop = $request->file('cover');
            $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
            \Storage::disk('videos')->put($nombretop,  \File::get($filetop));
            $video->cover = $nombretop;
        }

        if ($request->has('notes')) 
        {
            $filetop = $request->file('notes');
            $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
            \Storage::disk('notes')->put($nombretop,  \File::get($filetop));
            $video->notes = $nombretop;
        }

        if ($request->has('audio')) 
        {
            $filetop = $request->file('audio');
            $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
            \Storage::disk('audios')->put($nombretop,  \File::get($filetop));
            $video->audio = $nombretop;
        }

        $promo = new Promopack();
        $promo->save();
        $video->promopack_id = $promo->id;

        $video->save();

        return  redirect()->route('video',$id)->with('success','Video added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($serie_id,$id)
    {
        $video = Video::findOrFail($id);
        $speakers = Speaker::all();
        return view('admin.video.edit',compact('video','speakers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $serie_id, $id)
    {
     $video = Video::findOrFail($id);
     $video->date = $request->input("date");
     $video->week = $request->input("week");
     $video->video = $request->input("video");
     $video->title = $request->input("title");

     $video->speaker_id = $request->input("speaker_id");
     $video->description = $request->input("description");

     if ($request->has('cover')) 
     {

        $filetop = $request->file('cover');
        $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
        \Storage::disk('videos')->put($nombretop,  \File::get($filetop));
        $video->cover = $nombretop;
    }

    if ($request->has('notes')) 
    {
        $filetop = $request->file('notes');
        $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
        \Storage::disk('notes')->put($nombretop,  \File::get($filetop));
        $video->notes = $nombretop;
    }

    if ($request->has('audio')) 
    {
        $filetop = $request->file('audio');
        $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
        \Storage::disk('audios')->put($nombretop,  \File::get($filetop));
        $video->audio = $nombretop;
    }

    $video->update();

    return redirect()->route('video',$serie_id)->with('success','video updated successfully');
}


public function destroy($serie_id,$id)
{
    $video = Video::findOrFail($id);
    $video->delete();

    return redirect()->route('video',$serie_id)
    ->with('success','video deleted successfully');
}

private function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $string)); // Removes special chars.
   }
}
