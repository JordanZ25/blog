



    {!! Form::open(array('route'=>'wishes.store','class' => 'myForms')) !!}

        @for($j=1;$j<=12;$j++)
        <label id="{{$town->id}}">{{$town->town}}</label>





        <select name="profile{{$j}}" id="profileList{{$j}}">
            <option value="0">Select Profile</option>
            @foreach($profiles as $profile)
                <option value="{{$profile->id}}">{{$profile->school}} | {{$profile->profile}}</option>

            @endforeach

        </select>
        <br>
        <br>
        @endfor


    <input type="submit" value="submit" name='btnSub' />

    {!! Form::close() !!}
