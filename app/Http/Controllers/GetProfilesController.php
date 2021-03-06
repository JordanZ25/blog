<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GetProfilesController extends Controller
{
    public function index(Request $request)
    {


        $val = $request->input('id');
        
        
            $town = Town::find($val);
            $profiles = Profile::where('id_town', $town['id'])->get();


            $chek = Session::get('id');
            if ($chek != 0) {
                return view('wishes/getProfiles')
                    ->with('town', $town)
                    ->with('profiles', $profiles);
            } else {
                return 'error';
            }
        
    }
}
