<?php
	// Start session
	session_start();

	// Session control
	if (!$_SESSION["state"]) {
		// Redirect to page
		header("location:index.php?kb=exit");
		
		// Logout
		exit();
	}

	// Show Modal
	include "./views/modals/keys.php";
?>

<!----------------------------------
  KeyList Page
----------------------------------->

<!--Navbar-->
<nav class="navbar navbar-dark bg-dark shadow">
	<a class="navbar-brand" href="index.php?kb=home">
		<i class="fas fa-arrow-left mr-4"></i>DeepKey
	</a>
	<ul class="nav justify-content-end">
		<li class="dropdown nav-item">
			<a class="nav-link p-0 text-white" href="#" id="ddProfile" role="button" data-toggle="dropdown" aria-haspopup="true">
				<i class="fas fa-user-astronaut mr-2" style="font-size: 15pt"></i>
				<?php
					// Imprimir
					echo $_SESSION["user"];
				?>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddProfile">
				<a class="dropdown-item text-center" href="index.php?kb=profile">Perfil</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item text-center" href="index.php?kb=exit">Cerrar sesión</a>
			</div>
		</li>
	</ul>
</nav>

<!--Body-->
<section>
	<ul class="list-group" id="keyList"> <!--Key list--> </ul>

	<div class="position-fixed" style="bottom: 2em; right: 2em; z-index: 1;">
		<button class="btn btn-primary" id="btnNewKey">
			<i class="fas fa-plus mr-2"></i>Agregar Key
		</button>
	</div>
</section>