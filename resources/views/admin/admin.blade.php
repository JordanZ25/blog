<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create New xPost</title>

    <!-- Fonts -->
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }


    </style>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <script>
        function getTown(val) {
            $.ajax({
                type: "get",
                url:'/admin/admin',
                data:'id='+val,
                success: function(data){

                    $("#schools").html(data);

                }
                //ТОВА ИЧ НЕ ГО ПИПАЙ... ЕДВА СЪМ ГО ЗАКРЕПИЛ
                //ne dava da se stiga do /getData
            });

        }

    </script>


    <script>
        function getStudents(val) {
            $.ajax({
                type: "get",
                url:'/admin/admin/students',
                data:'id='+val,
                success: function(data){

                    $("#students").html(data);

                }
                //ТОВА ИЧ НЕ ГО ПИПАЙ... ЕДВА СЪМ ГО ЗАКРЕПИЛ
                //ne dava da se stiga do /getData
            });

        }

    </script>


</head>
<body>






<label>town</label>
<select name="towns" id="towns-list" onChange="getTown(this.value)">

    <option value="0">town</option>


    @foreach($towns as $town)
        <option value="{{$town->id}}" href="#">{{$town->town}}</option>

    @endforeach
</select>

<br>
{{$i=0}}




<div id="schools">

</div>
<div id="students">

</div>



<input type="button" value="Click Me!" onclick="submitForms()" />

</body>
</html>
