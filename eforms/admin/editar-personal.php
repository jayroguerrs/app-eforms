<?php
    $id = $_GET['id'];
    if (!filter_var($id, FILTER_VALIDATE_INT)){}
    else {
        die('ERROR!');
    }

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
                    <form role="form" id="actualizar-registro" action="modelo-personal.php" method="post">
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
                                             $sql = "SELECT * FROM employees WHERE cod = $id";
                                             $res = $conn->query($sql);
                                             $emp = $res->fetch_assoc();                                             
                                        ?>
                                        <!-- Fecha de registro -->
                                        <div class="row">
                                            <div class="pb-3 col-sm-6">
                                                <label for="cod-user">Código de trabajador</label>
                                                <input type="text" class="form-control" id="cod-user" name="cod-user" value="<?php echo $emp['cod'];?>" required readonly>
                                            </div>
                                            <div class="pb-3 col-sm-6">
                                                <label for="dni">DNI / Carné de extranjería</label>
                                                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $emp['dni'];?>" required readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Nombre del colaborador</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $emp['name'];?>" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="ocupacion">Ocupación</label>
                                            <input type="text" class="form-control" id="ocup" name="ocupacion" value="<?php echo $emp['jobtitle'];?>" required readonly>
                                        </div>

                                        <div class="row">
                                            <div class="pb-3 col-sm-6">
                                                <label for="desempeno">Desempeño</label>
                                                <input type="text" class="form-control" id="desemp" name="desempeno" value="<?php echo $emp['performance'];?>" required>
                                            </div>
                                            <div class="pb-3 col-sm-6">
                                                <label for="status">Estado de actividad</label>
                                                <input type="text" class="form-control" id="status" name="status" value="<?php echo $emp['status'];?>" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="pb-3 col-sm-6">
                                                <label for="nat">País de nacimiento</label>
                                                <input type="text" class="form-control" id="nat" name="nat" value="<?php echo $emp['nationality'];?>" required readonly>
                                            </div>
                                            <div class="pb-3 col-sm-6">
                                                <label for="email">Correo electrónico</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $emp['email'];?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="superv">Nombre del supervisor</label>
                                            <input type="text" class="form-control" id="superv" name="superv" value="<?php echo $emp['ef_super'];?>">
                                        </div>
                                                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Row: Botones de acciones -->
                        <div class="row">                            
                            <input type="hidden" name="registro" value="actualizar">                            
                            <input type="hidden" name="id_registro" value="<?php echo $emp['cod']; ?>">
                            <button type="submit" class="btn btn-primary col-lg-6">Actualizar</button>
                            <button href="lista-personal.php" type="button" class="btn btn-secondary col-lg-6">Cancelar</button>
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