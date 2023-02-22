<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2> Cuota {{$cuota->id_cuota}}</h2>
    <h4>Datos:</h4>
    <div>
        <label>Cliente:</label>
        <span>{{$cuota->clienteCuota->nombre}}</span>
    </div>
    
    <div>
        <label>Importe:</label>
        <span>{{$cuota->importe}}</span>
    </div>

    <div>
        <label>Concepto:</label>
        <span>{{$cuota->concepto}}</span>
    </div>

    <div>
        <label>Notas:</label>
        <span>{{$cuota->notas}}</span>
    </div>

    <div>
        <label>Fecha emision:</label>
        <span>{{$cuota->fecha_emision}}</span>
    </div>
</body>
</html>
