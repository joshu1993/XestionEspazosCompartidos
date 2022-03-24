<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p>Hola {{ $data['user_nombre'] }}</p>
     <p>Se ha registrado una reserva en {{ $data['sala_nombre'] }}.</p>
    <p>Estos son los datos de la reserva realizada:</p>
    <ul>
        <li><b>Título reserva:</b> {{$data['title']}}</li>
        <li><b>Fecha y hora inicial:</b> {{$data['start']}}</li>
        <li><b>Fecha y hora final:</b> {{$data['end']}}</li>
        <li><b>Nombre sala:</b> {{$data['sala_nombre']}}</li>
    </ul>
    <p>El día de la reserva pase por conserjería 5 min antes para mostrar el dni y recoger la llave del {{ $data['sala_nombre'] }}. </p>
    <p>Un saludo.</p>
    <p>Escuela Superior de Ingeniería Informática</p>
</body>
    
</html>