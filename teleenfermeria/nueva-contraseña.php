<?php 
    
    include_once 'templates/header-authentication.php';
    ?>
<!-- Content -->        
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
            <!-- Reset Password-->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="javascript::" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="/img/teleenfermeria.png" style="width:60px;" alt="Cinque Terre">
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder" style="text-transform:uppercase !important; color:#00B2A9 !important;">Teleenfermería</span>              
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Restablecer contraseña 🔒</h4>
                        <p class="mb-4">Para <span class="fw-bold"><?php echo $_GET['email'];?></span></p>
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
                            <button id="ingresar" class="btn btn-primary d-grid w-100 mb-3">
                                Restablecer contraseña
                            </button>
                            <div class="text-center">
                                <a href="login.php">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                        Regresar al login
                                </a>
                            </div>
                            <div hidden>
                                <input type="hidden" id="iduser" name="iduser" value="<?php echo $_GET['id'];?>">
                                <input type="hidden" id="email" name="email" value="<?php echo $_GET['email'];?>">
                                <input type="hidden" id="username" name="username" value="valor_nulo">
                                <input type="hidden" id="registro" name="registro" value="nuevopass">
                                <input class="carga">
                            </div>
                        </form>
                    </div>
                </div>
            <!-- /Reset Password -->
            </div>
        </div>
    </div>
<!-- / Content -->
<?php include_once 'templates/footer-authentication.php';?>