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
                        <h1 class="h3 mb-0 text-gray-800">Nuevo registro</h1>                        
                    </div>
                    <form role="form" id="guardar-registro" action="modelo-registro.php" method="post">
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
                                            <label for="fec">Fecha de inicio:</label>
                                            <input type="date" class="form-control" id="fec" name="fecha" required readonly value="<?php echo date("Y-m-d") ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="colaborador">Colaborador:</label>
                                            <select id="colaborador-select" data-placeholder="Seleccione un colaborador..." data-allow-clear="1" name="colaborador" required>
                                                <option value=""></option>
                                                    <?php 
                                                    try {
                                                        $sql = "SELECT `cod`, `name`, `performance` FROM `employees`";
                                                        $res_trabajadores = $conn->query($sql);
                                                        while($trabajadores = $res_trabajadores->fetch_assoc()){ ?>
                                                            <option value="<?php echo $trabajadores['cod'] ?>">
                                                                <?php echo $trabajadores['name']; ?>
                                                            </option>
                                                        <?php  }
                                                        } catch (Exception $e) {
                                                            echo "Error:" . $e->getMessage();
                                                        }
                                                    ?>
                                            </select>                                            
                                            
                                            </div>
                                            <div class="form-group">
                                            <label for="desem">Desempeño:</label>
                                            <input type="text" class="form-control" placeholder="Escriba el desempeño..." id="desem" name="desem" required readonly value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="sup">Supervisor:</label>
                                            <input type="text" class="form-control" placeholder="Escriba el nombre del supervisor..." id="sup" name="supervisor" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Content Row: Preguntas -->
                        <div class="row">
                            <?php
                                try {
                                    require_once('../includes/funciones/bd_conexion.php');
                                    $sql = " SELECT ";
                                    $sql.= " id, question, Q.id_category, num_i, cat_name, (SELECT max(id_category) FROM ef_questions)";
                                    $sql.= " FROM ";
                                    $sql.= " ef_questions Q ";
                                    $sql.= " INNER JOIN ef_category C ON Q.id_category = C.id_category ";
                                    $sql.= " ORDER BY ";
                                    $sql.= " id_category, num_i ";
                                    $resultado = $conn->query($sql);
                                } catch (\Exception $e) {
                                    echo $e->getMessage();
                                }

                                $formulario = array();

                                while($res = $resultado->fetch_array() ) {                                                    
                                    // obtiene la fecha del evento
                                    $num_cat = $res[5];    // El número de categorías
                                    $categoria = 'Categoría ' . $res[2] . ' - ' . $res['cat_name'];   // Nombre de la categoría
                                    
                                    $preguntas = array(
                                        'id' => $res['id'],
                                        'pregunta' => $res['question']
                                    );
                                    
                                    $formulario[$categoria][] = $preguntas;
                                }
                            ?>

                                <!-- Content Column 1-->
                                <div class="col-lg-6 mb-4">

                            <?php
                            $x = 0;
                            foreach($formulario as $categorias => $list_cat) {                               
                                $x ++;
                                if($x <= ceil($num_cat / 2)){ ?>

                                    <!-- Categorias de la primera columna -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $categorias ?></h6>
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            foreach($list_cat as $preg) { ?>

                                            <!-- Preguntas por categorías -->
                                            <div class="card-group mb-3">
                                                <h6><i class="font-weight-bold"><?php echo $preg['id'] . '. ' ?></i><?php echo $preg['pregunta'] ?></h6>
                                                <div class="btn-group btn-group-toggle form-control-range" data-toggle="buttons">
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val0" autocomplete="off" required> 0
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val5" autocomplete="off" required> 5
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val10" autocomplete="off" required> 10
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="valNA" autocomplete="off" required> No aplica
                                                </label>
                                                </div>
                                            </div>

                                           <?php } ?>

                                        </div>
                                    </div>
                                <?php
                                } else {

                                    if($x == (ceil($num_cat / 2) + 1)){ ?>

                                </div> 
                                <!-- Fin Column 1-->

                                <!-- Content Column 2-->
                                <div class="col-lg-6 mb-4">
                                <?php } ?>

                                    <!-- Categorias de la segunda columna -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $categorias ?></h6>
                                        </div>
                                        <div class="card-body">
                                    <?php

                                        foreach($list_cat as $preg) { ?>

                                            <!-- Preguntas por categorías -->
                                            <div class="card-group mb-3">
                                                <h6><i class="font-weight-bold"><?php echo $preg['id'] . '. ' ?></i><?php echo $preg['pregunta'] ?></h6>
                                                <div class="btn-group btn-group-toggle form-control-range" data-toggle="buttons">
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val0" autocomplete="off" required> 0
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val5" autocomplete="off" required> 5
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="val10" autocomplete="off" required> 10
                                                </label>
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="n11" value="valNA" autocomplete="off" required> No aplica
                                                </label>
                                                </div>
                                            </div>
                                        <?php } ?>
    
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                                </div>

                        </div>
                        <!-- Content Row: Botones de acciones -->
                        <div class="row">
                            <input type="hidden" name="registro" value="nuevo">
                            <button type="submit" class="btn btn-primary col-lg-6">Guardar</button>
                            <button type="button" class="btn btn-secondary col-lg-6">Cancelar</button>
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