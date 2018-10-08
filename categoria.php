<?php

include "conexao.php";

$sql_categorias = mysqli_query($link, "SELECT * FROM categorias");
$sql_artigos = mysqli_query($link, "SELECT * FROM artigos");
$categoria = $_GET["categoria"];

            $i=0;
            while($cat = mysqli_fetch_assoc($sql_categorias)){
                if($categoria==$cat["tipo"]){
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="login.html">  Login/Registo</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

          <div class="col-lg-3">

          <a href="index.html"><h1 class="my-4"> <img src="data/WaterShop.png" height="200" width="200"></h1></a>
            <div class="list-group">
          </div>

          </div>
          <div class="col-lg-3">
              <?php echo '<img  src="data:image/jpeg;base64,'.base64_encode( $cat['foto'] ).'" height="300" width="800"/>'?>
              <div class="list-group">
              </div>
          </div>
        <!-- /.col-lg-3 -->
          <div class="container-fluid">
              <div class="col-lg-3">
              </div>
          </div>
<?php while($art = mysqli_fetch_assoc($sql_artigos)){
                        if($art["categoria"]==$categoria){

                            ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">

<?php
        echo '<a href="portfolio.php?id='.$art['idartigos'].'"><img  class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $art['imagem1'] ).'" height="180" width="180"/></a>'?>
                  <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $art["titulo"]?></a>
                  </h4>
                  <h5><?php echo $art["preco"]."€"?></h5>
                </div>
              </div>
            </div>
              <?php
            $i++;
            }
                    }
                    if($i==0){
                        echo "Sem artigos para esta categorias!";
                    }
                }
            }
            ?>



          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

<?php
mysqli_close($link);
