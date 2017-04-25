<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Student</title>

    <!-- Fonts -->


</head>
<body>

<h1>Add new student</h1>

{!! Form::open(array('route'=>'schools.store')) !!}

{{Form::label('name','Name:')}}
{{Form::text('fullName',null)}}

<br>

{{Form::label('town','Town:')}}
{{Form::text('town',null)}}

<br>

{{Form::label('egn','EGN:')}}
{{Form::text('EGN',null)}}
<br>

{{Form::submit('Create Students')}}

{!! Form::close() !!}


</body>
</html>
