<?php

namespace App\Http\Controllers;

use App\{Serie,Promopack};
use Illuminate\Http\Request;

class SerieController extends Controller
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
        $series = Serie::orderBy('created_at', 'desc')->get();
        return view('admin.serie.index',compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.serie.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie = new Serie();
        $serie->name = $request->input('name');
        $serie->description = $request->input('description');
        $serie->date = $request->input('date');
        
        if ($request->has('cover')) 
        {
            $filecover = $request->file('cover');
            $nombrecover =  $this->clean(uniqid()."_".$filecover->getClientOriginalName());
            \Storage::disk('series')->put($nombrecover,  \File::get($filecover));
            $serie->cover = $nombrecover;
        }

        if ($request->has('homepage')) 
        {
            $filehome = $request->file('homepage');
            $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
            \Storage::disk('series')->put($nombrehome,  \File::get($filehome));
            $serie->homepage = $nombrehome;
        }

        if ($request->has('topbanner')) 
        {
            $filetop = $request->file('topbanner');
            $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
            \Storage::disk('series')->put($nombretop,  \File::get($filetop));
            $serie->topbanner = $nombretop;
        }
        $promopack = new Promopack();
        $promopack->save();

        $serie->promopack_id = $promopack->id;
        $serie->save();

        return  redirect()->route('serie')->with('success','serie added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        $serie = serie::findOrFail($id);

        return view('admin.serie.view',compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = serie::findOrFail($id);
        
        return view('admin.serie.edit',compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serie = serie::findOrFail($id);

        $serie->name = $request->input('name');
        $serie->slug = $request->input('slug');
        $serie->description = $request->input('description');
        $serie->date = $request->input('date');
        
        if ($request->has('cover')) 
        {
            $filecover = $request->file('cover');
            $nombrecover =  $this->clean(uniqid()."_".$filecover->getClientOriginalName());
            \Storage::disk('series')->put($nombrecover,  \File::get($filecover));
            $serie->cover = $nombrecover;
        }

        if ($request->has('homepage')) 
        {
            $filehome = $request->file('homepage');
            $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
            \Storage::disk('series')->put($nombrehome,  \File::get($filehome));
            $serie->homepage = $nombrehome;
        }

        if ($request->has('topbanner')) 
        {
            $filetop = $request->file('topbanner');
            $nombretop =  $this->clean(uniqid()."_".$filetop->getClientOriginalName());
            \Storage::disk('series')->put($nombretop,  \File::get($filetop));
            $serie->topbanner = $nombretop;
        }

        $serie->update();

        
        return  redirect()->route('serie')->with('success','serie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        foreach($serie->videos as $video)
        {
           $video->delete();
       }
       $serie->delete();
       return redirect()->route('serie')
       ->with('success','Serie deleted successfully');
   }



   private function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

       return strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $string)); // Removes special chars.
   }

   public function addpromo(Request $request, $id)
   {
    $serie = Serie::findOrFail($id);
    $promopack = $serie->promopack;
    if ($request->has('pc')) 
    {
        $filehome = $request->file('pc');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->pc = $nombrehome;
        $campo = "pc";
    }

    if ($request->has('pc_png')) 
    {
        $filehome = $request->file('pc_png');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->pc_png = $nombrehome;
        $campo = "pc_png";
    }

    if ($request->has('phone')) 
    {
        $filehome = $request->file('phone');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->phone = $nombrehome;
        $campo = "phone";
    }

    if ($request->has('phone_png')) 
    {
        $filehome = $request->file('phone_png');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->phone_png = $nombrehome;
        $campo = "phone_png";
    }

    if ($request->has('facebook')) 
    {
        $filehome = $request->file('facebook');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->facebook = $nombrehome;
        $campo = "facebook";
    }

    if ($request->has('facebook_png')) 
    {
        $filehome = $request->file('facebook_png');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->facebook_png = $nombrehome;
        $campo = "facebook_png";
    }

    if ($request->has('instagram')) 
    {
        $filehome = $request->file('instagram');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->instagram = $nombrehome;
        $campo = "instagram";
    }

    if ($request->has('instagram_png')) 
    {
        $filehome = $request->file('instagram_png');
        $nombrehome =  $this->clean(uniqid()."_".$filehome->getClientOriginalName());
        \Storage::disk('promopacks')->put($nombrehome,  \File::get($filehome));
        $promopack->instagram_png = $nombrehome;
        $campo = "instagram_png";
    }
    $promopack->update();

    return response()->json([
        'success' =>'Promopack upload successfully',
        'promopack'=> $serie->promopack->{$campo}, 'campo'=> $campo]);
}

public function deletepromo(Request $request, $id)
{
    $serie = Serie::findOrFail($id);
    $promopack = $serie->promopack;
    if ($request->has('pc')) 
    {
     \Storage::disk('promopacks')->delete($promopack->pc);
     $promopack->pc = NULL;
     $campo = "pc";
 }

 if ($request->has('pc_png')) 
 {
    \Storage::disk('promopacks')->delete($promopack->pc_png);
    $promopack->pc_png = NULL;    
    $campo = "pc_png";
}

if ($request->has('phone')) 
{
 \Storage::disk('promopacks')->delete($promopack->phone);
 $promopack->phone = NULL;
 $campo = "phone";
}

if ($request->has('phone_png')) 
{
    \Storage::disk('promopacks')->delete($promopack->phone_png);
    $promopack->phone_png = NULL;    
    $campo = "phone_png";
}

if ($request->has('facebook')) 
{
    \Storage::disk('promopacks')->delete($promopack->facebook);
    $promopack->facebook = NULL;    
    $campo = "facebook";
}


if ($request->has('facebook_png')) 
{
    \Storage::disk('promopacks')->delete($promopack->facebook_png);
    $promopack->facebook_png = NULL;    
    $campo = "facebook_png";
}


if ($request->has('instagram')) 
{
    \Storage::disk('promopacks')->delete($promopack->instagram);
    $promopack->instagram = NULL;    
    $campo = "instagram";
}


if ($request->has('instagram_png')) 
{
    \Storage::disk('promopacks')->delete($promopack->instagram_png);
    $promopack->instagram_png = NULL;    
    $campo = "instagram_png";
}

$promopack->update();

return response()->json(['success' =>'Promopack deleted successfully', 'campo'=> $campo]);
}

}
