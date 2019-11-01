<?php
    include_once("informacion.model.php");

    if(isset($_POST["finalizar"])){
        $crud = new InformacionModel();
        $informacion = array();
        $contaduria = 0;
        $salud = 0;
        $turismo = 0;
        $logistica = 0;
        $infra = 0;
        $general = 0;
        $software = 0;
        $autoconocimiento = 0;
        $relaciones = 0;

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['cont'.$i])){
                $contaduria++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['salu'.$i])){
                $salud++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['tur'.$i])){
                $turismo++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['logi'.$i])){
                $logistica++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['infr'.$i])){
                $infra++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['gene'.$i])){
                $general++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['soft'.$i])){
                $software++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['auto'.$i])){
                $autoconocimiento++;
            }
        }

        for($i = 1; $i <= 10; $i++){
            if(isset($_POST['rela'.$i])){
                $relaciones++;
            }
        }

        $informacion[] = $_POST["nombre"];
        $informacion[] = $_POST["grupo"];
        $informacion[] = $_POST["nie"];
        $informacion[] = $contaduria;
        $informacion[] = $salud;
        $informacion[] = $turismo;
        $informacion[] = $infra;
        $informacion[] = $software;
        $informacion[] = $logistica;
        $informacion[] = $general;
        $informacion[] = $autoconocimiento;
        $informacion[] = $relaciones;

        $crud->addInformacion($informacion);

        $informacion2[] = $contaduria;
        $informacion2[] = $salud;
        $informacion2[] = $turismo;
        $informacion2[] = $infra;
        $informacion2[] = $software;
        $informacion2[] = $logistica;
        $informacion2[] = $general;
        $maximo = max($informacion2);

        if($software == $maximo){
            $resultado = 'Desarrollo de Software';
        } 
        elseif($contaduria == $maximo){
            $resultado = 'Contaduría';
        } 
        elseif($salud == $maximo){
            $resultado  = 'Salud';
        }
        elseif($turismo == $maximo){
            $resultado = 'Turismo';
        }
        elseif($infra == $maximo){
            $resultado = 'Infraestructura';
        }
        elseif($logistica == $maximo){
            $resultado = 'Logistica y Aduana';
        } 
        else{
            $resultado = 'General';
        }

        if($autoconocimiento > 5){
            $mensaje = '<p class="bloque">Posees buenos habitos de estudio <span>¡Sigue asi! :)</span></p><br>';
        } else{
            $mensaje = '<p class="bloque">No posees buenos habitos de estudio <span>¡Intenta mejorarlos!</span></p><br>';
        }
        if($relaciones > 5){
            $mensaje1 = '<p class="bloque">Tienes una buena relacion con tu familia <span>¡Sigue asi! :)</span></p><br>';
        } else{
            $mensaje1 = '<p class="bloque">No tienes una buena relacion familiar <span>¡Intenta mejorarla! :(</span></p><br>';
        }
        
?>

<div class="contenido2">
    <div class="resultados">
        <div class="title">
            <p><span>RESULTADOS</span></p><br>
            <hr><br>
            <p>El alumno <span><?php echo $_POST["nombre"] ?></span>
            que pertenece al grupo <span><?php echo $_POST["grupo"] ?></span> a obtenido el siguiente puntaje</p>
        </div>
        <p class="bloque">Se te recomienda que te inclines por: <span><?php echo $resultado ?></span></p>
        <?php echo $mensaje;?>
        <?php echo $mensaje1;?>
        <br>
        <a href="index.php">Aceptar</a>
    </div>
</div>
<?php }?>