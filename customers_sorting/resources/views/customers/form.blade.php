<label class="form-label" for="first_name">First Name</label>
<input class="form-input"type="text" name="first_name" id="first_name" value="{{old('first_name', $customer->first_name)}}">
<label for="form-label"for="last_name">Last Name</label>
<input class="form-input"type="text" name="last_name" id="last_name" value="{{old('last_name',$customer->last_name)}}">
<label for="form-label"for="age">Age</label>
<select class="form-select" name="age">
    @foreach (range(18, 100) as $ageOption)
    <option value="{{$ageOption}}" {{in_array($ageOption, [$customer->age, old('age')])  ? 'selected' : ''}}>{{$ageOption}}</option>
    @endforeach
</select>
<label class="form-label" for="address">Address</label>
<input class="form-input"type="text" name="address" id="address" value="{{old('address', $customer->address)}}">
<label for="form-label"for="city">City</label>
<input class="form-input"type="text" name="city" id="city" value="{{old('city',$customer->city)}}">