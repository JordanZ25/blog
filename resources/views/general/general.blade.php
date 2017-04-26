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

<h3 align="center">{{$town[$i]->town}}</h3>
<table  style="width:100%" >
<tr>
    <th>Училище</th>
    <th>Специалност</th>

</tr>
    @for($j=1;$j<=12;$j++)
    <tr>

            @if (isset( ${'profile'.$j}[$i]->profile))
                <td> {{ ${'profile'.$j}[$i]->school}}</td>
            @else
                <td> none </td>
            @endif

                @if (isset(${'profile'.$j}[$i]->profile))
                    <td> {{${'profile'.$j}[$i]->profile}}</td>
                @else
                    <td> none </td>
                @endif

    </tr>
@endfor

</table>
@endfor

