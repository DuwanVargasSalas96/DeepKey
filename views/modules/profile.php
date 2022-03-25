<?php
	//Start session
	session_start();

	//Session control
	if (!$_SESSION["state"]) {
		//Redirect to page
		header("location:index.php?kb=exit");

		//Logout
		exit();
	}

	//Create profile controller
	$profile = new ProfileCtl();
	$profile -> updateProfileData($_SESSION["user"]);
	$profile -> updateProfilePassword($_SESSION["user"]);
?>

<!----------------------------------
  Profile Page
----------------------------------->

<!--Custom scripts-->
<script src="views/js/controls/profile.js"></script>
<script src="views/js/requests/profile.js"></script>
<script src="views/js/ui/profile.js"></script>

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
				<a class="dropdown-item text-center" href="index.php?kb=exit">Cerrar sesión</a>
			</div>
		</li>
	</ul>
</nav>

<!--Body-->
<section class="p-4">
	<div class="row">
		
		<!--Update profile information-->
		<div class="col-md">
			<div class="card mb-4 shadow">
				<div class="card-header text-center text-secondary">
					<h3>Datos Personales</h3>
				</div>
				<div class="card-body">
					<form method="POST" id="formProfileData">
						<div class="container mb-4 text-center">
							<i class="fas fa-user-astronaut" style="font-size: 10em"></i>
						</div>
						<div class="form-group">
							<input class="form-control" id="inpProfileFirstName" name="inpProfileFirstName" type="text" placeholder="Nombre" placeholder="Nombre" readonly>
						</div>
						<div class="form-group">
							<input class="form-control" id="inpProfileLastName" name="inpProfileLastName" type="text" placeholder="Apellido" placeholder="Apelllido" readonly>
						</div>
						<div class="form-group">
							<input class="form-control" id="inpProfileEmail" name="inpProfileEmail" type="text" placeholder="Correo Electrónico" placeholder="Correo Electrónico" readonly>
						</div>
						<div class="form-group">
							<button class="btn btn-block btn-primary d-none" type="submit">Guardar Cambios</button>
							<button class="btn btn-block btn-primary" id="btnEditProfile" type="button">Editar Información</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--Update profile password-->
		<div class="col-md">
			<div class="card mb-4 shadow">
				<div class="card-header text-center text-secondary">
					<h3>Cambiar Contraseña</h3>
				</div>
				<div class="card-body">
					<form method="POST" id="formProfilePwd">
						<div class="input-group mb-3">
							<input class="form-control" id="inpProfilePwdOld" name="inpProfilePwdOld" type="password" placeholder="Contraseña Anterior">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="input-group mb-3">
							<input class="form-control" id="inpProfilePwdNew" name="inpProfilePwdNew" type="password" placeholder="Contraseña Nueva">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="input-group mb-3">
							<input class="form-control" id="inpProfilePwdReply" name="inpProfilePwdReply" type="password" placeholder="Confirme Nueva Contraseña">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fas fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<small class="form-text text-muted">La contraseña debe tener entre 8 a 50 carácteres. Debe contener mayúculas, minúsculas, números y simbolos.</small>
						</div>
						<div class="form-group">
							<button class="btn btn-block btn-primary" type="submit">Cambiar Contraseña</button>
						</div>
					</form>
				</div>
			</div>

			<!--Delete profile-->
			<div class="card shadow">
				<div class="card-header text-center text-secondary">
					<h3>Cerrar Cuenta</h3>
				</div>
				<div class="card-body text-justify">
					<p class="card-text">Al momento de eliminar esta cuenta, se borrará toda su información y no se podrá recuperar.</p>
				</div>
				<div class="card-footer">
					<button class="btn btn-block btn-danger" id="btnDeleteProfile">Cerrar Cuenta</button>
				</div>
			</div>
		</div>
	</div>
</section>