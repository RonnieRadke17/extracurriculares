<!--form de C y U-->
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
    @endforeach
@endif

<label for="group_name_id">Nombre del Grupo:</label>
<select name="group_name_id">
    @foreach($group_name as $id => $name)
        <option value="{{ $id }}" {{ $group->group_name_id == $id ? 'selected' : '' }}>{{ $name }}</option>
    @endforeach
</select>
<br>
<label for="extracurricular_id">Nombre de la Extracurricular:</label>
<select name="extracurricular_id">
    @foreach($extracurricular as $id => $name)
        <option value="{{ $id }}" {{ $group->extracurricular_id == $id ? 'selected' : '' }}>{{ $name }}</option>
    @endforeach
</select>
<br>
<label for="period_id">Periodo:</label>
<select name="period_id">
    @foreach($period_options as $id => $start_end)
        <option value="{{ $id }}">{{ $start_end }}</option>
    @endforeach
</select>


<!---cuando es el editacion falta poner el status de A/NA y quien la imparte---->




<input type="submit" value="{{$modo}}">