<section>
    <div class="container rounded" id="containerFormLogin">
        <header>
            <h1 class="display-4 mb-4 text-center text-primary">DeepKey</h1>
        </header>
        <form method="POST" id="formLogin">
            <div class="form-group">
                <label for="loginUser">Usuario</label>
                <input class="form-control" type="text" id="loginUser" name="loginUser" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="loginPassword">Contraseña</label>
                <input class="form-control" type="password" id="loginPassword" name="loginPassword" placeholder="Contraseña">
                <div></div>
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-primary" type="submit">Ingresar</button>
            </div>
        </form>

        <?php
            //Create object login
            $login = new LoginC();
            $login->login();
        ?>

    </div>
</section>