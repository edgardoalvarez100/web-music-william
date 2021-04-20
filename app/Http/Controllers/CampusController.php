<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
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
      $campus = Campus::all();

      return view('admin.campus.index',compact('campus'));
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $campus = new Campus();
       $campus->name = $request->input('name');
       $campus->save();

       return  redirect()->route('campus.show', $campus->id)->with('success','Campus added successfully');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campus = Campus::findOrFail($id);

        return view('admin.campus.view',compact('campus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus = Campus::findOrFail($id);
        
        return view('admin.campus.edit',compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campus = Campus::findOrFail($id);
        $campus->update($request->all());

        return  redirect()->route('campus.show', $campus->id)
        ->with('success','Campus updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::findOrFail($id);
        $campus->delete();

        return redirect()->route('campus')
        ->with('success','Campus deleted successfully');
    }
}
