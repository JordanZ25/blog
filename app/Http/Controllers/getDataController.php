<?php

namespace App\Http\Controllers;

use App\Area;
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
        Session::put('id_area',$val);


        $check = DB::table('Wish')
            ->where('id_area',$val)
            ->where('id_student',Session::get('id'));



        if($check->count()>0){

            return 'Veche ste pratili jelanie';
        }else {


            $area = Area::find($val);
            $towns = Town::where('area_id', $area['id'])->get();


            $chek = Session::get('id');
            if ($chek != 0) {
                return view('wishes/getData')
                    ->with('area', $area)
                    ->with('towns', $towns);
            } else {
                return 'error';
            }
        }
    }
}