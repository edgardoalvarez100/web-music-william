<?php

namespace App\Http\Controllers;

use App\Button;
use Illuminate\Http\Request;

class ButtonController extends Controller
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
        $button = new Button();
        $button->text = $request->input('text');
        $button->link = $request->input('link');
        $button->target = $request->input('target');
        $button->event_id = $request->input('event_id');

        $button->save();

        return  response()->json(['success' =>'Button created successfully','button'=> $button->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function show(Button $button)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function edit(Button $button)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $button = Button::findOrFail($request->input('id'));
        $button->update($request->all());

        return  response()->json(['success' =>'Button updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $button = Button::findOrFail($request->input('id'));
       $button->delete();
       return  response()->json(['success' =>'Button deleted successfully']);
   }
}
