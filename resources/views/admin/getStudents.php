<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'Proekt';
$con = mysqli_connect($host,$user,$pass,$db);

$idSchool = $_GET['id'];
$querySchool = $con->query("SELECT * FROM profile WHERE id_school = '$idSchool'");


foreach($querySchool as $profiles) {

    echo '<h4>'.$profiles['profile'] .' </h4>';

    $idProfile = $profiles['id'];

    $queryWish = $con->query("SELECT id_student FROM wish WHERE 1_profile = '$idProfile' OR 2_profile = '$idProfile'
                                           OR 3_profile = '$idProfile' OR 4_profile = '$idProfile'
                                           OR 5_profile = '$idProfile' OR 6_profile = '$idProfile'
                                           OR 7_profile = '$idProfile' OR 8_profile = '$idProfile'
                                           OR 9_profile = '$idProfile' OR 10_profile = '$idProfile'
                                           OR 11_profile = '$idProfile' OR 11_profile = '$idProfile'
");


    foreach ($queryWish as $wish) {
        $idStudent = $wish['id_student'];

        $queryStudent = $con->query("SELECT * FROM students WHERE id='$idStudent'");

        $row = $queryStudent->fetch_assoc();
        echo  $row['fullName'];
        echo '<br>';

    }
}