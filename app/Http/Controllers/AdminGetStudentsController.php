<?php

namespace App\Http\Controllers;

use App\Profile;
use App\students;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminGetStudentsController extends Controller
{


    public function admin(Request $request){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'Proekt';
        $con = mysqli_connect($host,$user,$pass,$db);
        mysqli_set_charset($con, "utf8");

        $idSchool = $request->id;
        $querySchool = $con->query("SELECT * FROM profile WHERE id_school = '$idSchool'");


        foreach($querySchool as $profiles) {


            $idProfile = $profiles['id'];

            $queryWish = $con->query("SELECT id_student FROM Wish WHERE profile_1 = '$idProfile' OR profile_2 = '$idProfile'
                                           OR profile_3 = '$idProfile' OR profile_4 = '$idProfile'
                                           OR profile_5 = '$idProfile' OR profile_6 = '$idProfile'
                                           OR profile_7 = '$idProfile' OR profile_8 = '$idProfile'
                                           OR profile_9 = '$idProfile' OR profile_10 = '$idProfile'
                                           OR profile_11 = '$idProfile' OR profile_11 = '$idProfile'
");


            foreach ($queryWish as $wish) {
                $idStudent = $wish['id_student'];

                $queryStudent = $con->query("SELECT * FROM students WHERE id='$idStudent'");

                $row = $queryStudent->fetch_assoc();
                echo  $row['fullName'];
                echo '<br>';


            }
        }
    }










//    public function admin(Request $request){
//        $val = 1;
//$i=0;
//        $j=0;
//        $profiles = Profile::where('id_school',$val)->get();
//        foreach ($profiles as $profile) {
//
//
//
//                $students[$j] = Wish::
//                where('profile_1', $profile->id)
//                    ->orWhere('profile_2', $profile->id)
//                    ->orWhere('profile_3', $profile->id)
//                    ->orWhere('profile_4', $profile->id)
//                    ->orWhere('profile_5', $profile->id)
//                    ->orWhere('profile_6', $profile->id)
//                    ->orWhere('profile_7', $profile->id)
//                    ->orWhere('profile_8', $profile->id)
//                    ->orWhere('profile_9', $profile->id)
//                    ->orWhere('profile_10', $profile->id)
//                    ->orWhere('profile_11', $profile->id)
//                    ->orWhere('profile_12', $profile->id)->get();
//
//            foreach ($students as $student) {
//
//                $studentsInfo[$i] = students::find($student);
//                $i++;
//
//            }
//            $j++;
//
//
//
//        }
//
//        return view('admin.getStudents')->with('students',$studentsInfo[1])
//            ->with('i',$i);
//









//        return view('admin.getStudents')
//            ->with('profile',1);



}
