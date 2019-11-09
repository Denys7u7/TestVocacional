<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/3521a2d66a.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.4/dist/sweetalert2.all.min.js"></script>
</head>
<body>

    <?php 

    include_once("informacion.model.php");


    $crud = new InformacionModel();
    $listaInformacion = $crud->allInformacion();
    ?>

    <table>
        <thead>
            <tr>
                <th rowspan='2'>Nombre</th>
                <th rowspan='2'>Grupo</th>
                <th rowspan='2'>NIE</th>
                <th colspan='9' id='puntos'>Puntos</th>
            </tr>
            <tr>
                <th>Contaduria</th>
                <th>Salud</th>
                <th>Turismo</th>
                <th>Infraestructura</th>
                <th>Software</th>
                <th>Logistica y Aduana</th>
                <th>General</th>
                <th>Autoconocimiento</th>
                <th>Relaciones Familiares</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($listaInformacion as $item){?>
            <tr>
                <td><?php echo $item->nombre; ?></td>
                <td><?php echo $item->grupo; ?></td>
                <td><?php echo $item->nie; ?></td>
                <td><?php echo $item->pContaduria; ?></td>
                <td><?php echo $item->pSalud; ?></td>
                <td><?php echo $item->pTurismo; ?></td>
                <td><?php echo $item->pInfra; ?></td>
                <td><?php echo $item->pSoftware; ?></td>
                <td><?php echo $item->pLogistica; ?></td>
                <td><?php echo $item->pGeneral; ?></td>
                <td><?php echo $item->pAutoconocimiento; ?></td>
                <td><?php echo $item->pRelaciones; ?></td>
            </tr>
    <?php } ?>
        </tbody>
    </table>

</body>
</html>