<!--form de C y U-->
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif


<input type="text" name="name" value="{{ $extracurricular->name ?? '' }}">
<label for="category_id">Categoría:</label>
    <select name="category_id">
        @foreach($categories as $id => $name)
            <option value="{{ $id }}" {{ isset($extracurricular) && $extracurricular->categories_id == $id ? 'selected' : '' }}>{{ $name }}</option>
        @endforeach
    </select>
<input type="submit" value="{{$modo}}">