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
  Home Page
----------------------------------->

<!--Navbar-->
<nav class="navbar navbar-dark bg-dark shadow">
	<a class="navbar-brand" href="index.php?kb=home">DeepKey</a>
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
				<div class="dropdown-divider"></div>
				<a class="dropdown-item text-center" href="index.php?kb=exit">Cerrar sesión</a>
				</div>
		</li>
	</ul>
</nav>

<!--Body-->
<section class="p-4">
	<div class="row">
		<div class="col-sm mb-4 text-center">
			<a class="text-decoration-none" href="index.php?kb=keylist">
				<div class="card bg-primary text-white">
					<div class="card-header">
						<i class="fas fa-key" style="font-size: 32pt"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">Listado de Contraseñas</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-sm mb-4 text-center">
			<a class="text-decoration-none" href="index.php?kb=profile">
				<div class="card bg-success text-white">
					<div class="card-header">
						<i class="fas fa-user-astronaut" style="font-size: 32pt"></i>
					</div>
					<div class="card-body">
						<h5 class="card-title">Perfil</h5>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>