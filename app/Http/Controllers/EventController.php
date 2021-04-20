<?php

namespace App\Http\Controllers;

use App\{Event,Ministry,Campus,Location,Button};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class EventController extends Controller
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
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ministries = Ministry::all();
        $campuses = Campus::all();
        $locations = Location::all();
        return view('admin.event.create',compact('ministries','campuses','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $event = new Event();
        $event->title = $request->input('title');
        $event->start_date = $request->input('start_date');
        $event->start_date_event = $request->input('start_date_event');
        $event->end_date = $request->input('end_date');
        $event->description = $request->input('description');
        $event->short_description = $request->input('short_description');
        $event->time = $request->input('time');
        $event->price = $request->input('price');
        $event->currency = $request->input('currency');
        $event->featured = ($request->input('featured') == 'on') ? true : false;
        $event->location_id = $request->input('location');
        $event->date_in_text = $request->input('date_in_text');
        $event->user_created = Auth::id();

        $ministries = $request->input('ministries');
        $campuses = $request->input('campus');
        $buttons =$request->input('button');

        $file = $request->file('image');
        $nombre =  $this->clean(uniqid()."_".$file->getClientOriginalName());
        \Storage::disk('events')->put($nombre,  \File::get($file));
        $event->image = $nombre;

        $event->save();

        if($request->has('button')){
            foreach ($buttons as $button){
                $b = new Button();
                $b->text = $button['text'];
                $b->link = $button['link'];
                $b->target = $button['target'];
                $b->event_id = $event->id;
                $b->save();
            }
        }


        if(isset($ministries))
        {
            foreach ($ministries as $minitry)
            {
             $event->ministries()->attach($minitry);
         }
     }


     if(isset($campuses))
     {
         foreach ($campuses as $campus)
         {
            $event->campuses()->attach($campus);
        }
    }

    return  redirect()->route('event.show', $event->id)->with('success','Event added successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.event.view',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::findOrFail($id);
        $ministries = Ministry::all();
        $campuses = Campus::all();
        $locations = Location::all();
        return view('admin.event.edit',compact('event','locations','campuses','ministries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->title = $request->input('title');
        $event->slug = $request->input('slug');
        $event->start_date = $request->input('start_date');
        $event->start_date_event = $request->input('start_date_event');
        $event->end_date = $request->input('end_date');
        $event->description = $request->input('description');
        $event->short_description = $request->input('short_description');
        $event->time = $request->input('time');
        $event->price = $request->input('price');
        $event->currency = $request->input('currency');
        $event->featured = ($request->input('featured') == 'on') ? true : false;
        $event->location_id = $request->input('location');
        $event->date_in_text = $request->input('date_in_text');

        if ($request->has('image'))
        {
            $file = $request->file('image');
            $nombre =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('events')->put($nombre,  \File::get($file));
            \Storage::disk('events')->delete($event->image);
            $event->image = $nombre;
        }

        $ministries = $request->input('ministries');
        $campuses = $request->input('campus');
        $event->ministries()->detach();
        $event->campuses()->detach();

        if(isset($ministries))
        {
            foreach ($ministries as $minitry)
            {
             $event->ministries()->attach($minitry);
         }
     }


     if(isset($campuses))
     {
         foreach ($campuses as $campus)
         {
            $event->campuses()->attach($campus);
        }

    }

    $event->update();

    return  redirect()->route('event.show', $event->id)
    ->with('success','Event updated successfully');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event')
        ->with('success','Event deleted successfully');
    }

    private function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $string)); // Removes special chars.
   }
}
