<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create New Post</title>

    <!-- Fonts -->


</head>
<body>

<h1>Create New Post</h1>

{!! Form::open(array('route'=>'posts.store')) !!}
    {{Form::label('title','Title:')}}
    {{Form::text('title',null )}}

    {{Form::label('body','Post body:')}}
    {{Form::textarea('body',null)}}

    {{Form::submit('Create Post')}}

{!! Form::close() !!}

</body>
</html>
