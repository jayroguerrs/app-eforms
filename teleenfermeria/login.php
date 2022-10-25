<?php
    session_start();
    if(isset($_SESSION['id'])) {
        header('Location:./');
        exit();
    }
    include_once 'templates/header-authentication.php';
?>
    <body>
        <!-- Content -->
        <div class="authentication-wrapper authentication-cover">
            <div class="authentication-inner row m-0">
                <!-- /Left Text -->
                <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                    <div class="w-100 d-flex justify-content-center">
                        <img src="/assets/img/illustrations/boy-with-rocket-light.png" class="img-fluid" alt="Login image" width="580" data-app-dark-img="illustrations/boy-with-rocket-dark.png" data-app-light-img="illustrations/boy-with-rocket-light.png">
                    </div>
                </div>
                <!-- /Left Text -->
                <!-- Login -->
                <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                    <div class="w-px-400 mx-auto">
                        <!-- Logo-->
                        <div class="app-brand mb-4">
                            <a href="login" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="/img/teleenfermeria.png" style="width:60px;" alt="Cinque Terre">
                                </span>
                              <span class="app-brand-text demo text-body fw-bolder" style="text-transform:uppercase !important; color:#00B2A9 !important;">Teleenfermería</span>
                            </a>
                          </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Bienvenido(a)</h4>
                        <p class="mb-4">Por favor ingrese sus credenciales</p>
                        <form id="frm"  class="mb-3" >
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" autofocus>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Contraseña</label>
                                    <a href="verificar-email">
                                        <small>¿Olvidó su contraseña?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">Recuerdame</label>
                                </div>
                            </div>
                            <input type="hidden" id="registro" name="registro" value="login">
                            <button id='ingresar' class="btn btn-primary d-grid w-100">Ingresar</button>
                            <div hidden>
                                <input type="hidden" id="iduser" name="iduser" value="valor_nulo">
                                <input type="hidden" id="email" name="email" value="valor_nulo@crp.com">
                                <input type="hidden" class="confirm-password" value="valor_nulo@crp.com">
                                <input class="carga">
                            </div>
                        </form>                        
                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
<?php 
    include_once 'templates/footer-authentication.php';
?>        