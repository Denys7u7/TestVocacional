<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/3521a2d66a.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.4/dist/sweetalert2.all.min.js"></script>
    </head>
<body id="body">
    <div class="ayuda">
        <a onclick="ayuda()"><i class="fas fa-info-circle"></i><br>Ayuda</a>
    </div>
    <?php
        $json = file_get_contents("json/preguntas.json");
        $preguntas = json_decode($json, true);
        shuffle($preguntas);
        $limite = count($preguntas);
    ?>

    <div class="contenido" id="contenido">
        <header>
            <div class="bienvenida">
                <h1>TEST VOCACIONAL</h1>
                <hr>
                <p>Insituto Nacional de San Martin</p>
			</div><br><br>
            
        </header>
        <form id="formulario" method="post">
            <div class="nombre">
                <label for="nombre">Nombre: </label>
                <input autocomplete="off" require="true" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre">
                <label for="grupo">Grupo: </label>
                <input autocomplete="on" require="true" type="text" name="grupo" id="grupo" placeholder="Grupo"><br><br>
                <label for="nie">NIE: </label>
                <input autocomplete="off" require="true" type="text" name="nie" id="nie" placeholder="Escribe tu nie">
            </div>
            <?php
                for($i = 0; $i<$limite; $i++){
                    echo "<div class=pregunta>";
                    echo '<input type="checkbox" name="'.$preguntas[$i]['id'].'" id="'.$preguntas[$i]['id'].'">
                    <label for="'.$preguntas[$i]['id'].'">'.$preguntas[$i]['pregunta'].'</label><br>';
                    echo "</div>";
                }
            ?>
            <br><br>
            <input type="hidden" name="finalizar" value="x">
            <input id="finalizar" type="submit" value="Finalizar" name="finalizar"/>
        </form>
    </div>

</body>
<script>
    $("#finalizar").on("click",function(event){
        event.preventDefault();
    });

    function ayuda(){
        Swal.fire({
        title: '<h2 class="notificacion">Informacion</h1>',
        type: 'info',
        html:
            '<div class="notificacion"><h2>Objetivo</h2><hr>' +
            '<p>Facilitar la toma de decisiones al egresado de noveno grado permitiendole elegir la modalidad de bachillerato que mas se ajuste a sus capacidades, habilidades, garantizándole el éxito academico y personal</p>' +
            '<br><h2>Instrucciones</h2><hr>' + 
            '<p>1. Lee detenidamente cada una de las actividades.</p>' +
            '<p>2. Selecciona con un clic para indicar que si te sientes identificado, si marcas por error puedes descarmar con un clic</p>' +
            '<p>3. En general no existe respuestas correctas o incorrectas, lo importante es que contestes con sinceridad y confianza para que puedas conocer mejor tus intereses vocacionales</p></div>',
        showCloseButton: true,
        focusConfirm: false,
        confirmButtonText:
            'Entendido',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        })
    };

    ayuda();

    
</script>
<script>
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'boton-finalizar',
            cancelButton: 'boton-cancelar'
        },
        buttonsStyling: false
        })

        function alerta(){
            if($("#nombre").val() != ""){
                if($("#grupo").val() != ""){
                    if($("#nie").val() != ""){
                        var ajax = $.ajax({
                            data: $("#formulario").serialize(),
                            url: "php/respuesta.php",
                            type: 'POST',
                            success: function (data){
                                $('#contenido').html(data);
                            },
                            error: function(response, status, error){
                                alert("No se pudo encontrar");
                            }
                        })
                    } else{
                        swalWithBootstrapButtons.fire({
                            title: 'NIE vacio',
                            text: "El campo del nie no puede quedar vacio",
                            type: 'error',
                            confirmButtonText: 'OK',
                        })
                    }
                } else{
                    swalWithBootstrapButtons.fire({
                        title: 'Grupo vacio',
                        text: "El campo del grupo no puede quedar vacio",
                        type: 'error',
                        confirmButtonText: 'OK',
                    })
                }
            } else{
                swalWithBootstrapButtons.fire({
                    title: 'Nombre vacio',
                    text: "El campo del nombre no puede quedar vacio",
                    type: 'error',
                    confirmButtonText: 'OK',
                })
            }
        }

    $(function (){
        var boton = $('#finalizar');
        boton.on('click', function(){
            
            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Finalizar',
                text: "¿Seguro que ya terminaste el test?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, estoy seguro',
                cancelButtonText: 'No, cancelar',
                reverseButtons: true
                }).then((result) =>{
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            alerta()
                        )
                    } else if (
                    result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelado',
                            'Imagina hubieras finalizado sin terminar :)',
                            'error'
                        )
                    }
                });
        });
    });
    </script>
</html>

