<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
    function getState(val,index) {
        $.ajax({
            type: "get",
            url:'/getProfiles',
            data:'id='+val,
            i:index,
            success: function(data){

                $("#profileList"+this.i).html(data);

            }
            //ТОВА ИЧ НЕ ГО ПИПАЙ... ЕДВА СЪМ ГО ЗАКРЕПИЛ

        });

    }

</script>



    {!! Form::open(array('route'=>'wishes.store','class' => 'myForms')) !!}

        @for($j=1;$j<=12;$j++)
        <label id="{{$area->id}}">{{$area->areaName}}</label>





        <select name="Town{{$j}}" id="townList{{$j}}" onchange="getState(this.value,<? echo $j?>)">
            <option value="0">Select Town</option>
            @foreach($towns as $town)
                <option value="{{$town->id}}">{{$town->town}}</option>

            @endforeach

        </select>

        <select name="profile{{$j}}" id="profileList{{$j}}">
            <option value="0">Select Profile</option>

        </select>



        <br>
        <br>
        @endfor


    <input type="submit" value="submit" name='btnSub' />

    {!! Form::close() !!}
