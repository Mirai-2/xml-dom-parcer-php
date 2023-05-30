<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP DOM XML interprete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            background-color: #f1f1f1;
        }

        .lista{
            box-shadow: 5px 5px 5px 5px rgb(0, 0, 0, .1);
        }
        .lista:hover{
            box-shadow: 5px 5px 5px 5px rgb(0, 0, 0, .3);
        }
    </style>
</head>

<body class="container">
    
    <div class="row text-center ">
        <h1>Interprete XML</h1>
        <h3>Información de materias</h3>
        <hr>
        <?php

        // Ruta del archivo XML
        $xmlFile = 'datos.xml';

        // Crear un nuevo objeto DOMDocument
        $dom = new DOMDocument();

        // Cargar el archivo XML
        $dom->load($xmlFile);

        // Obtener el elemento raíz
        $materias = $dom->getElementsByTagName('materias')->item(0);

        // Obtener las materias
        $materiaList = $materias->getElementsByTagName('materia');

        // Iterar sobre las materias
        foreach ($materiaList as $key => $materia) {
            // Obtener los atributos de la materia
            $nombre = $materia->getElementsByTagName('nombre')->item(0)->nodeValue;
            $creditos = $materia->getElementsByTagName('creditos')->item(0)->nodeValue;
            $nivel = $materia->getElementsByTagName('nivel')->item(0)->nodeValue;
            $horas = $materia->getElementsByTagName('horas')->item(0)->nodeValue;

        ?>

            <div class="col-md-4 ">
                <h4>Materia <?=$key +1 ?></h4>
                <ul class="list-group my-4 lista">
                    <li class="list-group-item"><b>Nombre: </b> <?=$nombre ?> </li>
                    <li class="list-group-item"><b>Creditos: </b> <?=$creditos ?> </li>
                    <li class="list-group-item"><b>Nivel: </b> <?=$nivel ?> </li>
                    <li class="list-group-item"><b>Horas: </b> <?=$horas ?> </li>
                </ul>
            </div>


        <?php

        }

        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>