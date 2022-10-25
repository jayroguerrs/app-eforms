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
                        <div class="row g-4 mb-4">                            
                            <!-- Users List Table -->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title">Filtros de búsqueda</h5>
                                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                        <div class="col-md-4 rol"></div>
                                    </div>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-users table border-top display compact" id="tabla" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Key</th>                                                
                                                <th>Nombres</th>
                                                <th>Usuario</th>
                                                <th>Correo</th>
                                                <th>Rol</th>
                                                <th>Nombre completo</th>                                                
                                                <th>Nombres </th>
                                                <th>Apellidos</th>
                                                <th>Actualización</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- /Content -->
                    <!-- Modal -->
                    <!-- Edit User Modal -->
                    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                    <h3>Editar información de usuarios</h3>
                                    <p>A continuación puede editar la información del usuario seleccionado.</p>
                                    </div>
                                    <form id="editUserForm" class="row g-3" onsubmit="return false">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <img src="<?php echo $_POST['img'];?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
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
                                        
                                        <input type="hidden" name="modalid" value=""/>

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
                                        
                                        <div class="col-12 col-md-6 form-password-toggle">
                                            <label class="form-label" for="modalpsw">Contraseña</label>
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="password" id="modalpsw" name="modalpsw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 form-password-toggle">
                                            <label class="form-label" for="modalrepeatpsw">Repetir Contraseña</label>
                                            <div class="input-group input-group-merge">
                                                <input class="form-control" type="password" name="modalrepeatpsw" id="modalrepeatpsw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            </div>
                                        </div>

                                        <div class="col-12 text-center pt-4">
                                            <input type="hidden" name="registro" value="editusuario">
                                            <button type="submit" class="btn btn-primary me-sm-3 me-1" id="guardar">Guardar</button>
                                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Edit User Modal -->
<?php 
    $conn->close();
    include_once 'templates/footer.php'; ?>