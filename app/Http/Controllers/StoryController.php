<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class StoryController extends Controller
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
        $stories = Story::all();

        return view('admin.story.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
            'status_id' => 'required',
        ]);

        $story = new Story();
        $story->name = $request->name;
        $story->email = $request->email;
        $story->body = $request->body;
        $story->status_id = $request->status_id;
        $story->ip = $request->ip();


        $story->save();
        return redirect()->route('story.edit', $story)->with('success','Story added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {

        return view('admin.story.edit',compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $story->name = $request->name;
        $story->email = $request->email;
        $story->body = $request->body;
        $story->status_id = $request->status_id;
        $story->ip = $request->ip();
        $story->update();

        return redirect()->route('story.edit', $story)->with('success','Story edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();
        return redirect()->route('story.index')->with('success','Story deleted successfully');
    }

    public function pdf()
    {
        $stories = Story::all();
        $pdf = PDF::loadView('admin.story.pdf', compact('stories'));
        return $pdf->stream();

    }
}
