<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Jobsumit,Job, Redirect};

class FrontController extends Controller
{
    function Jobsumit(Request $request)
    {
        $submit = new Jobsumit();
        $submit->first_name = $request->first_name;
        $submit->last_name = $request->last_name;
        $submit->email = $request->email;
        $submit->job_id = $request->job_id;

        if ($request->has('file'))
        {
            $file = $request->file('file');
            $nombre =  $this->clean(uniqid()."_".$file->getClientOriginalName());
            \Storage::disk('jobs')->put($nombre,  \File::get($file));

            $submit->file = $nombre;
        }

        $submit->save();



    }
    public function check($any = false){
        $any = $any ? '/' . $any : '/';
        $redirect = Redirect::where('url_from', $any)->where('status',1)->firstOrFail();
        return redirect($redirect->url_to);
    }

    private function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $string)); // Removes special chars.
    }
}
