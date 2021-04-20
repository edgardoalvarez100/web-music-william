<?php

namespace App\Http\Controllers;

use App\{JobSubmit,Job};
use Illuminate\Http\Request;

class JobSubmitController extends Controller
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
    public function index($job_id)
    {
        $job = Job::findOrFail($job_id);
        $submits= JobSubmit::where('job_id',$job_id)->get();
        return view('admin.jobsubmit.index',compact('submits','job'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobSubmit  $jobSubmit
     * @return \Illuminate\Http\Response
     */
    public function show(JobSubmit $jobSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobSubmit  $jobSubmit
     * @return \Illuminate\Http\Response
     */
    public function edit(JobSubmit $jobSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobSubmit  $jobSubmit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobSubmit $jobSubmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobSubmit  $jobSubmit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobSubmit = JobSubmit::findOrFail($id);
        $jobSubmit->delete();

        return  redirect()->route('jobsubmit.index',$jobSubmit->job_id)->with('success','Submit deleted successfully');
    }
}
