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
				<i class="fas fa-user-astronaut" style="font-size: 24pt"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddProfile">
				<span class="dropdown-item-text">
					
					<?php
						// Imprimir
						echo $_SESSION["user"];
					?>

				</span>
				<a class="dropdown-item text-center" href="index.php?kb=profile">Perfil</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item text-center" href="index.php?kb=exit">Cerrar sesión</a>
				</div>
		</li>
	</ul>
</nav>

<!--Body-->
<section>
	Listado de DeepKeys
</section>