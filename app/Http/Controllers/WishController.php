<?php

namespace App\Http\Controllers;
use App\grades;
use App\Profile;
use App\students;
use App\Town;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
class WishController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $studentId = Session::get('id');

        $studentsInfo =students::find($studentId);
        $gradesInfo = grades::where('id_student',$studentId)->get();
        $towns = Town::all();


           $wishCheck = Wish::where('id_student',$studentId)->get();


        return view('wishes.wish')
            ->with('wishCheck',$wishCheck)
            ->with('towns',$towns)
            ->with('info',$studentsInfo)
            ->with('grades',$gradesInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




    $wish = new Wish();

    $wish->id_student = Session::get('id');
    $wish->id_town = Session::get('id_town');
    $wish->profile_1 = $request->profile1;
    $wish->profile_2 = $request->profile2;
    $wish->profile_3 = $request->profile3;
    $wish->profile_4 = $request->profile4;
    $wish->profile_5 = $request->profile5;
    $wish->profile_6 = $request->profile6;
    $wish->profile_7 = $request->profile7;
    $wish->profile_8 = $request->profile8;
    $wish->profile_9 = $request->profile9;
    $wish->profile_10 = $request->profile10;
    $wish->profile_11 = $request->profile11;
    $wish->profile_12 = $request->profile12;

    $wish->save();

        if(isset($_POST['btnSub']))
            echo "<script>window.close();</script>";
        return 'stop';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishes = Wish::where('id_student',$id)->get();

        $studentInfo = students::find($id);
        $profile[]= null;
        $i = 0;
        foreach ($wishes as $wish){

            $profile[$i]=$wish;
            $i++;
        }



        $profil_2 = $profile[0]->profile_2;
        $profile_1=Profile::find($profil_2);




        return view('general.general')
            ->with('profile_1',$profile_1)
            ->with('wishes',$wishes)
            ->with('studentInfo',$studentInfo)
            ->with('profile',$profile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
