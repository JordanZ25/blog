<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class getDataController extends Controller
{
    public function index(Request $request)
    {



        $val = $request->input('id');
        Session::put('id_town',$val);


        $check = DB::table('Wish')
            ->where('id_town',$val)
            ->where('id_student',Session::get('id'));



        if($check->count()>0){

            return 'Veche ste pratili jelanie';
        }else {


            $town = Town::find($val);
            $profiles = Profile::where('id_town', $town['id'])->get();


            $chek = Session::get('id');
            if ($chek != 0) {
                return view('wishes/getData')
                    ->with('town', $town)
                    ->with('profiles', $profiles);
            } else {
                return 'error';
            }
        }
    }
}