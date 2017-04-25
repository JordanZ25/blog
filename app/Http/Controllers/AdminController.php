<?php

namespace App\Http\Controllers;

use App\Town;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){

        $towns = Town::all();


        return view('admin.admin')
            ->with('towns',$towns);
    }
}
