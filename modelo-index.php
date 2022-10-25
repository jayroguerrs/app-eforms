<?php
include_once 'includes/funciones/funciones.php';

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
    try {
        $sql = "SELECT * FROM `employees` ";
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