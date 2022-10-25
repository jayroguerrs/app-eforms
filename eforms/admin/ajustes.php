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
                    <h1 class="h3 mb-1 text-gray-800">Ajustes de administración</h1>                        
                    <p class="mb-4">En el siguiente panel podrá agregar, modificar y actualizar los datos necesarios de todas las tablas pertenecientes al programa para su correcto funcionamiento.</p>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <table id="dataTable3" class="table table-striped table-bordered table-hover"  style="font-size: 0.7rem; width:100%" >
                                        <thead style="background: linear-gradient(to right, #00B2A9, #21d1c8); color: white;">
                                            <tr>
                                                <th>ID</th>
                                                <th>Categoría</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>       
                
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<?php
    $conn->close();
    include_once 'templates/footer.php';
    include_once 'templates/footer-scripts.php';
?>