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
                                                                               
                    </div>
                    <div><a href="nuevo-admin.php" class="btn btn-success btn-icon-split mb-4">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Agregar colaborador</span>
                                    </a>
                    </div>
                    <form role="form" id="guardar-registro" action="modelo-registro.php" method="post">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Lista de colaboradores</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable2" class="table table-striped table-bordered table-hover" style="font-size: 0.88rem; width: 100%; " cellspacing="0">
                                        <thead style="background: linear-gradient(to right, #00B2A9, #21d1c8); color: white;">
                                            <tr >
                                                <th></th>    
                                                <th>Código</th>
                                                <th>dni</th>
                                                <th>Nombres</th>
                                                <th>Correo</th>
                                                <th>Desempeño</th>                                                
                                                <th>Estado</th>
                                                <th>Supervisor</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

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