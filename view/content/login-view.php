<div class="wrapper vh-100">
    <div class="align-items-center h-100" style="display: flex;">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index">
                <img id="logo" src="<?php echo SERVERURL ?>view/assets/images/logo.png" style="width: 50%; height: 50%;" alt="">
            </a>
            <h1 class="h6 mb-3">Sucre Instituto Superior Universitario</h1>
            <div class="form-group">
                <label for="inputEmail" class="sr-only">Usuario</label>
                <input type="text" name="user" class="form-control form-control-lg" placeholder="Usuario" required="" autofocus="">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" name="pass" class="form-control form-control-lg" placeholder="Contraseña" required="">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">© 2023</p>
        </form>
    </div>
</div>
<?php
if (isset($_POST['user']) && isset($_POST['pass'])) {
	require_once "./controller/login.controlador.php";
	$login = new LoginControlador();

	$login = $login->CtrIniciarSession();
	echo $login;
}
?>	