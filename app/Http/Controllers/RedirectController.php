<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Redirect;

class RedirectController extends Controller
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
       $redirects = Redirect::all();
        return view('admin.redirect.index',compact('redirects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.redirect.create');
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
            $redirect = new Redirect();
            $redirect->url_from = $request->input('url_from');
            $redirect->url_to = $request->input('url_to');
            $redirect->status = $request->input('status') == 'on' ? 1 : 0;
            $redirect->save();
        } catch (\Exception $e) { // It's actually a QueryException but this works too
           if ($e->getCode() == 23000) {
               return  redirect()->route('redirect.index')->with('danger','Redirect already exists');
           }
        }
     return  redirect()->route('redirect.edit',$redirect->id)->with('success','Redirect added successfully');
 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Redirect $redirect
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $redirect = Redirect::findOrFail($id);

        return view('admin.redirect.view',compact('redirect'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Redirect $redirect
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $redirect = Redirect::findOrFail($id);

        return view('admin.redirect.edit',compact('redirect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Redirect $redirect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$redirect = Redirect::findOrFail($id);
    	$redirect->url_from = $request->input('url_from');
    	$redirect->url_to = $request->input('url_to');
    	$redirect->status = $request->input('status') == 'on' ? 1 : 0;
    	$redirect->update();

        return  redirect()->route('redirect.edit',$redirect->id)
        ->with('success','Redirect updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Redirect $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $redirect = Redirect::findOrFail($id);
       $redirect->delete();

        return redirect()->route('redirect.index')
        ->with('success','Redirect deleted successfully');
    }
}
