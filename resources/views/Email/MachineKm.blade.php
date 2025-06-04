<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Atención: Máquina alcanzó 100.000 km</h1>
        <p>La máquina con número de serie: <strong>{{ $machine->serial_number }}</strong> ha alcanzado los {{ $machine->kilometers }} km.</p>
        <p>Modelo: {{ $machine->model }}</p>
    </div>    

</body>
</html>