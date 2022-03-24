<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <p>Hola {{ $data['name'] }}</p>
     <p>Para poder entrar en XEC tendras que utilizar los siguientes datos:</p>
    
    <ul>
        <li><b>Email:</b> {{$data['email']}}</li>
        <li><b>Contraseña:</b> {{$data['password']}}</li>
        
    </ul>
    <p>Si quiere cambiar alguno de los datos lo podrá hacer desde dentro entrando en el apartado {{ $data['name'] }} </p>
    <p>Un saludo.</p>
    <p>Escuela Superior de Ingeniería Informática</p>
</body>
    
</html>