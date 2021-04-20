<?php

namespace App\Http\Controllers;

use App\{Job,JobSubmit};
use Illuminate\Http\Request;

class JobController extends Controller
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
        $jobs = Job::all();
        return view('admin.job.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $job = new Job();
        $job->title = $request->title;
        $job->publication_startdate = $request->publication_startdate;
        $job->publication_enddate = $request->publication_enddate;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->type = $request->type;
        $job->email_notification = $request->email_notification;
        $job->status =  $request->input('status') == 'on' ? 1 : 0;


        if ($request->has('image')) 
        {
            $file = $request->file('image');
            $nameFile =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('jobs')->put($nameFile,  \File::get($file));
            $job->image = $nameFile;
        }

        if ($request->has('file')) 
        {
            $file = $request->file('file');
            $nameFile =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('jobs')->put($nameFile,  \File::get($file));
            $job->file = $nameFile;
        }

        $job->save();

        return  redirect()->route('job.edit', $job->id)->with('success','Job added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('admin.job.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        
        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->publication_startdate = $request->publication_startdate;
        $job->publication_enddate = $request->publication_enddate;
        $job->description = $request->description;
        $job->location = $request->location;
        $job->type = $request->type;
        $job->email_notification = $request->email_notification;
        $job->status =  $request->input('status') == 'on' ? 1 : 0;


        if ($request->has('image')) 
        {
            $file = $request->file('image');
            $nameFile =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('jobs')->put($nameFile,  \File::get($file));
            $job->image = $nameFile;
        }

        if ($request->has('file')) 
        {
            $file = $request->file('file');
            $nameFile =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('jobs')->put($nameFile,  \File::get($file));
            $job->file = $nameFile;
        }

        $job->save();

        return  redirect()->route('job.edit', $job->id)->with('success','Job uploaded successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        
        JobSubmit::where('job_id',$job->id)->delete();
        $job->delete();

        return  redirect()->route('job.index')->with('success','Job deleted successfully');
    }

    private function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
 
        return strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $string)); // Removes special chars.
    }
}
