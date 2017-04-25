<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Students</title>

    <!-- Fonts -->


</head>
<body>

<h1>Enter</h1>

{!! Form::open(array('route'=>'login.store')) !!}
{{Form::label('id','ID:')}}
{{Form::number('id',null )}}

{{Form::label('name','Name:')}}
{{Form::text('fullName',null)}}

{{Form::label('egn','EGN:')}}
{{Form::text('EGN',null)}}

{{Form::submit('Create Post')}}

{!! Form::close() !!}

</body>
</html>
