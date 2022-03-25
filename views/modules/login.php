<?php
	// Create login controller	
	$login = new LoginCtl();
	$login -> login();
?>

<!----------------------------------
  Login Page
----------------------------------->

<!--Custom script-->
<script src="views/js/controls/login.js"></script>

<!--Body-->
<section class=" container my-5 p-0 shadow" style="max-width: 500px">
	<div class="container pt-4">
		<header class="text-center text-secondary">
			<h1>Login</h1>
		</header>
	</div>
	<div class="container px-4 pb-1 pt-4">
		<form method="POST" id="formLogin">
			<div class="form-group">
				<input class="form-control" id="inpLoginUser" name="inpLoginUser" type="email" placeholder="Correo" required>
			</div>
			<div class="input-group mb-3">
				<input class="form-control" id="inpLoginPwd" name="inpLoginPwd" type="password" placeholder="Contraseña" required>
				<div class="input-group-append">
					<span class="input-group-text">
						<i class="fas fa-eye"></i>
					</span>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit">Ingresar</button>
			</div>
			<div class="form-group">
				<a class="btn btn-block btn-link text-secondary" href="index.php?kb=registerProfile">Aún no tengo cuenta</a>
			</div>
		</form>
	</div>
</section>