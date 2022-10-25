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
                            <span class="text-muted fw-light">Llamadas /</span> Agregar
                        </h4>
                        <div class="row">
                            <!-- Hospitalización BD -->
                            <div class="col-12">
                                <div class="card">
                                    <h5 class="card-header fw-bold" >Hospitalización y emergencias</h5>
                                    <div class="card-body">
                                        <form id="formHospitalizacion" class="row g-3" method="POST">
                                            <!-- Account Details -->
                                            <div class="col-12">
                                                <h6 class="fw-semibold" style="color: #00B2A9 !important;"><i class='bx bxs-user'></i>  Datos del paciente</h6>
                                                <hr class="mt-0" style="color: #00B2A9 !important;"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="hc">Historia clínica</label>
                                                <input type="text" id="hc" class="form-control" placeholder="0121575" name="hc" maxlength="7"/>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="nombres">Nombres</label>
                                                <input class="form-control" type="text" id="nombres" name="nombres" placeholder="Juan Ramiro" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label" for="apellidos">Apellidos</label>
                                                <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Perez Ochoa" />
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="edad">Edad</label>
                                                <input class="form-control" type="number" id="edad" name="edad" placeholder="25" min="1" max="120"/>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <label for="ingreso_alta" class="form-label">Fecha de ingreso y alta</label>
                                                <input type="text" class="form-control flatpickr-validation" placeholder="Fecha ingreso - Fecha alta" id="ingreso_alta" name="ingreso_alta" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="servicio">Servicio</label>
                                                <select id="servicio" name="servicio" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione un servicio">
                                                    <option value=""></option>
                                                    <?php
                                                        $sql = "SELECT idarea, location FROM areas; ";
                                                        $result = $conn->query($sql);
                                                        if($result->num_rows > 0) {
                                                            while($row = $result->fetch_assoc()) { ?>
                                                                <option value="<?php echo $row['idarea']; ?>"><?php echo $row['location']; ?></option>
                                                            <?php }
                                                        }
                                                    ?>    
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label" for="hab">Habitación</label>
                                                <input class="form-control" type="text" id="hab" name="hab" placeholder="404" />
                                            </div>
                                            <div class="col-md-2">
                                                <input type="checkbox" class="form-check-input" id="chk_seguro" name="chk_seguro" />
                                                <label class="form-check-label" for="chk_seguro">¿Tiene seguro?</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="comp_seguro">Compañía de seguro</label>
                                                <select id="comp_seguro" name="comp_seguro" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una compañía">
                                                    <option value=""></option>
                                                    <?php
                                                        $sql = "SELECT idseguros, seguro FROM seguros WHERE estado = '1';";
                                                        $result = $conn->query($sql);
                                                        if($result->num_rows > 0) {
                                                            while($row = $result -> fetch_assoc()){?>
                                                                <option value="<?php echo $row['idseguros']; ?>"><?php echo $row['seguro']; ?></option>
                                                            <?php }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="dx" class="form-label">Diagnóstico médico</label>
                                                <textarea class="form-control" id="dx" rows="3" name="dx" style="height: 39px;" placeholder="Escriba el diagnóstico del médico"></textarea>
                                            </div>
                                            <!-- Personal Info -->
                                            <div class="col-12">
                                                <h6 class="mt-2 fw-semibold" style="color: #00B2A9 !important;"><i class='bx bxs-detail'></i>  Detalles de la llamada</h6>
                                                <hr class="mt-0" style="color: #00B2A9 !important;"/>
                                            </div>
                                            <div class="col-md-3" >
                                            <label for="estado" class="form-label">Estado de la llamada</label>
                                                <select id="estado" name="estado" class="select2-icons form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una opción">
                                                    <option value=""></option>
                                                    <option data-icon="bx bx-phone-incoming" value="CONTESTADA">Contestada</option>
                                                    <option data-icon="bx bx-phone-off" value="NO CONTESTADA">No contestada</option>
                                                    <option data-icon="bx bx-x-circle" value="NÚMERO INCORRECTO">Sin número</option>
                                                    <option data-icon="bx bx-ghost" value="SIN NÚMERO">Sin número</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <label for="inoutllamada" class="form-label">Inicio y fin de la llamada</label>
                                                <input type="text" class="form-control flatpickr-validation" placeholder="Inicio llamada - Fin llamada" id="inoutllamada" name="inoutllamada" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="conformidad">Conformidad de la atención</label>
                                                <select id="conformidad" name="conformidad" class="select2-icons form-select formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una opción">
                                                    <option value=""></option>
                                                    <option data-icon="bx bx-check" value="ES CONFORME">Es conforme</option>
                                                    <option data-icon="bx bx-x" value="NO ES CONFORME">No es conforme</option>
                                                    <option data-icon="bx bxs-hand" value="NO SE PUDO EVALUAR">No se pudo evaluar</option>
                                                    <option data-icon="bx bx-no-entry" value="NO OPINÓ AL RESPECTO">No opinó al respecto</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="clasificacion">Clasificación del incidente</label>
                                                <select id="clasificacion" name="clasificacion" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una clasificación">
                                                    <option value=""></option>
                                                    <option value='RECLAMO POR ATENCIÓN DE ENFERMERÍA HOSPITALIZACION'>RECLAMO POR ATENCIÓN DE ENFERMERÍA HOSPITALIZACION</option>
                                                    <option value='RECLAMO POR ATENCIÓN MÉDICA'>RECLAMO POR ATENCIÓN MÉDICA</option>
                                                    <option value='RECLAMO POR HOTELERIA'>RECLAMO POR HOTELERIA</option>
                                                    <option value='RECLAMO POR LIMPIEZA'>RECLAMO POR LIMPIEZA</option>
                                                    <option value='RECLAMO POR SEGURIDAD DE INSTALACIONES'>RECLAMO POR SEGURIDAD DE INSTALACIONES</option>
                                                    <option value='RECLAMO POR ADMISIONISTA'>RECLAMO POR ADMISIONISTA</option>
                                                    <option value='RECLAMO POR LABORATORIO'>RECLAMO POR LABORATORIO</option>
                                                    <option value='RECLAMO POR DEMORA FACTURACIÓN'>RECLAMO POR DEMORA FACTURACIÓN</option>
                                                    <option value='RECLAMO POR CARTA DE GARANTIA'>RECLAMO POR CARTA DE GARANTIA</option>
                                                    <option value='RECLAMO ATENCIÓN DE ENFERMERIA EN EMERGENCIA'>RECLAMO ATENCIÓN DE ENFERMERIA EN EMERGENCIA</option>
                                                    <option value='RECLAMO ATENCIÓN DE ENFERMERIA EN SOP'>RECLAMO ATENCIÓN DE ENFERMERIA EN SOP</option>
                                                    <option value='RECLAMO POR NUTRICIÓN'>RECLAMO POR NUTRICIÓN</option>
                                                    <option value='RECLAMO FACTURACIÓN DE CUENTA'>RECLAMO FACTURACIÓN DE CUENTA</option>
                                                    <option value='RECLAMO POR SERVICIO DE IMAGENES'>RECLAMO POR SERVICIO DE IMAGENES</option>
                                                    <option value='RECLAMO POR SERVICIO DE ECOGRAFÍA'>RECLAMO POR SERVICIO DE ECOGRAFÍA</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="accion">Acción implementada</label>
                                                <select id="accion" name="accion" class="select2-icons form-select formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una acción">
                                                    <option value=""></option>
                                                    <option data-icon="bx bx-chevron-right" value="DERIVACIÓN AL ÁREA RESPECTIVA">Derivación al área respectiva</option>
                                                    <option data-icon="bx bx-user-check" value="CONCILIACIÓN CON EL PACIENTE">Conciliación con el paciente</option>
                                                    <option data-icon="bx bx-chevrons-right" value="DERIVACIÓN A CALIDAD">Derivación a calidad</option>
                                                    <option data-icon="bx bx-low-vision" value="SEGUIMIENTO AL PERSONAL INVOLUCRADO">Seguimiento al personal</option>
                                                    <option data-icon="bx bx-ruler" value="MEDIDAS DISCIPLINARIAS">Medidas disciplinarias</option>
                                                    <option data-icon="bx bx-building-house" value="DERIVACIÓN A DIRECCIÓN DE ENFERMERÍA">Derivación a Dirección</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="obs">Observaciones</label>
                                                <textarea class="form-control" id="obs" name="obs" rows="3" style="height: 39px;" placeholder="Escriba sus obvsercaciones..."></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" id="enviar1" name="submitButton" class="btn btn-primary">Enviar</button>
                                            </div>
                                            <input type="hidden" name="responsable" value="<?php echo $_SESSION['apellidos'] . ', ' . $_SESSION['nombres'] ;?>"></input>
                                            <input type="hidden" name="registro" value="hospitalizacion"></input>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Hospitalización BD -->
                        </div>
                    </div>
                    <!-- /Content --> 
<?php include_once 'templates/footer.php'; ?>