<?php
    include_once 'templates/header-authentication.php';
?>
<body>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="/assets/img/illustrations/boy-verify-email-light.png" class="img-fluid" alt="Login image" width="560" data-app-dark-img="illustrations/boy-verify-email-dark.png" data-app-light-img="illustrations/boy-verify-email-light.png">
                </div>
            </div>
            <!-- /Left Text -->
            <!--  Verify email -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
                <div class="w-px-400 mx-auto">
                    <div class="app-brand mb-5">
                        <a href="verificar-email" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="/img/teleenfermeria.png" style="width:60px;" alt="Cinque Terre">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder" style="text-transform:uppercase !important; color:#00B2A9 !important;">Teleenfermería</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">¿Olvidaste tu contraseña? 🔒</h4>
                    <p class="mb-4">Ingrese su correo y luego siga las instrucciones para restablecer su contraseña</p>
                    <form id="frm" class="mb-3" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su correo" autofocus>
                        </div>
                        <input type="hidden" id="iduser" name="iduser" value="valor_nulo">
                        <input type="hidden" id="username" name="username" value="valor_nulo">
                        <input type="hidden" id="confirm-password" name="confirm-password" value="valor_nulo">
                        <input type="hidden" id="password" name="password" value="valor_nulo">
                        <input type="hidden" id="registro" name="registro" value="restablecer">                        
                        <button id="ingresar" class="btn btn-primary w-100 carga">
                            Restablecer contraseña
                        </button>
                    </form>
                    <div class="text-center">
                        <a href="login" class="d-flex align-items-center justify-content-center">
                            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Regresa al login
                        </a>
                    </div>
                </div>
            </div>
        <!-- /Forgot Password -->
        </div>
    </div>
<?php 
    include_once 'templates/footer-authentication.php';
?>        