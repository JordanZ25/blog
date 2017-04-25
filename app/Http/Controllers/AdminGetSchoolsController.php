<?php

namespace App\Http\Controllers;

use App\Schools;
use Illuminate\Http\Request;

class AdminGetSchoolsController extends Controller
{
    public function admin(Request $request){

   

        $val = $request->id;

        $schools = Schools::where('id_town',$val)->get();


        return view('admin.getSchools')
            ->with('schools',$schools);
    }
}
