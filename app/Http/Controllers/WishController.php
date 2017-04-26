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

        $townArr=$wishes->pluck('id_town');

        $arr1=$wishes->pluck('profile_1');
        $arr2=$wishes->pluck('profile_2');
        $arr3=$wishes->pluck('profile_3');
        $arr4=$wishes->pluck('profile_4');
        $arr5=$wishes->pluck('profile_5');
        $arr6=$wishes->pluck('profile_6');
        $arr7=$wishes->pluck('profile_7');
        $arr8=$wishes->pluck('profile_8');
        $arr9=$wishes->pluck('profile_9');
        $arr10=$wishes->pluck('profile_10');
        $arr11=$wishes->pluck('profile_11');
        $arr12=$wishes->pluck('profile_12');


            $profile[]=null;
            for($i=0;$i<count($wishes);$i++) {
            $town[$i] = Town::find($townArr[$i]);
            $profile1[$i] = Profile::find($arr1[$i]);
            $profile2[$i] = Profile::find($arr2[$i]);
            $profile3[$i] = Profile::find($arr3[$i]);
            $profile4[$i] = Profile::find($arr4[$i]);
            $profile5[$i] = Profile::find($arr5[$i]);
            $profile6[$i] = Profile::find($arr6[$i]);
            $profile7[$i] = Profile::find($arr7[$i]);
            $profile8[$i] = Profile::find($arr8[$i]);
            $profile9[$i] = Profile::find($arr9[$i]);
            $profile10[$i] = Profile::find($arr10[$i]);
            $profile11[$i] = Profile::find($arr11[$i]);
            $profile12[$i] = Profile::find($arr12[$i]);
    
            }




//        foreach ($wishes as $wish) {
//            $arr = $wish;
//        }






        return view('general.general')
            ->with('town',$town)
            ->with('profile1',$profile1)
            ->with('profile2',$profile2)
            ->with('profile3',$profile3)
            ->with('profile4',$profile4)
            ->with('profile5',$profile5)
            ->with('profile6',$profile6)
            ->with('profile7',$profile7)
            ->with('profile8',$profile8)
            ->with('profile9',$profile9)
            ->with('profile10',$profile10)
            ->with('profile11',$profile11)
            ->with('profile12',$profile12)
            ->with('wishes',$wishes)
            ->with('studentInfo',$studentInfo);
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
