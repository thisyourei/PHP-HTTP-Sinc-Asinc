<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del disco.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
    $disc_code = mysqli_real_escape_string($con,(strip_tags($_POST["code"],ENT_QUOTES)));
	$disc_name = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	$disc_author = mysqli_real_escape_string($con,(strip_tags($_POST["author"],ENT_QUOTES)));
	$stock = intval($_POST["stock"]);
	$price = floatval($_POST["price"]);
	

	// REGISTER
    $sql = "INSERT INTO tbldisc(id, disc_code, disc_name, disc_author, disc_qty, price) VALUES (NULL,'$disc_code','$disc_name','$disc_author','$stock','$price')";
    $query = mysqli_query($con,$sql);
    // if disc
    if ($query) {
        $messages[] = "El disco ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>