

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
    function getState(val,index) {
        $.ajax({
            type: "get",
            url:'/editAjax',
            data:'id='+val,
            i:index,
            success: function(data){

                $("#profileList"+this.i).html(data);

            }
            //ТОВА ИЧ НЕ ГО ПИПАЙ... ЕДВА СЪМ ГО ЗАКРЕПИЛ

        });

    }

</script>

{!! Form::model($wishId,['route'=>['wishes.update',$wishId[0]],'method'=>'PUT']) !!}
<input name="val" type="hidden" value="{{$val}}">

<select name="Town{{$val}}" id="townList{{$val}}" onchange="getState(this.value,<? echo $val?>)">
    <option value="0">Select Town</option>
    @foreach($towns as $town)
        <option value="{{$town->id}}">{{$town->town}}</option>

    @endforeach

</select>

<select name="profile{{$val}}" id="profileList{{$val}}">
    <option value="0">Select Profile</option>

</select>

<input type="submit" value="submit" name='btnSub' />


{!! Form::close() !!}
