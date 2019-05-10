<?php
session_start();
require 'function.php';


// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }
}


if( isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if( mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember']) ) {
                //buat cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']),time()+60);

            }

            header("location:admin.php");
            exit;
        }
    }

    $error = true;
}

?>


<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        </head>
    <body>
    <div class="container">
       <h1>Login</h1>
    <?php if( isset($error)) : ?>
    <p style="color:red; font-style: italic;">username password salah</p>
<?php endif; ?>
        <img src="../assets/img/login.png">
        <form action="" method="post">
           <ul>
            <p>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </p>
             <p>
                <label for="remember">Remember me :</label>
                <input type="checkbox" name="remember" id="remember"> 
            </p>
            <p>
                <button type="submit" name="login">Login</button>
            </p>
             <p>
               <button  type="submit" name="register"><a href="Registrasi.php">Register!</a></button>

            </p>
        </ul>
        </div>
        </form>

    </body>
</html>