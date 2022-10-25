<?php     
    include_once '../includes/bd_conexion.php'; 
    include_once 'templates/header.php'; 
?>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            <!-- Menu -->
            <?php include_once 'templates/sidebar.php'; ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include_once 'templates/navbar.php'; ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->        
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">
                            <span class="text-muted fw-light">Usuarios /</span> Agregar
                        </h4>
                        <div class="row">
                            <!-- Hospitalización BD -->
                            <div class="col-12">
                                <div class="card">
                                    <h5 class="card-header fw-bold" >Hospitalización y emergencias</h5>
                                    <div class="card-body">
                                        <form id="formUsuario" class="row g-3" method="POST">
                                            <!-- Account Details -->                                                                                        
                                            <div class="col-12">
                                                <h6 class="fw-semibold" style="color: #00B2A9 !important;"><i class='bx bxs-user'></i>  Datos del Usuario</h6>
                                                <hr class="mt-0" style="color: #00B2A9 !important;"/>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="/assets/img/avatars/blank.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                            <span class="d-none d-sm-block">Subir nueva foto</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            <input type="file" id="upload" name="modalimg" class="account-file-input" hidden="" accept="image/png, image/jpg, image/jpeg">
                                                        </label>
                                                        <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Restablecer</span>
                                                        </button>
                                                        <p class="text-muted mb-0">Subir archivos JPG, JPEG o PNG. Tamaño máximo 100Kb</p>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-6">
                                                <label class="form-label" for="nombres">Nombres</label>
                                                <input class="form-control" type="text" id="nombres" name="nombres" placeholder="Juan Ramiro" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="apellidos">Apellidos</label>
                                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Perez Ochoa" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="usuario">Usuario</label>
                                                <input class="form-control" type="text" id="usuario" name="usuario" placeholder="username"/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="correo">Correo</label>
                                                <input class="form-control" type="email" id="correo" name="correo" placeholder="usuario@crp.com.pe"/>
                                            </div>                                            
                                            <div class="col-md-12">
                                                <label class="form-label" for="servicio">Rol</label>
                                                <select id="rol" name="rol" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione un rol">
                                                    <option value="">Seleccione un rol</option>
                                                    <?php
                                                        $sql = "SELECT rol FROM roles_admin; ";
                                                        $result = $conn->query($sql);
                                                        if($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) { ?>
                                                                <option value="<?php echo $row['rol']; ?>"><?php echo $row['rol']; ?></option>
                                                            <?php }
                                                        }
                                                    ?>    
                                                </select>
                                            </div>
                                            
                                            <div class="col-12 col-md-6 form-password-toggle">
                                                <label class="form-label" for="psw">Contraseña</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" id="psw" name="psw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-password-toggle">
                                                <label class="form-label" for="repeatpsw">Repetir Contraseña</label>
                                                <div class="input-group input-group-merge">
                                                    <input class="form-control" type="password" name="repeatpsw" id="repeatpsw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <button type="submit" id="enviar1" name="submitButton" class="btn btn-primary">Enviar</button>
                                            </div>
                                            <input type="hidden" name="registro" value="nuevousuario"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Hospitalización BD -->
                        </div>
                    </div>
                    <!-- /Content --> 
<?php include_once 'templates/footer.php'; ?>