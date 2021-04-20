<?php

namespace App\Http\Controllers;

use App\Ministry;
use Illuminate\Http\Request;

class MinistryController extends Controller
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
        $ministries = Ministry::all();
        return view('admin.ministry.index',compact('ministries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ministry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $Ministry = new Ministry();
     $Ministry->name = $request->input('name');
     $Ministry->save();

     return  redirect()->route('ministry.show', $Ministry->id)->with('success','Ministry added successfully');
 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ministry = Ministry::findOrFail($id);
        
        return view('admin.ministry.view',compact('ministry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ministry = Ministry::findOrFail($id);
        
        return view('admin.ministry.edit',compact('ministry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ministry = Ministry::findOrFail($id);
        $ministry->update($request->all());

        return  redirect()->route('ministry.show', $ministry->id)
        ->with('success','Ministry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ministry  $ministry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ministry = Ministry::findOrFail($id);
        $ministry->delete();

        return redirect()->route('ministry')
        ->with('success','Ministry deleted successfully');
    }
}
