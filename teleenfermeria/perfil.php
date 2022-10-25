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
                            <span class="text-muted fw-light">Perfil /</span> Ver
                        </h4>
                        <div class="row">
                            <!-- User Sidebar -->
                            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                                <!-- User Card -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="user-avatar-section">
                                            <div class=" d-flex align-items-center flex-column">
                                                <img class="img-fluid rounded my-4" src="<?php echo $_SESSION['img'] ;?>" height="110" width="110" alt="User avatar" />
                                                <div class="user-info text-center">
                                                    <h4 class="mb-2"><?php echo $_SESSION['nombres'] . ' ' . $_SESSION['apellidos'];?></h4>
                                                    <span class="badge bg-label-secondary"><?php echo $_SESSION['rol'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                                            <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                                <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                                                <div>
                                                    <h5 class="mb-0">1.23k</h5>
                                                    <span>Tasks Done</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mt-3 gap-3">
                                                <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-customize bx-sm'></i></span>
                                                <div>
                                                    <h5 class="mb-0">568</h5>
                                                    <span>Projects Done</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="pb-2 border-bottom mb-4">Detalles</h5>
                                        <div class="info-container">
                                            <ul class="list-unstyled">
                                                <li class="mb-3">
                                                    <span class="fw-bold me-2">Usuario:</span>
                                                    <span><?php echo $_SESSION['usuario']; ?></span>
                                                </li>
                                                <li class="mb-3">
                                                    <span class="fw-bold me-2">Correo:</span>
                                                    <span><?php echo $_SESSION['correo']; ?></span>
                                                </li>                                                
                                                <li class="mb-3">
                                                    <span class="fw-bold me-2">Rol:</span>
                                                    <span><?php echo ucwords(strtolower($_SESSION['rol'])); ?></span>
                                                </li>
                                                <li class="mb-3">
                                                    <span class="fw-bold me-2">Llave id:</span>
                                                    <span><?php echo $_SESSION['id']; ?></span>
                                                </li>                                                
                                            </ul>
                                            <div class="d-flex justify-content-center pt-3">
                                                <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Editar</a>
                                                <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspender</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /User Card -->                                

                            </div>
                            <!--/ User Sidebar -->
                            
                            <!-- User Content -->
                            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">

                                <!-- User Pills -->
                                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                    <li class="nav-item"><a class="nav-link" href="javascript::"><i class="bx bx-bell me-1"></i>Seguridad</a></li>
                                </ul>
                                <!--/ User Pills -->

                                <!-- Change Password -->
                                <div class="card mb-4">
                                    <h5 class="card-header">Cambiar Contraseña</h5>
                                    <div class="card-body">
                                        <form id="formChangePassword" method="POST" onsubmit="return false">
                                            <div class="alert alert-warning" role="alert">
                                                <h6 class="alert-heading fw-bold mb-1">Asegúrese que las contraseñas sean iguales</h6>
                                                <span>Debe tener un mínimo de 8 caracteres</span>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                                    <label class="form-label" for="newPassword">Nueva contraseña</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                                                    <label class="form-label" for="confirmPassword">Confirmar Nueva Contraseña</label>
                                                    <div class="input-group input-group-merge">
                                                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="hidden" name="registro" value="psw"/>
                                                    <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ; ?>"/>
                                                    <button type="submit" id="cambiarpsw"class="btn btn-primary me-2">Cambiar Contraseña</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--/ Change Password -->
                               
                            </div>
                            <!--/ User Content -->
                        </div>
                        <!-- Modals -->
                        <!-- Edit User Modal -->
                        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3>Editar Información de usuario</h3>
                                            <p>Actualizar información personal del usuario.</p>
                                        </div>
                                        <form id="editUserForm" class="row g-3" onsubmit="return false">                                                                                        
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="<?php echo $_SESSION['img'];?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
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
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalnombres">Nombres</label>
                                                <input type="text" id="modalnombres" name="modalnombres" class="form-control" placeholder="John" value="<?php echo $_SESSION['nombres']; ?>"/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalapellidos">Apellidos</label>
                                                <input type="text" id="modalapellidos" name="modalapellidos" class="form-control" placeholder="Doe" value="<?php echo $_SESSION['apellidos']; ?>"/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalusuario">Nombre de usuario</label>
                                                <input type="text" id="modalusuario" name="modalusuario" class="form-control" placeholder="john.doe.007" value="<?php echo $_SESSION['usuario']; ?>"/>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label" for="modalcorreo">Correo</label>
                                                <input type="text" id="modalcorreo" name="modalcorreo" class="form-control" placeholder="example@domain.com" value="<?php echo $_SESSION['correo']; ?>"/>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <label class="form-label" for="modalrol">Rol</label>
                                                <select id="modalrol" name="modalrol" class="form-select" aria-label="Default select example">
                                                    <option selected>Seleccione un rol</option>
                                                    <?php
                                                    $sql = "SELECT rol FROM roles_admin; ";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0) {
                                                        while($roles = $result->fetch_assoc()) { ?>
                                                            <option value="<?php echo $roles['rol']; ?>" <?php echo ($roles['rol']==$_SESSION['rol']) ? "selected": "" ; ?>><?php echo ucwords(strtolower($roles['rol'])); ?></option>
                                                        <?php }
                                                    }
                                                ?>  
                                                </select>
                                            </div>                                            
                                            <div class="col-12 text-center">
                                                <input type="hidden" name="imagen" value="<?php echo $_SESSION['img'];?>"/>
                                                <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"/>
                                                <input type="hidden" name="registro" value="perfil"/>
                                                <button type="submit" id="modalguardar" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Edit User Modal -->                        
                        <!-- /Modals -->                    
                    </div>
                    <!-- /Content --> 
<?php 
    $conn->close();
    include_once 'templates/footer.php'; 
?>