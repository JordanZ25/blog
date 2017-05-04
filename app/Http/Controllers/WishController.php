<?php

namespace App\Http\Controllers;
use App\Area;
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
        $areas = Area::all();


           $wishCheck = Wish::where('id_student',$studentId)->get();


        return view('wishes.wish')
            ->with('wishCheck',$wishCheck)
            ->with('areas',$areas)
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
    $wish->id_area = Session::get('id_area');
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

        $areaArr=$wishes->pluck('id_area');

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
            $area[$i] = Area::find($areaArr[$i]);
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



        for($i=0;$i<count($wishes);$i++) {
            for($j=1;$j<=12;$j++) {
                if(isset(${'profile'.$j}[$i]->id_town)) {
                    ${'town' . $j}[$i] = Town::find( ${'profile' . $j}[$i]->id_town);
                }else{
                    ${'town' . $j}[$i] = 0;
                }
            }
        }




//        foreach ($wishes as $wish) {
//            $arr = $wish;
//        }






        return view('general.general')
            ->with('area',$area)
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

            ->with('town1',$town1)
            ->with('town2',$town2)
            ->with('town3',$town3)
            ->with('town4',$town4)
            ->with('town5',$town5)
            ->with('town6',$town6)
            ->with('town7',$town7)
            ->with('town8',$town8)
            ->with('town9',$town9)
            ->with('town10',$town10)
            ->with('town11',$town11)
            ->with('town12',$town12)

            ->with('wishes',$wishes)
            ->with('studentInfo',$studentInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$val)
    {

        $area = Area::find($val);
        $towns = Town::where('area_id', $area['id'])->get();
        $studentId = Session::get('id');
        $wish= DB::table('Wish')
            ->where('id_student',$studentId)
            ->where('id_area',$val)->pluck('id');

        return view('wishes.editWish')
            ->with('wishId',$wish)
            ->with('towns',$towns)
            ->with('val',$id);
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
        $val = $request->val;
        $wish=Wish::find($id);
        $wish -> {'profile_'.$val} = $request -> {'profile'.$val};
        $wish ->save();
        
        return redirect()->route('wishes.show',$wish->id_student);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $val = $request->val;
       $wish = Wish::find($id);
        $idStudent = $wish -> id_student;
        $wish['profile_'.$val]=0;
        $wish->save();
       return redirect()->route('wishes.show',$idStudent);
    }
}
