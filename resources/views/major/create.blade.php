CREACION DE CARRERAS 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
    <div class="rom">
        <div class="col-lg-6">
            otro div
        </div>
        <div class="col-lg-6" >
    
            <form action="{{ url('major') }}" method="POST">
                @csrf
                @include('major.form',['modo'=>'Registrar'])
            </form>
        </div>
    
    </div>

</body>
</html>

