mostrar todos los users solo puede verlos el admin ya
mostrar listado de users y con la opcion de show la cual le da todos los detalles
agregar barra de busqueda con autocompletado por medio de nombre o correo

<h2>Administradores</h2>
<ul>
    @foreach($admins as $admin)
        <li>{{ $admin->name }}</li>
        <li>{{ $admin->email}}</li>
        
        
    @endforeach
</ul>


<h2>Externos</h2>
<ul>
    @foreach($externals as $external)
        <li>{{ $external->name }}</li>
    @endforeach
</ul>