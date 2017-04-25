<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Grades</title>

    <!-- Fonts -->


</head>
<body>


<h1>{{$info->fullName}}</h1>
<h1>{{$info->town}}</h1>


<h1>Добавете Оценки:</h1>

{!! Form::open(array('route'=>'grades.store')) !!}

<input type="hidden" value="{{$info->id}}" name="id_student" />


{{Form::label('mathExam','Оценка от матура по Математика:')}}
{{Form::text('mathExam',null)}}

<br>

{{Form::label('math','Оценка по Математика:')}}
{{Form::text('math',null)}}

<br>

{{Form::label('bgExam','Оценка от матура по Български Език:')}}
{{Form::text('bgExam',null)}}
<br>
{{Form::label('bg','Оценка по Български Език:')}}
{{Form::text('bg',null)}}

{{Form::submit('Добавяне на оценки')}}

{!! Form::close() !!}


</body>
</html>
