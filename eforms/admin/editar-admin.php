<?php
    $id = $_GET['id'];
    if (!filter_var($id, FILTER_VALIDATE_INT)):
       die('ERROR!');
    endif;

    //include_once 'funciones/sesion.php';
    include_once '../includes/funciones/funciones.php';
    include_once 'templates/header.php';
    
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include_once 'templates/barra.php';?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include_once 'templates/navegacion.php'?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Panel de administrador</h1>                                                                               
                    </div>
                    <form role="form" id="actualizar-registro" action="modelo-admin.php" method="post">
                        <!-- Content Row: Datos personales-->
                        <div class="row">
                            <!-- Content Column -->
                            <div class="col-lg-12 mb-3">
                                <!-- Datos personales -->
                                <div class="card shadow mb-0">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Actualiza sólo aquellos campos necesarios</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                             $sql = "SELECT * FROM ef_admins WHERE id = $id";
                                             $res = $conn->query($sql);
                                             $admin = $res->fetch_assoc();
                                             $id_registro = $admin['id'];
                                        ?>
                                        <!-- Fecha de registro -->
                                        <div class="form-group">
                                            <label for="name-user">Nombres completos</label>
                                            <input type="text" class="form-control" id="name-user" name="name-user" value="<?php echo $admin['name_user'];?>" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Usuario</label>
                                            <input type="text" class="form-control" id="user" name="user" value="<?php echo $admin['user'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Nivel de permiso</label>
                                            <input type="number" class="form-control" id="level" name="level" value="<?php echo $admin['level'];?>" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Contraseña</label>
                                            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="password" name="nuevo_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Repetir contraseña</label>
                                            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="password_repetir" name="repetir_password">
                                            <span id="resultado_password" class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Row: Botones de acciones -->
                        <div class="row">                            
                            <input type="hidden" name="registro" value="actualizar">                            
                            <input type="hidden" name="id_registro" value="<?php echo $id_registro; ?>">
                            <button type="submit" class="btn btn-primary col-lg-6">Actualizar</button>
                            <button href="lista-admin.php" type="button" class="btn btn-secondary col-lg-6">Cancelar</button>
                        </div>
                    </form>

                </div>
            <!-- /.container-fluid -->
            </div>
       
    <!-- End of Main Content -->
    
<?php
    $conn->close();
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';    
?>