<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    <title> Contacto - Postimpresionismo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="
    sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
</head>

 <body background="" >
 <header class="header container">
 <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">POSTIMPRESIONISMO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="historia.html">Historia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="filosofia.html">Filosofía</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Artistas
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="vangogh.html">Vincent Van Gogh</a></li>
            <li><a class="dropdown-item" href="gauguin.html">Paul Gauguin</a></li>
            <li><a class="dropdown-item" href="cezanne.html">Paul Cézanne</a></li>
            <li><a class="dropdown-item" href="henri.html">Henri de Toulouse-Lautec</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="galeria.html">Galería</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacto.html">Contacto</a>
        </li>
      </ul>
      <form class="d-flex" action="resultados_buscar.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
    </header>

    <section>
      <?php
  include('conexion.php');

  $buscar = $_POST['buscar'];
  echo "Su consulta: <em>".$buscar."</em><br>";

  $consulta = mysqli_query($conexion, "SELECT * FROM artistas WHERE nombre LIKE '%$buscar%' OR apellido LIKE '%$buscar%' ");
?>

<article style="width:60%;margin:0 auto; border: 5px solid #a6431b; padding:10px; margin-bottom: 10px;">

      <p>Cantidad de Resultados: 
  <?php
    $nros=mysqli_num_rows($consulta);
    echo $nros;
  ?>
  </p>

  <?php
    while($resultados=mysqli_fetch_array($consulta)) {
  ?>
    <p>
    <?php 
      echo $resultados['nombre'] . " ";
      echo $resultados['apellido'] . "<br>";
      echo $resultados['bio'];
  ?>
    </p>

    <img class="img-fluid w-50 h-50 " src ="<?php echo $resultados['foto']; ?> "> 
    <?php
    }

    mysqli_free_result($consulta);
    mysqli_close($conexion);

  ?>
    

</article>
    </section>

        <footer>
           <div class="container  p-4 text-center">
            <div class="row justify-content-center">
                <div class="col-6">
                    <span>
                        &copy; Todos los derechos reservados <br>
                        Postimpresionismo <br> 2022
                    </span>
                </div>
            </div>
        </div>
    </footer>
  



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>