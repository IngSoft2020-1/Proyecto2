<!--Despues de dar "iniciar sesion" en login.php, nos manda a esta pagina
    donde solo valida que en verdad exista el usuario y nos regresa un valor SESSION
	el cual nos permite ver un mensaje dependiendo si se pudo o no iniciar secion-->
<?php
	require 'conexion.php';
	session_start();
	$_SESSION['cual'] = '';
	/*Conexion de DB*/

	/*Busca que exista el usuario*/
	$registros=mysqli_query($conexion,"select TipoUsuario, ID 
	                        from usuario where Correo='$_REQUEST[usuario]' and Clave='$_REQUEST[clave]'") or
	  die("Problemas en el select:".mysqli_error($conexion));

	$resultado = mysqli_num_rows($registros); /*Se almacena la cantidad de rows que se encontraron con esos datos en la DB*/
	$res = mysqli_fetch_array($registros); /*Se almacena los datos encontrados de la DB*/

	if($resultado > 0) /*Si se encontro el usuario y la contrasena redirecciona*/
	{
		$_SESSION['error'] = '0';
		if($res['TipoUsuario']=="S") /*En mi tabla tengo un campo como admin, el cual se guarda un si o un no, dependiendo si eres admin*/
		{
			$_SESSION['cual'] = $res['ID'];
			header("location:index.php"); /*Te redirecciona a la pagina de admin*/
		}
		else{
			/* header("location:index.php"); Te redirecciona a la pagina de Admin*/
			$_SESSION['corn'] = $_REQUEST['usuario'];
			$_SESSION['error'] = '1';
			header("location:login.php"); /*Regresa al login*/
		}
	}
	else{ /*Si no se encontro el usuario y la contrasena redirecciona*/
		$_SESSION['corn'] = $_REQUEST['usuario'];
		$_SESSION['error'] = '1';
		header("location:login.php"); /*Regresa al login*/
	}
	/*Se libera el espacio y cierre de conexion*/
	mysqli_free_result($registros);
	mysqli_close($conexion);
?>