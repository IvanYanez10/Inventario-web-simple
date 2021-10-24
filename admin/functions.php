<?php
function redirect($location){
    header("Location:" . $location);
    exit;
}
function isLoggedIn(){
    if(isset($_SESSION['username'])){
        return true;
    }
   return false;
}
function ifItIsMethod($method=null){
    if($_SERVER['REQUEST_METHOD'] == strtoupper($method))
        return true;
    return false;
}
function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
    if(isLoggedIn()){
      redirect($redirectLocation);
    }
}
function register_user($username, $password){
    global $connection;
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    $query = "INSERT INTO usuarios(user, pass)";
    $query .= "VALUES('{$username}', '{$password}')";
    $create_user_query = mysqli_query($connection, $query);
    if(!$create_user_query ) {
      die("QUERY FAILED ." . mysqli_error($connection));
    }
}
function register_product($name, $pzs, $precio){
    global $connection;
    $name = mysqli_real_escape_string($connection, $name);
    $pzs = mysqli_real_escape_string($connection, $pzs);
    $precio = mysqli_real_escape_string($connection, $precio);

    $query = "INSERT INTO inventario(producto, cantidad, precio)";
    $query .= "VALUES('{$name}', '{$pzs}', '{$precio}')";
    $create_user_query = mysqli_query($connection, $query);
    if(!$create_user_query ) {
      die("QUERY FAILED ." . mysqli_error($connection));
    }else {
      header("Refresh: 2");
    }
}
function login_user($username, $password) {
     global $connection;
     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);

     $query = "SELECT * FROM usuarios WHERE user = '{$username}'";

     $select_user_query = mysqli_query($connection, $query);

     if (!$select_user_query)
         die("QUERY FAILED" . mysqli_error($connection));

     while ($row = mysqli_fetch_array($select_user_query)) {
         $db_username = $row['user'];
         $db_user_password = $row['pass'];
         if (password_verify($password, $db_user_password)) {
          $_SESSION['username'] = $db_username;
           header("Location: http://localhost/admin/inventario.php");
         } else {
           return false;
         }
     }
     return true;
 }

?>
