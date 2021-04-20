<?php

namespace App\Http\Controllers;

use App\Prayer_detail;
use Illuminate\Http\Request;

class PrayerDetailController extends Controller
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
        $pd = new Prayer_detail;
        $pd->num = $request->p;
        $pd->prayer_id = $request->p;
        $pd->save();
        return "done";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prayer_detail  $prayer_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Prayer_detail $prayer_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prayer_detail  $prayer_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Prayer_detail $prayer_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prayer_detail  $prayer_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prayer_detail $prayer_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prayer_detail  $prayer_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prayer_detail $prayer_detail)
    {
        //
    }
}
