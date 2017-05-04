<option value="0">Select Profile</option>

@foreach($profiles as $profile)
    <option value="{{$profile->id}}">{{$profile->schoolName}} | {{$profile->profile}}</option>

@endforeach