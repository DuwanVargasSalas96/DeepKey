<!DOCTYPE html>
<html lang="es">
  <head>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/4cfa498f8e.js" crossorigin="anonymous"></script>
    
    <!--Custom-->
    <link href="views/css/deepkey.css" rel="stylesheet">
    <link href="views/favicon.ico" rel="icon">
    <script src="views/js/deepkey.js"></script>
    <script src="views/js/keys.js"></script>

    <!--Metadata-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <title>DeepKey</title>
  </head>
  <body>
    <?php
      //Nav controller
      $nav = new MainC();
      $nav -> nav();
    ?>
    <footer>
      <!--Toast-->
      <div class="position-fixed" id="containerToast" style="z-index: 1;">
        <div class="toast" data-delay="7500">
          <div class="toast-body text-white"></div>
        </div>
      </div>
    </footer>
  </body>
</html>
