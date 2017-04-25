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

@if(Session::has('title'))

    <strong>Title:</strong>{{Session::get('title')}}

@endif

</body>
</html>
