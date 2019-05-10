<?php
require 'function.php';

if (isset($_GET['cari'])){
    $keyword = $_GET['s'];
    $mobil = query("SELECT * FROM daftar_mobil WHERE
        id LIKE '%$keyword%' OR
        gambar LIKE '%$keyword%' OR
        nama LIKE '%$keyword%' OR
        merk LIKE '%$keyword%' OR
        bbm LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'");

}else{
    $mobil = query("SELECT * FROM daftar_mobil");
}
?>

<html>
    <head>
        <title></title>
    </head>
    <style>
      body {
            background-image: url(../assets/img/bg.png);
        }
        .container {
            width: 700px;
            height: 615px;
            margin-left: 250px;
            padding-top: 2px;
            background-color: gainsboro;
        }
        table{
            font-size : 15px;
            width: 600px; 
        }

        td{
            padding : 2px;
        }
        h3{
            text-align : center;
            font-size : 30px;
            padding-top: 5px;
        }
        th {
            font-size: 25px;
        }
        a {
            font-size: 17px;
        }
        button {
            background-color: salmon;
            border-radius: 5px;
        }

    </style>
    <body>
<button><a href="login.php">Log In</a></button>

        <div class="container">
        <h3>Daftar Mobil</h3>
    <table text align="center">
       
          <?php foreach ($mobil as $m) : ?>
             <tr>
                <td><a href="index3.php?id=<?= $m['id']; ?>"><?= $m['nama']; ?></a></td>
            </tr>
            <td></td>
            <?php endforeach ?>
        </table>
        </div>

    </body>
</html>