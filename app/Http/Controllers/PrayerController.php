<?php

namespace App\Http\Controllers;

use App\Prayer;
use App\Prayer_detail;
use App\Prayer_old;
use App\Mail\SendPrayer;
use Illuminate\Http\Request;
use Mail;

class PrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prayers_pending = Prayer::where("status", "=", 0)->get();
        $prayers_approved = Prayer::where("status", "=", 1)->get();
        return view('admin.prayer.index')->with(compact('prayers_pending', 'prayers_approved'));
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
        $prayer = new Prayer;
        $prayer->name = $request->name;
        $prayer->phone = $request->phone;
        $prayer->email = $request->email;
        $prayer->category = $request->topic;
        $prayer->message = $request->message;
        $prayer->kind = $request->kind;
        $prayer->status = 0;

        $prayer->save();


        // Send email notification
        $string = preg_replace("/((http|https|www)[^\s]+)/", 'http', strtolower($request->message)); //convierto los URL en http
        $to_search   = 'http';
        $result = strpos($string,  $to_search); #busco si hay URl en la cadena
        if($result === false){
            //Mail::to("luis@livedesign.org")->bcc('webmaster@livedesign.org')->send(new SendPrayer());
            //Mail::to("rachel@livedesign.org")->send(new SendPrayer());
        }
        // END


        return "<br><p style='color:white !important'>WE HAVE RECEIVED YOUR PRAYER REQUEST.<br>OUR PRAYER TEAM WILL REVIEW IT AND POST. THANK YOU!</p>";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prayer  $prayer
     * @return \Illuminate\Http\Response
     */
    public function show(Prayer $prayer)
    {
        //
        $prayers = Prayer::where("category", "!=", "DO NOT Share This")->where("status", "=", "1")->get();
        return view('website.prayer-request')->with(compact('prayers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prayer  $prayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Prayer $prayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prayer  $prayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prayer $prayer)
    {
        //save old prayer
        $old = new Prayer_old();
        $old->name = "";
        $old->prayer = $request->oldText;
        $old->prayer_id = $request->p;
        $old->save();
        // update new prayer
        $prayer = Prayer::find($request->p);
        $prayer->message = $request->newText;
        $prayer->save();
        return "done";
    }
    public function publish(Request $request, Prayer $prayer)
    {
        $prayer = Prayer::find($request->p);
        $prayer->status = 1;
        $prayer->save();
        return "done";
    }
    public function delete(Request $request, Prayer $prayer)
    {
        $prayer = Prayer::find($request->p);
        $prayer->status = 3;
        $prayer->save();
        return "done";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prayer  $prayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prayer $prayer)
    {
        //
    }
}
