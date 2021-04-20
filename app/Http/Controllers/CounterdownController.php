<?php

namespace App\Http\Controllers;

use App\Counterdown;
use Illuminate\Http\Request;

class CounterdownController extends Controller
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
        $countdowns = Counterdown::all();
        return view('admin.countdown.index',compact('countdowns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countdown.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $countdown = new Counterdown();
            $countdown->day = $request->day;
            $countdown->start_service = $request->start_service;
            $countdown->end_service = $request->end_service;
            $countdown->status = $request->input('status') == 'on' ? 1 : 0;
            $countdown->save();
        } catch (\Exception $e) { // It's actually a QueryException but this works too
            return  redirect()->route('countdown.index')->with('danger','An error occurred!');
        }
        return  redirect()->route('countdown.index')->with('success','Countdown added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counterdown  $counterdown
     * @return \Illuminate\Http\Response
     */
    public function show(Counterdown $counterdown)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counterdown  $counterdown
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countdown = Counterdown::findOrFail($id);
        
        return view('admin.countdown.edit',compact('countdown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counterdown  $counterdown
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $countdown = Counterdown::findOrFail($id);
        $countdown->day = $request->day;
        $countdown->start_service = $request->start_service;
        $countdown->end_service = $request->end_service;
        $countdown->status = $request->input('status') == 'on' ? 1 : 0;
        $countdown->save();

        return  redirect()->route('countdown.edit',$countdown->id)
        ->with('success','Countdown updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counterdown  $counterdown
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countdown = Counterdown::findOrFail($id);
        $countdown->delete();

        return redirect()->route('countdown.index')
        ->with('success','Countdown deleted successfully');
    }
    
}
