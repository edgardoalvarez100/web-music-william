<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Event,Serie,Speaker,Video};

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = \Cache::remember('events', 30, function () {
            return Event::All();
        });
        $series = \Cache::remember('series', 30, function () {
            return Serie::All();
        });
        $speakers = \Cache::remember('speakers', 30, function () {
            return Speaker::All();
        });
        $videos = \Cache::remember('videos', 30, function () {
            return Video::All();
        });
        $current_serie = Serie::currentSerie();
        
        return view('admin.dashboard',compact('events','series','speakers','videos','current_serie'));
    }
}
