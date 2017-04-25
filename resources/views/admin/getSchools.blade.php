





    <select name="schools" id="schools" onChange="getStudents(this.value)">
        <option value="0">Select Profile</option>
        @foreach($schools as $school)
            <option value="{{$school->id}}">{{$school->name}}</option>

        @endforeach

    </select>
    <br>


