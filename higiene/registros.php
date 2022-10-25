<?php include_once 'includes/funciones.php'; ?>
<?php include_once 'templates/header.php'; ?>
<?php include_once 'templates/setting-bar.php'; ?>
<?php include_once 'templates/sidebar.php'; ?>

            <div class="app-main__outer">

                <!-- Main page -->
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-plus icon-gradient bg-amy-crisp"></i>
                                </div>
                                <div>Nuevo registro
                                    <div class="page-title-subheading">Ingrese el registro del lavado de manos para un nuevo personal. Tenga en cuenta que es un registro por mes.
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>
                    <div class="row">
                        <div class="col-md-12 pb-4">
                            <div class="main-card mb-12 card">
                                <div class="card-header">Filtros</div>
                                    <form id=form-filtro class="card-body" >
                                        <div class="form-row">
                                            <div class="col-md-4 form-group">
                                                <label for="select-anio">Año de registro</label>
                                                <select name="select-anio" id="select-anio" class="form-control">
                                                    <?php 
                                                    try {
                                                        $sql = "SELECT distinct 
                                                                    YEAR(`fecha_reg`) 'Año'
                                                                FROM 
                                                                    ef1_lm_questions
                                                                ORDER BY 
                                                                    YEAR(`fecha_reg`);";
                                                        $res_anios = $conn->query($sql);
                                                        while($anios = $res_anios->fetch_assoc()){ ?>
                                                            <option value="<?php echo $anios['Año'] ?>"><?php echo $anios['Año'];?></option>
                                                            <?php  }
                                                    } catch (Exception $e) {
                                                        echo "Error:" . $e->getMessage();
                                                    }?>
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="select-mes">Mes de registro</label>
                                                <select name="select-mes" id="select-mes" class="form-control">
                                                    <?php 
                                                    $mes = array(
                                                                    "0" => "Todos",
                                                                    "01" => "Enero",
                                                                    "02" => "Febrero",
                                                                    "03" => "Marzo",
                                                                    "04" => "Abril",
                                                                    "05" => "Mayo",
                                                                    "06" => "Junio",
                                                                    "07" => "Julio",
                                                                    "08" => "Agosto",
                                                                    "09" => "Setiembre",
                                                                    "10" => "Octubre",
                                                                    "11" => "Noviembre",
                                                                    "12" => "Diciembre",
                                                            );
                                                    $mes_actual = date("m");
                                                    foreach ($mes as $x => $x_val) {
                                                        if ($x == $mes_actual) {?>
                                                            <option value="<?php echo $x; ?>" selected><?php echo $x_val; ?></option>
                                                        <?php
                                                        } else {?>
                                                            <option value="<?php echo $x; ?>"><?php echo $x_val; ?></option>
                                                        <?php
                                                        }
                                                    }?>                                            
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="select-estado">Estado de registro</label>
                                                <select name="select-estado" id="select-estado" class="form-control">
                                                    <option value="0">Todos</option>
                                                    <option value="EVALUADO">Evaluado</option>
                                                    <option value="PENDIENTE">Pendiente</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <input type='hidden' name="registro" value="llenar-tabla">
                                        <button id=filtros class="mt-2 px-5 btn btn-primary">Buscar</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped table-bordered table-compact" style="font-size: 0.84rem; width:100%" cellspacing="0">
                                    <thead style="background: linear-gradient(to right, #00B2A9, #21d1c8); color: white;">
                                        <tr>
                                            <th>Estado</th>
                                            <th>Código</th>
                                            <th>Nombres</th>
                                            <th>Desempeño</th>
                                            <th>Área</th>
                                            <th>Turno</th>
                                            <th>Registro</th>
                                            <th>Año</th>
                                            <th>Mes</th>
                                            <th>Acciones&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End main page -->
                <?php include_once 'templates/footer.php'; ?>
<div id="myModal" class="modal fade vista-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles del registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


    
