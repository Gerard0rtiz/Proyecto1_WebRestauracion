<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Home Restaurante Karting Vendrell</title>

  <meta charset="UTF-8">
  <meta name="description" content="Descripció web">
  <meta name="keywords" content="Paraules clau">
  <meta name="author" content="Autor">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
  <!--HEADER-->
  <?php
  include_once "header.php";
  ?>

  <!--SLIDE IMÁGENES-->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="bg-image" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../assets/images/imgSlide1.jpg');">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>TERRAZA ASOMBROSA</h5><br>
          <p>Disfruta del buen tiempo en nuestra estupenda terraza con vistas al circuito</p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="bg-image" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../assets/images/slideImage4.jpg');">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>BUENA COMIDA</h5><br>
          <p>Tendrás una experiencia estupenda con nuestra comida y bebida</p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="bg-image" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('../assets/images/slideImage3.jpg');">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>EXPERIENCIA INOLVIDABLE</h5><br>
          <p>Con nuestras instalaciones disfrutarás de momentos únicos</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--SECCIÓN INFO SITIO + CONTACTAR-->
  <div class="section2">
    <div class="contact-us">
      <div class="text-ct-us">
        <h2>¿PREPARADO PARA DISFRUTAR DEL KARTING EN BARCELONA CON UNA COMIDA EXCELENTE?</h2><br>
        <p>Bar-restaurante Karting Vendrell ofrece una experiencia excelente a la hora de comer después de una dura
          carrera en nuestro Karting, y no solamente hablamos a nivel nacional,
          sino a nivel Europeo.
          ¡Y lo mejor es que nos encontramos a solamente 35 minutes de Barcelona!</p>
      </div>
      <div class="sec-btn-ct-us">
        <button class="btn-ct-us">CONTACTAR</button>
      </div>
    </div>
  </div>

  <!--SECCIÓN MÁS INFO RESTAURANTE-->
  <div class="informacionRest">
    <div class="sectionInfoRest">
      <div class="titleSectionInfoRest">
        <h2>BAR-RESTAURANTE VENDRELL: MUCHO MÁS QUE UN RESTAURANTE</h2><br>
        <p>Nuestras instalaciones están diseñadas para garantizarte una experiencia inolvidable con nuestra comida</p>
        <br>
      </div>
      <div class="sectLineInfoRest">
        <section class="lineInfoRest"></section>
      </div>
      <div class="imgSectionInfoRest">
        <img src="../assets/images/imgInfoRest.png" alt="Imagen de información del restaurante">
      </div>
      <div class="textSectionInfoRest">
        <p class="textInfoRest1"><strong style="color: #a81010; font-weight: 500;">Bar-restaurante Vendrell </strong>
          se encuentra en un complejo de instalaciones donde se
          podrán encontrar actividades como karts, Laser Tag y como punto fuerte,
          nuestro bar-restaurante con la posibilidad de hacer barbacoas y calçotadas</p>

        <p class="textInfoRest2">Ahora mediante nuestra web, podrás solicitar comida por la web y realizar su
          compra, para recibirla a domicilio posteriormente. Estamos a tu disposición,
          contacta con nosotros.</p>
      </div>
    </div>
  </div>

  <!--SECCIÓN IMÁGENES DESTACADAS-->
  <div class="sectionImgsDestacadas">
    <div class="banderasGanador" style="background-image: url(../assets/images/banderaWin.jpg);">
    </div>
    <div class="bg-image-fc" style="background-image: url(../assets/images/fibraCarbono.png); ">
      <div class="galeriaImgs">
        <div class="image-container">
          <img src="../assets/images/imgGaleria1.png" alt="galeria 1">
          <div class="overlay">
            <p>Terraza luminosa</p>
          </div>
        </div>
        <div class="image-container">
          <img src="../assets/images/imgGaleria2.png" alt="galeria 2">
          <div class="overlay">
            <p>Espacios abiertos</p>
          </div>
        </div>
        <div class="image-container">
          <img src="../assets/images/imgGaleria3.png" alt="galeria 3">
          <div class="overlay">
            <p>Vistas espectaculares</p>
          </div>
        </div>
      </div>
    </div>
    <div class="banderasGanador" style="background-image: url(../assets/images/banderaWin.jpg);">
    </div>
  </div>

  <!--FOOTER-->
  <?php
  include_once "footer.php";
  ?>