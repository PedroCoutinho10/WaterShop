<?php

include "conexao.php";

$id = $_GET["id"];
$sql_artigos = mysqli_query($link, "SELECT * FROM artigos");
$sql2 = mysqli_query($link, "SELECT * FROM artigos");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Site para treinar">
  <meta name="author" content="Pedro Coutinho">

  <title>WaterShop</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>


<body>

    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="login.html">Login/Registo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="confirmarLogin.php">Anunciar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="container">

        <div class="row">

          <div class="col-lg-3">

            <h1 class="my-4"> <a href="index.html"> <img src="data/WaterShop.png" height="200" width="200"></a></h1>
            <div class="list-group">
            </div>
          </div>
        </div>

      <!-- Portfolio Item Heading -->
          <?php
while($art = mysqli_fetch_assoc($sql_artigos)) {
          if ($art["idartigos"] == $id) {
          ?>
          <h1 class="my-4"> <?php echo $art["titulo"]; ?></h1>


          <!-- Portfolio Item Row -->
          <div class="row">
              <div class="col-md-8">
                  <?php echo '<img class="img-fluid" src="data:image/jpeg;base64,' . base64_encode($art['imagem1']) . '"/>';
                  ?>
              </div>

              <div class="col-md-4">
                  <h3 class="my-3">Descrição</h3>
                  <p><?php echo $art["descricao"]; ?></p>
                  <h3 class="my-3">Preço</h3>
                  <p><?php echo $art["preco"]; ?>€</p>
              </div>
          </div>
          <!-- /.row -->
          <!-- Related Projects Row -->
          <!-- /.row -->

        <?php
        }
}
          ?>
          <h3 class="my-4">Artigos relacionados</h3>
          <?php
          $j=1;
          while($artigo = mysqli_fetch_assoc($sql2)) {
          if ($artigo["idartigos"] != $id && $j <4){
            $j++;
          ?>
          <div class="card-img">
              <div class="col-md-3 col-sm-6 mb-4" >
                  <?php echo '<img class="img-fluid" class="imagem" src="data:image/jpeg;base64,' . base64_encode($artigo['imagem1']) . '"height="180" width="180"/>';
                  ?>
              </div>
          </div>
      </div>
        <?php
        }
        }
        ?>

    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
