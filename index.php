<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--Emoticonos-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <title>Conversor de Monedas</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        $(document).ready(function() {
			$('#convertir').click(function() {
				var cantidad =	$('#cantidad').val();
				var origen =	$('#origen').val();
                var destino =	$('#destino').val();
                
			$.ajax({
				data:  {
							'cantidad' : cantidad,
							'origen' : origen,
							'destino' : destino
						},
				url:   'conversor.php',
				dataType: 'html',
				type:  'post',
				beforeSend: function () {
					//antes de enviar la petición al fichero PHP, mostramos mensaje
					$("#resultado").html("Déjame pensar un poco...");
				},
				success:  function (response) {
					//mostramos salida del PHP
					$("#resultado").html(response);
					
				}
				});
		
			}); // Fin click button
		}); // Fin document ready
    </script>
</head>
<body>
    <div class="container">

        <div class="row justify-content-center bg-primary text-white">
            <h1 >Conversor de Monedas</h1>
        </div>

        <div class="row justify-content-center bg-light text-dark">
            <h5>Elija las divisas para realizar la conversión de la cantidad deseada.</h5>
        </div>

        <div class="row justify-content-center bg-light text-dark">

            <div class="col">
                Introduzca cantidad:
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="em em-dollar" aria-role="presentation" aria-label="BANKNOTE WITH DOLLAR SIGN"></i></span>
                    </div>
                    <input type="number" id="cantidad" class="form-control" value=10>
                </div>
            </div>

            <div class="col">
                Seleccione moneda de origen:
                
                <select id="origen" class="form-control">
                    <?php
                        require("conversor.php");
                        obtenerDivisas();
                    ?>
                </select>
            </div>

            <div class="col">
                Seleccione moneda de destino:
                <select id="destino" class="form-control">
                    <?php
                        obtenerDivisas();
                    ?>
                </select>
            </div>

        </div>

        <div class="row justify-content-center bg-light text-dark">
            <input type="button" id="convertir" class="form-control btn btn-danger" value="Cambiar">
        </div>

        <div class="card-footer">

            <div id="resultado" class="justify-content-center">
                Seleccione cambio...
            </div>
            
        </div>

    </div>
</body>
</html>