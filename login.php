<?php
	include "includes/db.php";
	include "includes/header.php";
	checkIfUserIsLoggedInAndRedirect('http://localhost/admin/inventario.php');
	if(isset($_POST['login'])){
		$username = trim($_POST['username']);
    	$password = trim($_POST['password']);
		login_user($username, $password);
	}
?>
<!--  -->
<div class="container">
	<form class="form-signin" role="form" autocomplete="off" class="form" method="post">
		<img class="mb-4" src="images/logo-2.png" alt="" >

		<h1 class="h3 mb-3 font-weight-normal">Iniciar sesion</h1>

			<label for="inputEmail" class="sr-only">Usuario</label>
			<input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required="" autofocus="" name="username">

			<label for="inputPassword" class="sr-only">Contraseña</label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="" name="password">

			<div class="checkbox mb-3"></div>
			<button name="login"  class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
		<p class="mt-5 mb-3 text-muted">Aplicacion© 2020</p>
	</form>
</div>

<!-- footer -->
<?php include "includes/footer.php";?>
<?php
ob_end_flush();
?>
