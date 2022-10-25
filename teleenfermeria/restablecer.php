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
                        <img src="/assets/img/illustrations/boy-with-laptop-light.png" class="img-fluid" alt="Login image" width="580" data-app-dark-img="illustrations/boy-with-laptop-dark.png" data-app-light-img="illustrations/boy-with-laptop-light.png">
                    </div>
                </div>
                <!-- /Left Text -->
                <!-- Reset Password -->
                <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-4 p-sm-5">
                    <div class="w-px-400 mx-auto">
                        <!-- Logo -->
                        <div class="app-brand mb-5">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="/img/teleenfermeria.png" style="width:60px;" alt="Cinque Terre">    
                                </span>    
                                <span class="app-brand-text demo text-body fw-bolder" style="text-transform:uppercase !important; color:#00B2A9 !important;">Teleenfermería</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Restablecer contraseña 🔒</h4>
                        <p class="mb-4">Para <span class="fw-bold">john.doe@email.com</span></p>
                        <form id="frm" class="mb-3" method="POST">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Nueva Contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="confirm-password">Confirmar contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="confirm-password" class="form-control" name="confirm-password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <button id='ingresar' class="btn btn-primary d-grid w-100 mb-3">
                                Restablecer contraseña
                            </button>
                            <div class="text-center">
                                <a href="login.php">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                        Regresar al login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- /Reset Password -->
            </div>
        </div>
<?php
    include_once 'templates/footer-authentication.php';
?>