<?php
	//Create profile controller
	$register = new ProfileCtl();
	$register -> createProfile();
?>

<!----------------------------------
  Register User Page
----------------------------------->

<!--Custom script-->
<script src="views/js/controls/registerProfile.js"></script>

<!--Body-->
<section class="container my-5 p-0 shadow" style="max-width: 600px">
	<div class="container pt-4">
		<header class="text-center text-secondary">
			<h1>Registro</h1>
		</header>
	</div>
	<div class="container px-4 pb-1 pt-4">
		<form method="POST" id="formRegister">
			<div class="row">
				<div class="form-group col-sm">
					<input class="form-control" id="inpRegisterFirstName" name="inpRegisterFirstName" type="text" placeholder="Nombre" required>
				</div>
				<div class="form-group col-sm">
					<input class="form-control" id="inpRegisterLastName" name="inpRegisterLastName" type="text"  placeholder="Apellido" required>
				</div>
			</div>
			<div class="form-group">
				<input class="form-control" id="inpRegisterEmail" name="inpRegisterEmail" type="email" placeholder="Correo" required>
			</div>
			<div class="row">
				<div class="input-group col-sm mb-3">
			    	<input class="form-control" id="inpRegisterPwd" name="inpRegisterPwd" type="password" placeholder="Contraseña" required>
			        <div class="input-group-append">
			          <span class="input-group-text" >
			            <i class="fas fa-eye"></i>
			          </span>
			        </div>
			    </div>
			    <div class="input-group col-sm mb-3">
			    	<input class="form-control" id="inpRegisterPwdReply" name="inpRegisterPwdReply" type="password" placeholder="Confirmar Contraseña" required>
			        <div class="input-group-append">
			          <span class="input-group-text" >
			            <i class="fas fa-eye"></i>
			          </span>
			        </div>
			    </div>
			</div>
			<div class="form-group">
				<small class="form-text text-muted">La contraseña debe tener entre 8 a 50 carácteres. Debe contener mayúculas, minúsculas, números y simbolos.</small>
			</div>
			<div class="form-group">
				<button class="btn btn-block btn-primary" type="submit">Registar</button>
			</div>
			<div class="form-group">
        		<a class="btn btn-block btn-link text-secondary" href="index.php?kb=login">Ya tengo cuenta</a>
      		</div>
		</form>
	</div>
</section>