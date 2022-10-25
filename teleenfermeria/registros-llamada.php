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
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                                <span>Total Llamadas Realizadas</span>
                                                <div class="d-flex align-items-end mt-2">
                                                    <h4 class="mb-0 me-2" id="lblllamadas">21,459</h4>
                                                </div>
                                                <small>Llamadas realizadas dentro del rango</small>
                                            </div>
                                            <span class="badge bg-label-primary rounded p-2">
                                                <i class="bx bx-user bx-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                                <span>Llamadas Contestadas</span>
                                                <div class="d-flex align-items-end mt-2">
                                                    <h4 class="mb-0 me-2" id="lblcontestadas">4,567</h4>
                                                    <small class="text-success" id="lblporccontestadas">(+18%)</small>
                                                </div>
                                                <small>Del total de llamadas realizadas</small>
                                            </div>
                                            <span class="badge bg-label-warning rounded p-2">
                                                <i class="bx bx-phone-call bx-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                                <span>Total Pacientes Conformes</span>
                                                <div class="d-flex align-items-end mt-2">
                                                    <h4 class="mb-0 me-2" id="lblconformes">19,860</h4>
                                                    <small class="text-success" id="lblporcconformes">(-14%)</small>
                                                </div>
                                                <small>Del total de llamadas contestadas</small>
                                            </div>
                                            <span class="badge bg-label-success rounded p-2">
                                                <i class="bx bx-happy-beaming bx-sm"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between">
                                            <div class="content-left">
                                                <span>Total Pacientes No Conformes</span>
                                                <div class="d-flex align-items-end mt-2">
                                                    <h4 class="mb-0 me-2" id="lblnoconformes">237</h4>
                                                    <small class="text-danger" id="lblporcnoconformes">(+42%)</small>
                                                </div>
                                                <small>Del total de llamadas contestadas</small>
                                            </div>
                                                <span class="badge bg-label-danger rounded p-2">
                                                    <i class="bx bx-angry bx-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Begin: Filtro de periodo -->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title mb-4">Filtros de periodo</h5>
                                    <form id="formHospitalizacion">                                    
                                        <div class="demo-vertical-spacing demo-only-element col-sm-6">
                                            <div class="input-group mb-3">
                                                <input type="hidden" name="fechafin" value="<?php echo date('d/m/Y'); ?>">
                                                <input type="hidden" name="fechaini" value="<?php echo date('d/m/Y', strtotime(date('d-m-Y')."-2 month")); ?>">
                                                <input type="hidden" name="nombreusuario" value="<?php echo $_SESSION['apellidos'] . ', ' . $_SESSION['nombres']; ?>">
                                                <input type="hidden" name="rolusuario" value="<?php echo $_SESSION['rol'] ?>">
                                                <input type="text" class="form-control flatpickr-validation me-3" placeholder="Fecha ingreso - Fecha alta" id="ingreso_alta" name="ingreso_alta" readonly="readonly">
                                                <button type="button" class="btn avatar-initial rounded bg-label-danger" name="clear"><i class="bx bx-x"></i></button>
                                                <div class="demo-inline-spacing align-vertical ms-4" id="spinnercarga">
                                                    <span class="spinner-border" style="width: 1rem; height: 1rem;" role="status" aria-hidden="true"></span>
                                                        Cargando...
                                                </div>
                                            </div>
                                        </div>                                      
                                    </form>
                                </div>
                            </div>
                            <!-- End: Filtro de periodo -->
                            <!-- Users List Table -->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h5 class="card-title">Filtros de búsqueda</h5>
                                    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                                        <div class="col-md-4 conf"></div>
                                        <div class="col-md-4 res"></div>
                                        <div class="col-md-4 estado"></div>
                                    </div>
                                </div>
                                <div class="card-datatable table-responsive">
                                    <table class="datatables-users table border-top display compact" id="tabla" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Key</th>
                                                <th>Historia Clínica</th>
                                                <th>Nombres</th>
                                                <th>Conformidad</th>
                                                <th>Responsable</th>
                                                <th>Inicio LLamada</th>
                                                <th>Estado</th>
                                                <th>Edad</th>
                                                <th>Fecha Ingreso</th>
                                                <th>Fecha Alta</th>
                                                <th>Compañía</th>
                                                <th>Diagnóstico</th>
                                                <th>Fin Llamada</th>
                                                <th>Clasificación</th>
                                                <th>Acción</th>
                                                <th>Observaciones</th>
                                                <th>Nombres </th>
                                                <th>Apellidos</th>
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
                                    <h3>Editar información de registro</h3>
                                    <p>A continuación puede editar la información de la llamada del registro.</p>
                                    </div>
                                    <form id="editUserForm" class="row g-3" onsubmit="return false">
                                        <div class="col-12">
                                            <h6 class="fw-semibold" style="color: #00B2A9 !important;"><i class='bx bxs-user'></i>  Datos del paciente</h6>
                                            <hr class="mt-0" style="color: #00B2A9 !important;"/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editid">Key</label>
                                            <input type="number" id="editid" name="editid" class="form-control" readonly/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="edithc">Historia Clínica</label>
                                            <input type="number" id="edithc" name="edithc" class="form-control" placeholder="0115486"/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editnomb">Nombres</label>
                                            <input type="text" id="editnomb" name="editnomb" class="form-control" placeholder="Nombre paciente"/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editapell">Apellidos</label>
                                            <input type="text" id="editapell" name="editapell" class="form-control" placeholder="Apellidos del paciente"/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editedad">Edad</label>
                                            <input type="number" id="editedad" name="editedad" class="form-control" placeholder="29"/>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editfecinout">Fecha de ingreso y alta</label>
                                            <input type="text" id="editfecinout" name="editfecinout" class="form-control" placeholder="Ingrese fechas"/>
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editservicio">Servicio</label>
                                            <select id="editservicio" name="editservicio" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione un servicio">
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
                                        
                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="edithab">Habitación</label>
                                            <input type="text" id="edithab" name="edithab" class="form-control" placeholder="Ingrese habitacion" />
                                        </div>
                                        
                                        <div class="col-12 col-md-6">
                                            <label class="switch-label ms-2">¿Tiene seguro?</label><br>
                                            <input type="checkbox" class="form-check-input" id="editseguro" name="editseguro" />
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label class="form-label" for="editcomp">Compañía</label>
                                            <select id="editcomp" name="editcomp" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una compañía">
                                                <option value=""></option>
                                                <?php
                                                    $sql = "SELECT seguro FROM seguros; ";
                                                    $result = $conn->query($sql);
                                                    if($result->num_rows > 0) {
                                                        while($comp = $result->fetch_assoc()) { ?>
                                                            <option value="<?php echo $comp['seguro']; ?>"><?php echo $comp['seguro']; ?></option>
                                                        <?php }
                                                    }
                                                ?> 
                                            </select>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <label class="form-label" for="editdx">Diagnóstico Médico</label>
                                            <input type="text" id="editdx" name="editdx" class="form-control" placeholder="Ingrese diagnóstico médico" />
                                        </div>

                                        <div class="col-12 pt-3">
                                            <h6 class="fw-semibold" style="color: #00B2A9 !important;"><i class='bx bxs-user'></i>  Datos de la llamada</h6>
                                            <hr class="mt-0" style="color: #00B2A9 !important;"/>
                                        </div>

                                        <div class="col-12 col-md-5" >
                                        <label for="editestado" class="form-label">Estado de la llamada</label>
                                            <select id="editestado" name="editestado" class="select2-icons form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una opción">
                                                <option value=""></option>
                                                <option data-icon="bx bx-phone-incoming" value="CONTESTADA">Contestada</option>
                                                <option data-icon="bx bx-phone-off" value="NO CONTESTADA">No contestada</option>
                                                <option data-icon="bx bx-x-circle" value="NÚMERO INCORRECTO">Sin número</option>
                                                <option data-icon="bx bx-ghost" value="SIN NÚMERO">Sin número</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-12 col-md-7">
                                            <label for="editinoutllamada" class="form-label">Inicio y fin de la llamada</label>
                                            <input type="text" class="form-control flatpickr-validation" placeholder="Inicio llamada - Fin llamada" id="editinoutllamada" name="editinoutllamada" readonly>
                                        </div>
                                        
                                        <div class="col-12 col-md-5">
                                            <label class="form-label" for="editconformidad">Conformidad de la atención</label>
                                            <select id="editconformidad" name="editconformidad" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una opción">
                                                <option value=""></option>
                                                <option value="ES CONFORME">Es conforme</option>
                                                <option value="NO ES CONFORME">No es conforme</option>
                                                <option value="NO SE PUDO EVALUAR">No se pudo evaluar</option>
                                                <option value="NO OPINÓ AL RESPECTO">No opinó al respecto</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <label class="form-label" for="editclasificacion">Clasificación del incidente</label>
                                            <select id="editclasificacion" name="editclasificacion" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una clasificación">
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
                                        <div class="col-12 col-md-5">
                                            <label class="form-label" for="editaccion">Acción implementada</label>
                                            <select id="editaccion" name="editaccion" class="form-select select2 formValidationSelect2" data-allow-clear="true" data-placeholder="Seleccione una acción">
                                                <option value=""></option>
                                                <option value="DERIVACIÓN AL ÁREA RESPECTIVA">Derivación al área respectiva</option>
                                                <option value="CONCILIACIÓN CON EL PACIENTE">Conciliación con el paciente</option>
                                                <option value="DERIVACIÓN A CALIDAD">Derivación a calidad</option>
                                                <option value="SEGUIMIENTO AL PERSONAL INVOLUCRADO">Seguimiento al personal</option>
                                                <option value="MEDIDAS DISCIPLINARIAS">Medidas disciplinarias</option>
                                                <option value="DERIVACIÓN A DIRECCIÓN DE ENFERMERÍA">Derivación a Dirección</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <label class="form-label" for="editobs">Observaciones</label>
                                            <textarea class="form-control" id="editobs" name="editobs" rows="93" style="height: 78px;" placeholder="Escriba sus obvsercaciones..."></textarea>
                                        </div>
                                        
                                        <div class="col-12 text-center pt-4">
                                            <input type="hidden" name="registro" value="edithosp">
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