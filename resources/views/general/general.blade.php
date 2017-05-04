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
{{$studentInfo->id}}
<br>
{{$studentInfo->fullName}}
<br>
{{$studentInfo->town}}
<br>
<br>

@for($i=0;$i<count($wishes);$i++)

<h3 align="center">{{$area[$i]->areaName}}</h3>
<table  style="width:100%" >
<tr>
    <th>Град</th>
    <th>Училище</th>
    <th>Специалност</th>

</tr>

    @for($j=1;$j<=12;$j++)
    <tr>
             @if (isset( ${'town'.$j}[$i]->town))
                    <td> {{ ${'town'.$j}[$i]->town}}</td>
                @else
                    <td> none </td>
                @endif


                @if (isset( ${'profile'.$j}[$i]->profile))
                    <td> {{ ${'profile'.$j}[$i]->schoolName}}</td>
                @else
                    <td> none </td>
                @endif

                @if (isset(${'profile'.$j}[$i]->profile))
                    <td> {{${'profile'.$j}[$i]->profile}}</td>
                @else
                    <td> none </td>
                @endif
                <td>
                    <a href="{{$j}}/{{$area[$i]->id}}/edit">Edit</a>
                    {!! Form::open(['route'=>['wishes.destroy',$wishes[$i]->id],'method'=>'DELETE']) !!}

                    <input name="val" type="hidden" value="{{$j}}">

                    {!! Form::submit('Delete')!!}
                    {!! Form::close() !!}
                </td>


    </tr>
@endfor

</table>
@endfor

