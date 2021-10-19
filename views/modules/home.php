<?php
	//Session control
	session_start();
	if (!$_SESSION["state"]) {
		//Redirect to page
		header("location:index.php?kb=exit");
		exit();
	}
?>

<nav class="navbar navbar-dark bg-primary shadow">
	<a class="navbar-brand" href="index.php?kb=home">DeepKey</a>
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white" href="index.php?kb=exit">Cerrar sesión</a>
		</li>
	</ul>
</nav>
<section>
	<ul class="list-group mb-3 shadow" id="listKeys"></ul>
</section>
<section>
	<div class="position-fixed" style="bottom: 2em; right: 2em; z-index: 1;">
		<button class="btn btn-primary d-none d-md-block shadow" id="btnNewKey_big">
			<i class="fas fa-key mr-3"></i>Agregar Key
		</button>
		<button class="btn btn-lg btn-primary d-md-none rounded-circle shadow" id="btnNewKey_small">
			<i class="fas fa-key py-2"></i>
		</button>
	</div>
</section>

<?php
	//Import module
	include "modals.php";
?>

<script>
	//List keys function
	$(document).ready(function() {
		listKeys();
	})
</script>