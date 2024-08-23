creacion de Eventos

<form action="{{ route('event.store') }}" method="POST">
    @csrf
   <label for="name">Nombre:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="date">Fecha:</label>
    <input type="date" id="date" name="date"><br><br>

    <label for="time">Hora:</label>
    <input type="time" id="time" name="time"><br><br>

    <label for="ability">Capacidad:</label>
    <input type="text" id="ability" name="ability"><br><br>

    <select name="place_id">
        <option value="">Selecciona una ubicacion</option>
        @foreach($places as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
  
    <select name="extracurricular_id">
        <option value="">Selecciona una actividad extracurricular</option>
        @foreach($extracurriculars as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    
    <select name="event_type_id">
        <option value="">Selecciona un tipo de evento</option>
        @foreach($eventTypes as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>


    <input type="submit" value="Enviar">
</form>