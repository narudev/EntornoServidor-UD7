<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTORNO SERVIDOR - PRACTICA 7</title>

    <style>
        body{
            font-family: Verdana, sans-serif;
        }
        table,td,th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        th,td {
            padding: 15px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <?php

    //CONNECT
    $conexion = new mysqli("localhost", "root", "", "paises");

    //CONTROLAR ERROR AL CONECTAR
    if ($conexion->connect_errno) {

        echo "Fallo la conexion " . $conexion->connect_errno;
    }

    //CONTROLAR ACENTOS LATINOS
    $conexion->set_charset("utf-8");

    //QUERY
    $sql = "SELECT * FROM PAIS";

    //RESULSET
    $resultado = $conexion->query($sql);

    echo "<h1>UD7 - PAISES</h1>";
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CONTINENTE</th>
          </tr>";

    //RECORRER RESULTADOS
    while ($fila = $resultado->fetch_assoc()) {

        echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila['CONTINENTE'] . "</td>";
        echo "</tr>";

        //echo "<br>";
    }
    echo "</table>";
    
    $conexion->close(); //CERRAMOS CONEXION

    ?>
</body>

</html>