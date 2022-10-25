<?php
include_once 'includes/funciones.php';

// funciones
if($_POST['registro'] == 'nuevo'){
    $fec = (!empty($_POST['fecha']))            ?   $_POST['fecha']         : NULL;
    $cod = (!empty($_POST["colaborador-select"])) ? $_POST["colaborador-select"] : NULL;    
    $area = (!empty($_POST['area-select']))     ?   $_POST['area-select']   : NULL;
    $turno = (!empty($_POST['turno-select']))   ?   $_POST['turno-select']  : NULL;
    $pt1 = (!empty($_POST['opt-esmalte']))      ?   $_POST['opt-esmalte']   : NULL;
    $pt2 = (!empty($_POST['opt-unas']))         ?   $_POST['opt-unas']      : NULL;
    $pt3 = (!empty($_POST['opt-accesorios']))   ?   $_POST['opt-accesorios']: NULL;    
    $m0 = (!empty($_POST['opt-5mom']))          ?   $_POST['opt-5mom']      : NULL;
    $m1 = (!empty($_POST['opt-m1']))            ?   $_POST['opt-m1']        : NULL;
    $m2 = (!empty($_POST['opt-m2']))            ?   $_POST['opt-m2']        : NULL;
    $m3 = (!empty($_POST['opt-m3']))            ?   $_POST['opt-m3']        : NULL;
    $m4 = (!empty($_POST['opt-m4']))            ?   $_POST['opt-m4']        : NULL;
    $m5 = (!empty($_POST['opt-m5']))            ?   $_POST['opt-m5']        : NULL;
    $tlm0 = (!empty($_POST['opt-tlm0']))        ?   $_POST['opt-tlm0']      : NULL;
    $tlm1 = (!empty($_POST['opt-tlm1']))        ?   $_POST['opt-tlm1']      : NULL;
    $tlm2 = (!empty($_POST['opt-tlm2']))        ?   $_POST['opt-tlm2']      : NULL;
    $tlm3 = (!empty($_POST['opt-tlm3']))        ?   $_POST['opt-tlm3']      : NULL;
    $tlm4 = (!empty($_POST['opt-tlm4']))        ?   $_POST['opt-tlm4']      : NULL;
    $tlm5 = (!empty($_POST['opt-tlm5']))        ?   $_POST['opt-tlm5']      : NULL;
    $tlm6 = (!empty($_POST['opt-tlm6']))        ?   $_POST['opt-tlm6']      : NULL;
    $tlm7 = (!empty($_POST['opt-tlm7']))        ?   $_POST['opt-tlm7']      : NULL;
    $tlm8 = (!empty($_POST['opt-tlm8']))        ?   $_POST['opt-tlm8']      : NULL;
    $tlm9 = (!empty($_POST['opt-tlm9']))        ?   $_POST['opt-tlm9']      : NULL;
    $tlm10 = (!empty($_POST['comment-tlm']))    ?   $_POST['comment-tlm']   : NULL;
    $tlp0 = (!empty($_POST['opt-tlp0']))        ?   $_POST['opt-tlp0']      : NULL;
    $tlp1 = (!empty($_POST['opt-tlp1']))        ?   $_POST['opt-tlp1']      : NULL;
    $tlp2 = (!empty($_POST['opt-tlp2']))        ?   $_POST['opt-tlp2']      : NULL;
    $tlp3 = (!empty($_POST['opt-tlp3']))        ?   $_POST['opt-tlp3']      : NULL;
    $tlp4 = (!empty($_POST['opt-tlp4']))        ?   $_POST['opt-tlp4']      : NULL;
    $tlp5 = (!empty($_POST['opt-tlp5']))        ?   $_POST['opt-tlp5']      : NULL;
    $tlp6 = (!empty($_POST['opt-tlp6']))        ?   $_POST['opt-tlp6']      : NULL;
    $tlp7 = (!empty($_POST['opt-tlp7']))        ?   $_POST['opt-tlp7']      : NULL;
    $tlp8 = (!empty($_POST['opt-tlp8']))        ?   $_POST['opt-tlp8']      : NULL;
    $tlp9 = (!empty($_POST['comment-tlp']))     ?   $_POST['comment-tlp']   : NULL;

    try {     
        $stmt = $conn->prepare("INSERT IGNORE INTO `ef1_lm_questions` (`fecha_reg`, `cod`, `area`, `turno`, `pt_unas_sin_esmalte`, `pt_unas_cortadas`, `pt_sin_joyas`, `5m_sino`, `5m_m1_antes_contacto`, `5m_m2_antes_aseptica`, `5m_m3_despues_fluidos`, `5m_m4_despues_contacto`, `5m_m5_despues_entorno`, `tlm_sino`, `tlm1_humedecer_manos`, `tlm2_aplicar_jabon`, `tlm3_frotar_pulgar`, `tlm4_frotar_dedos`, `tlm5_enjuagar`, `tlm6_secar_manos`, `tlm7_cerrar_llave`, `tlm8_descartar_toalla`, `tlm9_tiempo`, `tlm10_obs`, `tlp_sino`, `tlp1_depositar`, `tlp2_frotar_palmas`, `tlp3_frotar_dorso_mano`, `tlp4_frotar_manos_dedos`, `tlp5_frotar_dorso_dedos`, `tlp6_rotacion_pulgar`, `tlp7_punta_palma`, `tlp8_tiempo`, `tlp9_obs`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssssssssssssssssssssssssssss", $fec, $cod, $area, $turno, $pt1, $pt2, $pt3, $m0, $m1, $m2, $m3, $m4, $m5, $tlm0, $tlm1, $tlm2, $tlm3, $tlm4, $tlm5, $tlm6, $tlm7, $tlm8, $tlm9, $tlm10, $tlp0, $tlp1, $tlp2, $tlp3, $tlp4, $tlp5, $tlp6, $tlp7, $tlp8, $tlp9) ;        
        $stmt->execute();
        $rows = $stmt->affected_rows;

        $respuesta = array(
            'rows' => $rows
        );
        // $stmt->error
        if($rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',                
                'id_actualizado' => $stmt->insert_id
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

// Para llenar tabla de registros
if($_POST['registro'] == 'llenar-tabla'){ 
    $anio = $_POST['anio'];
    $str_mes = ($_POST['mes'] == 0) ? "" : "AND MONTH(Q.fecha_reg) = '".$_POST['mes']."'";
    $str_st = ($_POST['st'] == 0) ? "" : "AND IF(E.cod = Q.cod, 'EVALUADO', 'PENDIENTE') = '".$_POST['st']."'" ;
    try {
        $sql = "SELECT 
                    IF(E.cod = Q.cod, 'EVALUADO', 'PENDIENTE') 'SS',
                    E.`cod` 'Código', 
                    E.`name` 'Nombres', 
                    E.`performance` 'Desempeño', 
                    Q.`area` 'Área',
                    Q.`turno` 'Turno',
                    YEAR(Q.`fecha_reg`) 'Año',
                    CASE
                        WHEN MONTH(Q.`fecha_reg`) = 1 THEN 'ENERO'
                        WHEN MONTH(Q.`fecha_reg`) = 2 THEN 'FEBRERO'
                        WHEN MONTH(Q.`fecha_reg`) = 3 THEN 'MARZO'
                        WHEN MONTH(Q.`fecha_reg`) = 4 THEN 'ABRIL'
                        WHEN MONTH(Q.`fecha_reg`) = 5 THEN 'MAYO'
                        WHEN MONTH(Q.`fecha_reg`) = 6 THEN 'JUNIO'
                        WHEN MONTH(Q.`fecha_reg`) = 7 THEN 'JULIO'
                        WHEN MONTH(Q.`fecha_reg`) = 8 THEN 'AGOSTO'
                        WHEN MONTH(Q.`fecha_reg`) = 9 THEN 'SETIEMBRE'
                        WHEN MONTH(Q.`fecha_reg`) = 10 THEN 'OCTUBRE'
                        WHEN MONTH(Q.`fecha_reg`) = 11 THEN 'NOVIEMBRE'
                        WHEN MONTH(Q.`fecha_reg`) = 12 THEN 'DICIEMBRE'
                        ELSE NULL
                    END 'Mes',
                    DATE_FORMAT(Q.`fecha_reg`, '%d/%m/%Y') 'Fecha',
                    CONCAT(E.`cod`, '_', Q.`fecha_reg`) 'Especial'
                FROM 
                    employees E
                LEFT JOIN ef1_lm_questions Q ON E.cod = Q.cod AND (YEAR(Q.fecha_reg) = '" .$anio. "' " .$str_mes. ")
                WHERE E.status = 'OK'" .$str_st. "";
        $resultado = $conn->query($sql);
        while($personal = $resultado->fetch_assoc()){
            $arreglo['data'][] = $personal;
        }
        json_encode($arreglo);         
        
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
    $conn->close();
    die(json_encode($arreglo));
}

// Para autocompletar datos
if($_POST['registro'] == 'autocompletar'){
    $codigo = $_POST['cod']; 

    try {
        $stmt = $conn->prepare("SELECT dni, performance, jobtitle, nationality, status, email, ef_super FROM employees WHERE cod = ? ");        
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $stmt->bind_result($dni, $desempeno, $ocupacion, $nacion, $estado, $correo, $super);
        if($stmt->affected_rows) {            
            if($stmt->fetch()) {
                $respuesta = array(
                    'respuesta' => 'correcto',
                    'dni'=> $dni,
                    'desemp'=> $desempeno,
                    'ocup'=> $ocupacion,
                    'nacion'=> $nacion,
                    'estado'=> $estado,
                    'correo'=> $correo,
                    'supervisor'=> $super
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}

// Llenar modal
if($_POST['registro'] == 'modal'){
    $codigo = $_POST['cod']; 
    $fecha = $_POST['fecha']; 
    
    try {
        $stmt = $conn->prepare("SELECT 
                                    E.`id`,
                                    T.`name`,
                                    T.`performance`,
                                    T.`jobtitle`,
                                    T.`email`,                                    
                                    E.`fecha_reg`,
                                    E.`cod`,
                                    E.`area`,
                                    E.`turno`,
                                    E.`pt_unas_sin_esmalte`,
                                    E.`pt_unas_cortadas`,
                                    E.`pt_sin_joyas`,
                                    E.`5m_sino`,
                                    E.`5m_m1_antes_contacto`,
                                    E.`5m_m2_antes_aseptica`,
                                    E.`5m_m3_despues_fluidos`,
                                    E.`5m_m4_despues_contacto`,
                                    E.`5m_m5_despues_entorno`,
                                    IF(E.`5m_m1_antes_contacto` = 'NO' OR E.`5m_m2_antes_aseptica` = 'NO' OR E.`5m_m3_despues_fluidos` = 'NO' OR E.`5m_m4_despues_contacto` = 'NO' OR E.`5m_m5_despues_entorno` = 'NO', 'No cumple', IF(E.`5m_sino` = 'NO', 'No aplica', 'Cumple')),
                                    E.`tlm_sino`,
                                    E.`tlm1_humedecer_manos`,
                                    E.`tlm2_aplicar_jabon`,
                                    E.`tlm3_frotar_pulgar`,
                                    E.`tlm4_frotar_dedos`,
                                    E.`tlm5_enjuagar`,
                                    E.`tlm6_secar_manos`,
                                    E.`tlm7_cerrar_llave`,
                                    E.`tlm8_descartar_toalla`,
                                    E.`tlm9_tiempo`,
                                    E.`tlm10_obs`,
                                    IF(E.`tlm1_humedecer_manos` = 'NO' OR E.`tlm2_aplicar_jabon` = 'NO' OR E.`tlm3_frotar_pulgar` = 'NO' OR E.`tlm4_frotar_dedos` = 'NO' OR E.`tlm5_enjuagar` = 'NO' OR E.`tlm6_secar_manos` = 'NO' OR E.`tlm7_cerrar_llave` = 'NO' OR  E.`tlm8_descartar_toalla` = 'NO' OR E.`tlm9_tiempo` = 'NO', 'No cumple', IF(E.`tlm_sino` = 'NO', 'No aplica', 'Cumple')),
                                    E.`tlp_sino`,
                                    E.`tlp1_depositar`,
                                    E.`tlp2_frotar_palmas`,
                                    E.`tlp3_frotar_dorso_mano`,
                                    E.`tlp4_frotar_manos_dedos`,
                                    E.`tlp5_frotar_dorso_dedos`,
                                    E.`tlp6_rotacion_pulgar`,
                                    E.`tlp7_punta_palma`,
                                    E.`tlp8_tiempo`,
                                    E.`tlp9_obs`,
                                    IF(E.`tlp1_depositar` = 'NO' OR E.`tlp2_frotar_palmas` = 'NO' OR E.`tlp3_frotar_dorso_mano` = 'NO' OR E.`tlp4_frotar_manos_dedos` = 'NO' OR E.`tlp5_frotar_dorso_dedos` = 'NO' OR E.`tlp6_rotacion_pulgar` = 'NO' OR E.`tlp7_punta_palma` = 'NO' OR  E.`tlp8_tiempo` = 'NO', 'No cumple', IF(E.`tlp_sino` = 'NO', 'No aplica', 'Cumple'))
                                FROM 
                                    ef1_lm_questions E
                                    INNER JOIN employees T ON T.`cod` = E.`cod`
                                WHERE 
                                    E.cod = ? AND E.`fecha_reg` = ?");        
        $stmt->bind_param("ss", $codigo, $fecha);
        $stmt->execute();
        $stmt->bind_result($id, $name, $performance, $jobtitle, $email, $fecha_reg, $cod, $area, $turno, $pt_unas_sin_esmalte, 
                           $pt_unas_cortadas, $pt_sin_joyas, $m5_sino, $m5_m1_antes_contacto, $m5_m2_antes_aseptica, 
                           $m5_m3_despues_fluidos, $m5_m4_despues_contacto, $m5_m5_despues_entorno, $m5_cumple, $tlm_sino, 
                           $tlm1_humedecer_manos, $tlm2_aplicar_jabon, $tlm3_frotar_pulgar, $tlm4_frotar_dedos, 
                           $tlm5_enjuagar, $tlm6_secar_manos, $tlm7_cerrar_llave, $tlm8_descartar_toalla, $tlm9_tiempo, 
                           $tlm10_obs, $tlm_cumple, $tlp_sino, $tlp1_depositar, $tlp2_frotar_palmas, $tlp3_frotar_dorso_mano, 
                           $tlp4_frotar_manos_dedos, $tlp5_frotar_dorso_dedos, $tlp6_rotacion_pulgar, $tlp7_punta_palma, $tlp8_tiempo, $tlp9_obs, $tlp_cumple);
        if($stmt->affected_rows) {            
            if($stmt->fetch()) {
                switch ($m5_cumple) {
                    case "Cumple":
                        $clase_m5 = 'text-success';
                        $icono_m5 = 'fa-angle-up';
                      break;
                    case "No cumple":
                        $clase_m5 = 'text-danger';
                        $icono_m5 = 'fa-angle-down';
                      break;
                    case "No aplica":
                        $clase_m5 = 'text-info';
                        $icono_m5 = 'fa-minus';
                      break;                    
                  }
                  switch ($tlm_cumple) {
                    case "Cumple":
                        $clase_tlm = 'text-success';
                        $icono_tlm = 'fa-angle-up';
                      break;
                    case "No cumple":
                        $clase_tlm = 'text-danger';
                        $icono_tlm = 'fa-angle-down';
                      break;
                    case "No aplica":
                        $clase_tlm = 'text-info';
                        $icono_tlm = 'fa-minus';
                      break;                    
                  }
                  switch ($tlp_cumple) {
                    case "Cumple":
                        $clase_tlp = 'text-success';
                        $icono_tlp = 'fa-angle-up';
                      break;
                    case "No cumple":
                        $clase_tlp = 'text-danger';
                        $icono_tlp = 'fa-angle-down';
                      break;
                    case "No aplica":
                        $clase_tlp = 'text-info';
                        $icono_tlp = 'fa-minus';
                      break;                    
                  }
                

                $r .= '<div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-primary border-primary card">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content">
                                            <div class="widget-title opacity-5 text-uppercase">Cinco momentos de lavado de manos</div>
                                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                                <div class="widget-chart-flex align-items-center">
                                                    <div class="' . $clase_m5 . '" style="font-size: 1.6rem; !important">
                                                        <span class="opacity-10 pr-2">
                                                            <i class="fa '. $icono_m5 .'"></i>
                                                        </span>
                                                            ' . $m5_cumple . '
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-danger border-danger card">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content">
                                            <div class="widget-title opacity-5 text-uppercase">Lavado de manos con agua y jabón</div>
                                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                                <div class="widget-chart-flex align-items-center">
                                                    <div class="' . $clase_tlm .'" style="font-size: 1.6rem; !important">
                                                        <span class="opacity-10 pr-2">
                                                            <i class="fa '. $icono_tlm .'"></i>
                                                        </span>
                                                            ' . $tlm_cumple . '
                                                        </div>                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="widget-chart widget-chart2 text-left mb-3 card-btm-border card-shadow-warning border-warning card">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content">
                                            <div class="widget-title opacity-5 text-uppercase">Lavado con preparacion alcohólicas</div>
                                            <div class="widget-numbers mt-2 fsize-4 mb-0 w-100">
                                                <div class="widget-chart-flex align-items-center">
                                                    <div class="' . $clase_tlp. '" style="font-size: 1.6rem; !important">
                                                        <span class="opacity-10 pr-2">
                                                            <i class="fa '. $icono_tlp .'"></i>
                                                        </span>    
                                                            ' . $tlp_cumple . '
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>';

                $r .= "<table>";

                $r .= "<tr>";
                $r .= "<td class='pb-3' style='width: 400px;'><b>Datos generales</b> </td>";
                $r .= "</tr>";

                $r .= "<tr class='py-3'>";
                $r .= "<td class='pr-3'>Código </td><td>:</td> <td class='pl-3'>".$cod."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='pr-3'>Nombres y Apellidos </td><td>:</td> <td class='pl-3'>".$name."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='pr-3'>Desempeño </td><td>:</td> <td class='pl-3'>".$performance."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='pr-3'>Ocupación </td><td>:</td> <td class='pl-3'>".$jobtitle."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='pr-3'>Correo electrónico </td><td>:</td> <td class='pl-3'>".$email."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='pr-3'>Fecha de registro </td><td>:</td> <td class='pl-3'>".$fecha_reg."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Turno </td><td>:</td> <td class='pl-3'>".$turno."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='py-3'><b>Presentación personal</b> </td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>El colaborador se presenta al trabajo sin el uso de joyas y/o accesorios </td><td>:</td> <td class='pl-3'>".$pt_sin_joyas."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>El colaborador se presenta al trabajo con las uñas sin esmalte </td><td>:</td> <td class='pl-3'>".$pt_unas_sin_esmalte."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>El colaborador se presenta al trabajo con las uñas correctamente recortadas </td><td>:</td> <td class='pl-3'>".$pt_unas_cortadas."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='py-3'><b>Cinco momentos del lavado de manos</b> </td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>¿Desea evaluar el cumplimiento de los 5 momentos del lavado de manos? </td><td>:</td> <td class='pl-3'>".$m5_sino."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>M1. Antes del contacto con el paciente </td><td>:</td> <td class='pl-3'>".$m5_m1_antes_contacto."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>M2. Antes de una tarea aséptica </td><td>:</td> <td class='pl-3'>".$m5_m2_antes_aseptica."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>M3. Después de la exposición a fluidos corporales </td><td>:</td> <td class='pl-3'>".$m5_m3_despues_fluidos."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>M4. Después del contacto con el paciente </td><td>:</td> <td class='pl-3'>".$m5_m4_despues_contacto."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>M5. Después del contacto con el entorno del paciente </td><td>:</td> <td class='pl-3'>".$m5_m5_despues_entorno."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>¿Desea evaluar el cumplimiento de la técnica de lavado de manos con agua y jabón? </td><td>:</td> <td class='pl-3'>".$tlm_sino."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>";
                $r .= "<td class='py-3'><b>Técnicas de lavado de manos con agua y jabón</b> </td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Humedecer las manos con agua </td><td>:</td> <td class='pl-3'>".$tlm1_humedecer_manos."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Aplicar suficiente jabón para cubrir todas las superficies de las manos </td><td>:</td> <td class='pl-3'>".$tlm2_aplicar_jabon."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar con un movimiento de rotación el pulgar izquierdo, atrapándolo con la palma de la mano derecha y viceversa </td><td>:</td> <td class='pl-3'>".$tlm3_frotar_pulgar."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar la punta de los dedos de la mano derecha contra la palma de la mano izquierda, haciendo un movimiento de rotación y viceversa </td><td>:</td> <td class='pl-3'>".$tlm4_frotar_dedos."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Enjuagar las manos con agua </td><td>:</td> <td class='pl-3'>".$tlm5_enjuagar."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Secar las manos con una toalla desechable </td><td>:</td> <td class='pl-3'>".$tlm6_secar_manos."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Usar la toalla desechable para cerrar la llave del caño </td><td>:</td> <td class='pl-3'>".$tlm7_cerrar_llave."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Descartar la toalla desechable en el tacho correspondiente </td><td>:</td> <td class='pl-3'>".$tlm8_descartar_toalla."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Tiempo de realización de la higiene de manos (40 a 60 seg.) </td><td>:</td> <td class='pl-3'>".$tlm9_tiempo."</td>";
                $r .= "</tr>";
                
                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Observaciones </td><td>:</td> <td class='pl-3'>".$tlm10_obs."</td>";
                $r .= "</tr>";

                $r .= "<tr>";
                $r .= "<td class='py-3'><b>Técnicas de lavado de manos con preparaciones alcohólicas</b></td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>¿Desea evaluar el cumplimiento de la técnica de lavado de manos con preparaciones alcohólicas? </td><td>:</td> <td class='pl-3'>".$tlp_sino."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Depositar  en la palma de la mano una dosis de producto suficiente </td><td>:</td> <td class='pl-3'>".$tlp1_depositar."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar las palmas de manos entre sí </td><td>:</td> <td class='pl-3'>".$tlp2_frotar_palmas."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar la palma de la mano derecha contra el dorso de la mano izquierda entrelazando los dedos y viceversa </td><td>:</td> <td class='pl-3'>".$tlp3_frotar_dorso_mano."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar la palma de las manos entre sí con los dedos entrelazados </td><td>:</td> <td class='pl-3'>".$tlp4_frotar_manos_dedos."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar el dorso de los dedos de una mano con la palma de la mano opuesta, agarrando los dedos </td><td>:</td> <td class='pl-3'>".$tlp5_frotar_dorso_dedos."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>rotar con un movimiento de rotación el pulgar izquierdo atrapándolo con la palma de la mano derecha y viceversa </td><td>:</td> <td class='pl-3'>".$tlp6_rotacion_pulgar."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Frotar la punta de los dedos de la mano derecha contra la palma de la mano izquierda, haciendo un movimiento de rotación y viceversa </td><td>:</td> <td class='pl-3'>".$tlp7_punta_palma."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Tiempo de realización de la higiene de manos (20 a 30 seg.) </td><td>:</td> <td class='pl-3'>".$tlp8_tiempo."</td>";
                $r .= "</tr>";

                $r .= "<tr>"; 
                $r .= "<td class='pr-3'>Observaciones </td><td>:</td> <td class='pl-3'>".$tlp9_obs."</td>";
                $r .= "</tr>";
                
                $r .= "</table>";      

                $respuesta = array(
                    'respuesta' => 'correcto',
                    'rhtml'=> $r
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
    }

    die(json_encode($respuesta));
}
