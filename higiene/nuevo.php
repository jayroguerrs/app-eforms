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
                        <div class="col-md-12">
                            <form role="form" id="guardar-registro" action="modelo-index.php" method="post">
                                <!-- Datos generales -->
                                <div class="card-shadow-primary border mb-3 card card-body">
                                    <h2 class="card-title">Datos Generales</h2>
                                    With supporting text below as a natural lead-in to additional content.                                
                                        
                                    <div class="row">
                                        <div class="col-lg-6" >
                                            <div class="position-relative form-group">
                                                <label for="fecha">Fecha de registro</label>
                                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date("Y-m-d") ?>">  
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="position-relative form-group">
                                                <label>Colaborador</label>
                                                <select id="colaborador-select" name="colaborador-select" data-placeholder="Seleccione un colaborador" data-allow-clear="1">
                                                    <option value=""></option>
                                                    <?php 
                                                    try {
                                                        $sql = "SELECT `cod`, `name`, `performance` FROM `employees` ORDER BY `name`";
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
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="position-relative form-group">
                                                <label for="desem">Desempeño</label>
                                                <input type="text" class="form-control" id="desem" name="desem" placeholder="Ingrese el desempeño" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="position-relative form-group">
                                                <label>Área</label>
                                                <select id="area-select" name="area-select" data-placeholder="Seleccione un área" data-allow-clear="1" >
                                                    <option value=""></option>
                                                    <?php 
                                                    try {
                                                        $sql = "SELECT `idarea` FROM `areas` ORDER BY `idarea`";
                                                        $res_areas = $conn->query($sql);
                                                        while($areas = $res_areas->fetch_assoc()){ ?>
                                                            <option value="<?php echo $areas['idarea'] ?>">
                                                                <?php echo $areas['idarea']; ?>
                                                            </option>
                                                        <?php  }
                                                        } catch (Exception $e) {
                                                            echo "Error:" . $e->getMessage();
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>                          
                                        <div class="col-lg-6">
                                            <div class="position-relative form-group">
                                            <label>Turno</label>
                                            <select id="turno-select" name="turno-select" data-placeholder="Seleccione un Turno" data-allow-clear="1">
                                                <option></option>
                                                <option>MAÑANA</option>
                                                <option>TARDE</option>
                                                <option>NOCHE</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Presentación en el trabajo -->
                            <div class="col-md-12">
                                <div class="card-shadow-primary border mb-3 card card-body">
                                    <h5 class="card-title">Presentación en el trabajo</h5>
                                    With supporting text below as a natural lead-in to additional content.
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>El colaborador se presenta al trabajo con las uñas sin esmalte</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-esmalte" value="SI">Cumple
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-esmalte" value="NO">No cumple
                                                    </label>
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>El colaborador se presenta al trabajo con las uñas correctamente recortadas</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-unas" value="SI">Cumple
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-unas" value="NO">No cumple
                                                    </label>
                                                </div>                  
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>El colaborador se presenta al trabajo sin el uso de joyas y/o accesorios</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-accesorios" value="SI">Cumple
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="opt-accesorios" value="NO">No cumple
                                                    </label>
                                                </div>                  
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <!-- 5 momentos de lavado -->
                            <div class="col-md-12">
                                <div class="card-shadow-primary border mb-3 card card-body">
                                    <h5 class="card-title">Cinco momentos de lavado de mano</h5>
                                    With supporting text below as a natural lead-in to additional content.
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                            <label>¿Desea evaluar el cumplimiento de los 5 momentos del lavado de manos?</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input id="opt-5mom" type="radio" class="form-check-input" name="opt-5mom" value="SI">Si
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-5mom" value="NO">No
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                    </div>
                                    <grupo id="opt-5mom">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>M1. Antes del contacto con el paciente</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m1" value="SI">Cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m1" value="NO">No cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m1" value="NA">No aplica
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                        
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>M2. Antes de una tarea aséptica</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m2" value="SI">Cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m2" value="NO">No cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m2" value="NA">No aplica
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>M3. Después de la exposición a fluidos corporales</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m3" value="SI">Cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m3" value="NO">No cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m3" value="NA">No aplica
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                        
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>M4. Después del contacto con el paciente</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m4" value="SI">Cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m4" value="NO">No cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m4" value="NA">No aplica
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>M5. Después del contacto con el entorno del paciente</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m5" value="SI">Cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m5" value="NO">No cumple
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-m5" value="NA">No aplica
                                            </label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </grupo>
                                </div>
                            </div>
                            <!-- Técnica de lavado de manos con agua y jabón -->
                            <div class="col-md-12">
                                <div class="card-shadow-primary border mb-3 card card-body">
                                    <h5 class="card-title">Técnica de lavado de manos con agua y jabón</h5>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>¿Desea evaluar el cumplimiento de la técnica de lavado de manos con agua y jabón?</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input id="opt-tlm0" type="radio" class="form-check-input" name="opt-tlm0" value="SI">Si
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm0" value="NO">No
                                            </label>
                                            </div>                  
                                        </div>
                                        </div>
                                    </div>
                                    <grupo id="opt-tlm">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Humedecer las manos con agua</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm1" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm1" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Aplicar suficiente jabón para cubrir todas las superficies de las manos</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm2" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm2" value="NO">No cumple
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar con un movimiento de rotación el pulgar izquierdo, atrapándolo con la palma de la mano derecha y viceversa</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm3" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm3" value="NO">No cumple
                                                </label>
                                            </div>                                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar la punta de los dedos de la mano derecha contra la palma de la mano izquierda, haciendo un movimiento de rotación y viceversa</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm4" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm4" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Enjuagar las manos con agua</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm5" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm5" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Secar las manos con una toalla desechable</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm6" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm6" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Usar la toalla desechable para cerrar la llave del caño</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm7" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm7" value="NO">No cumple
                                                </label>
                                            </div>                                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Descartar la toalla desechable en el tacho correspondiente</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm8" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm8" value="NO">No cumple
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Tiempo de realización de la higiene de manos (40 a 60 seg.)</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm9" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlm9" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="comment">Observaciones</label>
                                            <textarea class="form-control" rows="1" id="comment-tlm" name="comment-tlm" maxlength="120"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </grupo>
                                </div>
                            </div>
                            <!-- Técnica de lavado de manos con preparaciones alcohólicas -->
                            <div class="col-md-12">
                                <div class="card-shadow-primary border mb-3 card card-body">
                                    <h5 class="card-title">Técnica de lavado de manos con preparaciones alcohólicas</h5>
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>¿Desea evaluar el cumplimiento de la técnica de lavado de manos con preparaciones alcohólicas?</label>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input id="opt-tlp" type="radio" class="form-check-input" name="opt-tlp0" value="SI">Si
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp0" value="NO">No
                                            </label>
                                            </div>                  
                                        </div>
                                        </div>
                                    </div>
                                    <grupo id="opt-tlp">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Depositar  en la palma de la mano una dosis de producto suficiente</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp1" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp1" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar las palmas de manos entre sí</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp2" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp2" value="NO">No cumple
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar la palma de la mano derecha contra el dorso de la mano izquierda entrelazando los dedos y viceversa</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp3" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp3" value="NO">No cumple
                                                </label>
                                            </div>                                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar la palma de las manos entre sí con los dedos entrelazados</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp4" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp4" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar el dorso de los dedos de una mano con la palma de la mano opuesta, agarrando los dedos</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp5" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp5" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar con un movimiento de rotación el pulgar izquierdo atrapándolo con la palma de la mano derecha y viceversa</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp6" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp6" value="NO">No cumple
                                                </label>
                                            </div>                  
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Frotar la punta de los dedos de la mano derecha contra la palma de la mano izquierda, haciendo un movimiento de rotación y viceversa</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp7" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp7" value="NO">No cumple
                                                </label>
                                            </div>                                  
                                            </div>
                                        </div>
                            
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Tiempo de realización de la higiene de manos (20 a 30 seg.)</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp8" value="SI">Cumple
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="opt-tlp8" value="NO">No cumple
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                            
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label for="comment">Observaciones</label>
                                            <textarea class="form-control" rows="1" id="comment-tlp" name="comment-tlp" maxlength="120"></textarea>
                                            </div>
                                        </div>
                                        </div>
                                    </grupo>
                                </div>
                            </div>
                            <div class="col">
                                <input type="hidden" name="registro" value="nuevo">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End main page -->

<?php include_once 'templates/footer-index.php'; ?>