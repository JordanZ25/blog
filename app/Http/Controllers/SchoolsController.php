<?php

namespace App\Http\Controllers;

use App\Schools;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SchoolsController extends Controller
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
        $schoolId = Session::get('id_school');

        $schoolInfo = Schools::find($schoolId);





        return view('schools.schools')
            ->with('SchoolInfo',$schoolInfo);

    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,array(
            'fullName'=> 'required',
            'EGN'=>'required|max:10',
            'town'=>'required'

        ));

        $student = new students();

        $student->fullName = $request->fullName;
        $student->EGN = $request->EGN;
        $student->town = $request->town;


        $student->save();


        $studentId = students::where('fullName',$request->fullName)->pluck('id')->toArray();
        return redirect()->route('grades.create',['id' => $studentId[0]]);


        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
