<?php

namespace App\Http\Controllers;

use App\Promopack;
use Illuminate\Http\Request;

class PromopackController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($serie_id)
    {
        $promopacks = Promopack::orderBy('created_at', 'desc')->get();
        return view('admin.promopack.index',compact('promopacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promopack.create');
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
     * @param  \App\Promopack  $promopack
     * @return \Illuminate\Http\Response
     */
    public function show(Promopack $promopack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promopack  $promopack
     * @return \Illuminate\Http\Response
     */
    public function edit(Promopack $promopack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promopack  $promopack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promopack $promopack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promopack  $promopack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promopack $promopack)
    {
        //
    }
}
