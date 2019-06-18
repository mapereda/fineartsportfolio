<?php


//nombre
if(!isset($_POST['nombre']) || empty($_POST['nombre'])){

		header('Location:../contacto.html?mens=El campo nombre es necesario');
		exit();

}else{

	$nombre = $_POST['nombre'];
}

//apellidos
if(!isset($_POST['apellidos']) || empty($_POST['apellidos'])){

		header('Location:../contacto.html?mens=El campo apellidos es necesario');
		exit();

}else{

	$apellidos = $_POST['apellidos'];
}


//email
if(!isset($_POST['mail']) || empty($_POST['mail'])){

		header('Location:../contacto.html?mens=El campo email es necesario');
		exit();

}else{

	$mail = $_POST['mail'];
}


//formato de email
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){

	header('Location:../contacto.html?mens=El formato del email no es correcto');
		exit();
}


//comentarios
if(!isset($_POST['comentario']) || empty($_POST['comentario'])){

		header('Location:../contacto.html?mens=El campo comentario es necesario');
		exit();

}else{

	$comment = $_POST['comentario'];
}


/***** PREPARO MI EMAIL ******/


$direccion="dir1@host.com, dir2@host.com";

$asunto = $nombre." se ha puesto en contacto contigo";

$cuerpo= '<html>    
			<head></head>
			<body>
	
				<h1>Mensaje de '.$nombre.' '.$apellidos.'</h1>

				Direccion de contacto: '.$mail.' <br>
				Mensaje: '.$comment.'

			</body>
		  </html>';


		$headers = "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

		//dirección del remitente 
		$headers .= "From: Mi nombre <dir@serv.com>\r\n"; 

		//dirección de respuesta, si queremos que sea distinta que la del remitente 
		$headers .= "Reply-To: dir@serv.com\r\n"; 

		//ruta del mensaje desde origen a destino 
		$headers .= "Return-path: dir@serv.com\r\n"; 



/**** ENVIO EL EMAIL Y REDIRECCIONO ****/

mail($direccion,$asunto,$cuerpo,$headers);

header('Location:../index.html?mens=El email se ha enviado correctamente.');
exit();

?>