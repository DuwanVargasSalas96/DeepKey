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
<section class="p-4">
	<div class="row">
		<div class="col-md mb-4 text-center">
			<a class="text-decoration-none" href="index.php?kb=keylist">
				<div class="card bg-primary text-white">
					<div class="card-body">
						<i class="fas fa-key mb-4" style="font-size: 50pt"></i>
						<h5 class="card-title">Contraseñas</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md mb-4 text-center">
			<a class="text-decoration-none" href="index.php?kb=profile">
				<div class="card bg-success text-white">
					<div class="card-body">
						<i class="fas fa-user-astronaut mb-4" style="font-size: 50pt"></i>
						<h5 class="card-title">Perfil</h5>
					</div>
				</div>
			</a>
		</div>
		<div class="col-md mb-4 text-center">
			<a class="text-decoration-none" href="index.php?kb=exit">
				<div class="card bg-danger text-white">
					<div class="card-body">
						<i class="fas fa-sign-out-alt mb-4" style="font-size: 50pt"></i>
						<h5 class="card-title">Cerrar Sesión</h5>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>