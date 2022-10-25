<?php
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
                        <h1 class="h3 mb-0 text-gray-800">Nuevo administrador</h1>                        
                    </div>
                    <form role="form" id="guardar-registro" action="modelo-admin.php" method="post">
                        <!-- Content Row: Datos personales-->
                        <div class="row">
                            <!-- Content Column -->
                            <div class="col-lg-12 mb-3">
                                <!-- Datos personales -->
                                <div class="card shadow mb-0">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos personales</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Fecha de registro -->
                                        <div class="form-group">
                                            <label for="name-user">Nombres completos</label>
                                            <input type="text" class="form-control" id="name-user" name="name-user" required placeholder="Ejemplo: Juan Perez Flores Aliaga">
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Usuario</label>
                                            <input type="text" class="form-control" id="user" name="user" placeholder="Ejemplo: jperez" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Nivel de permiso</label>
                                            <input type="number" class="form-control" id="level" name="level" placeholder="- Seleccione un nivel -" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Contraseña</label>
                                            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="pass" name="pass" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Row: Botones de acciones -->
                        <div class="row">                            
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary col-lg-6">Guardar</button>                            
                            <a href="lista-admin.php" class="btn btn-secondary col-lg-6">Cancelar</a>
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