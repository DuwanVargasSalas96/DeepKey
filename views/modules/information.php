<?php
    /* Close session */
    session_start();
    session_unset();
    session_destroy();
?>

<!----------------------------------
  Information Page
----------------------------------->

<!--Body-->
<section class="container-fluid my-5 p-4" style="max-width: 800px">
    <header class="text-center text-secondary">
        <h1 id="infTitle"></h1>
    </header>
    <div class="my-5 text-center">
        <i class="fas" id="infIcon" style="font-size:15em"></i>
        <p class="text-secondary" id="infText" style="font-size: 2em;"></p>
    </div>
    <div class="text-center">
	    <a class="btn btn-primary" href="index.php?kb=login">Volver a la Página Principal</a>
    </div>
</section>