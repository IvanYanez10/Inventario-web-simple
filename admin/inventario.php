<?php
  include "includes/inv_header.php";
  include "includes/navigation.php";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom titulo-botones">
    <h1 class="h2">Inventario <span class="badge badge-secondary"><?php echo $_SESSION['username']?></span></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" id="nuevo-producto" class="btn btn-sm btn-outline-primary"><i class="fas fa-plus px-2"></i>Añadir</button>
        <button type="button" id="modifi-producto" class="btn btn-sm btn-outline-info"><i class="fas fa-wrench px-2"></i></i>Modificar</button>
      </div>
    </div>
  </div>

<div class="table-responsive px-10">
  <table class="table table-striped table-sm table-hover table-bordered">

    <thead class="thead-light">
      <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Existencia</th>
        <th>Precio</th>
        <!-- <th>Publicado</th> -->
      </tr>
    </thead>

    <tbody>

      <?php

        $query = "SELECT * FROM inventario";
        $select_productos_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_productos_query)) {
          $inv_id = $row['id_inv'];
          $inv_producto = $row['producto'];
          $inv_cantidad = $row['cantidad'];
          $inv_precio = $row['precio'];
          $inv_publicado = $row['publicado'];

          if ($inv_cantidad == 0) {
            echo "<tr class='table-danger'>";
          }else if ($inv_cantidad < 2){
            echo "<tr class='table-warning'>";
          }else {
            echo "<tr>";
          }
            echo "<td>{$inv_id}</td>";
            echo "<td>{$inv_producto}</td>";
            if ($inv_cantidad == 0) {
              echo "<td style='color:white;'><b>Sin stock</b></td>";
            }else {
              echo "<td>{$inv_cantidad}</td>";
            }
            echo "<td>\${$inv_precio}</td>";
            // echo "<td>{$inv_publicado}</td>";
          echo "</tr>";

        }
      ?>

    </tbody>
  </table>
</div>

<!-- Nuevo producto -->
<div id="contact-popup">
    <form class="pop-form" id="pop-form" method="post" enctype="multipart/form-data" autocomplete="off">

        <h1>Nuevo</h1>

        <input type="text" id="prod-nombre" class="form-control inputBox" placeholder="Producto" name="prod-nombre">

        <div class="">
          <input data-suffix="pzs" id="prod-pzs" type="number" value="" min="0" max="50" step="1" name="prod-pzs"/>
        </div>

        <div class="form-group my-3">
          <div class="">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input type="text" class="form-control" id="prod-precio" placeholder="Precio" name="prod-precio">
            </div>
          </div>
        </div>

        <div class="form-group my-2">
          <select disabled class="custom-select my-1 mr-sm-2" id="prod-publi" name="prod-publi">
            <option selected>Publicado...</option>
            <option value="Ml">Mercado libre</option>
            <option value="SW">Sitio web</option>
            <option value="Local">Solo local</option>
          </select>
        </div>

        <div class="btn-group btn-group-lg" role="group">
          <button type="submit" id="new-btn" name="new-btn" value="Add"  class="btn btn-success">Añadir</button>
          <button id="cancel-btn" class="btn btn-danger">Cancelar</button>
        </div>

    </form>
</div>
<!-- Añadir a DB -->
<?php
  if (! empty($_POST["new-btn"])) {
    $name = trim($_POST["prod-nombre"]);
    $pzs = trim($_POST["prod-pzs"]);
    $precio = trim($_POST["prod-precio"]);
    // $publicacion = trim($_POST["prod-publi"]);
    register_product($name, $pzs, $precio);
  }
?>

<script>
  $(document).ready(function () {
    $("#nuevo-producto").click(function () {
      $("#contact-popup").show();
    });
    $("#cancel-btn").click(function(){
      closeAdd();
    });
    $("#pop-form").on("submit", function () {
      closeAdd();
    });
  });

  $("input[type='number']").inputSpinner();

  function closeAdd(){
    document.getElementById("prod-nombre").textContent = "";
    document.getElementById("prod-pzs").textContent = "";
    document.getElementById("prod-precio").textContent = "";
    $("#contact-popup").hide();
  }

</script>

<!-- footer -->
<?php include "includes/adm_footer.php";?>
<?php
ob_end_flush();
?>
