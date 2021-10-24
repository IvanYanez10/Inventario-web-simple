<?php
  include "includes/db.php";
  include "includes/header.php";
  if(isset($_POST['create_user'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['user_password']);
   register_user($username, $password);
  }
?>

<div class="container">
<form class="form-signin" action="" method="post" enctype="multipart/form-data" role="form" autocomplete="off">

      <div class="form-group">
          <input type="text" placeholder="Usuario" class="form-control" name="username">
      </div>

      <div class="form-group">
          <input type="password" placeholder="Contraseña" class="form-control" name="user_password">
      </div>

       <div class="form-group">
          <button name="create_user"  class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      		<p class="mt-5 mb-3 text-muted">Aplicacion© 2020</p> 
      </div>

</form>
</div>

<!-- footer -->
<?php include "includes/footer.php";?>
