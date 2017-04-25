<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Schools</title>

    <!-- Fonts -->


</head>
<body>

<h1>Enter</h1>

{!! Form::open(array('route'=>'loginSchools.store')) !!}
{{Form::label('id','ID:')}}
{{Form::number('id',null )}}
<br>
{{Form::label('name','Name:')}}
{{Form::text('name',null)}}
<br>
{{Form::label('town','Town:')}}
{{Form::text('town',null)}}
<br>

{{Form::label('password','Password:')}}
{{Form::text('password',null)}}
<br>

{{Form::submit('Log In ')}}

{!! Form::close() !!}

</body>
</html>
