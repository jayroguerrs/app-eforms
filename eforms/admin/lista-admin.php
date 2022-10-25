<?php
    //include_once 'funciones/sesion.php';
    include_once '../includes/funciones/funciones.php';
    include_once 'templates/header.php'
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
                            <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i>Generar Reporte</a>                                                    
                    </div>
                    <div><a href="nuevo-admin.php" class="btn btn-success btn-icon-split mb-4">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Agregar administrador</span>
                                    </a>
                    </div>
                    <form role="form" id="guardar-registro" action="modelo-registro.php" method="post">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de administradores</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0">
                                        <thead style="background: linear-gradient(to right, #00B2A9, #21d1c8); color: white;">
                                            <tr>
                                                <th>Nombre de usuario</th>
                                                <th>Usuario</th>
                                                <th>Nivel</th>
                                                <th>Actualizacion</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            try {
                                                $sql = "SELECT * FROM `ef_admins` ";
                                                $resultado = $conn->query($sql);
                                            } catch (Exception $e) {
                                                $error = $e->getMessage();
                                            }
                                        ?>
                                        <?php while($admin = $resultado->fetch_assoc() ) {?>
                                            <tr>
                                                <td><?php echo $admin['name_user']; ?></td>
                                                <td><?php echo $admin['user']; ?></td>
                                                <td><?php echo $admin['level']; ?></td>
                                                <td><?php echo date("d/m/Y H:i:s A", strtotime($admin['reg_update'])); ?></td>
                                                <td>                                                                                                        
                                                    <a href="editar-admin.php?id=<?php echo $admin['id']; ?>" class="btn btn-warning btn-circle btn-sm" style="margin-right: 0.5rem"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="#" data-id="<?php echo $admin['id']; ?>" data-tipo="admin" type="button" class="btn btn-danger btn-circle btn-sm borrar-registro" style="margin-right: 0.5rem"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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