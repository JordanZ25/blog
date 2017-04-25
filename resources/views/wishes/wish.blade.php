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
        function getState(val) {
            $.ajax({
                type: "get",
                url:'/get',
                data:'id='+val,
                i:val,
                success: function(data){

                            $("#Profiles"+this.i).html(data);

                }
                //ТОВА ИЧ НЕ ГО ПИПАЙ... ЕДВА СЪМ ГО ЗАКРЕПИЛ
                //ne dava da se stiga do /getData
            });

        }

    </script>


</head>
<body>
<h1>{{Session::get('id')}}</h1>
<h1>{{$info->fullName}}</h1>
<h1>{{$info->town}}</h1>


<table>

    <tr>
        <th>Матура по Математика</th>
        <th>Матура по Български Език</th>
        <th>Български Език</th>
        <th>Математика</th>

    </tr>

    <tr>
        <td>
            {{$grades[0]->mathExam}}
        </td>

        <td>
            {{$grades[0]->math}}
        </td>

        <td>
            {{$grades[0]->bgExam}}
        </td>

        <td>
            {{$grades[0]->bg}}
        </td>



    </tr>


</table>







@foreach($towns as $town)



        <a href="/get?id={{$town->id}}" target="_blank">{{$town->town}}</a>





    <br>
@endforeach



<div id="Profiles1">
</div>
<div id="Profiles2">
</div>

<a href="{{$info->id}}">click</a>

</body>
</html>
