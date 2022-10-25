<?php include_once '../../includes/bd_conexion.php';

if ($_POST['registro'] == 'hospitalizacion') {
    try {
        $stmt = $conn->prepare("INSERT INTO `tb_telef_bdhosp` ( 
                                    `hc`,
                                    `nombres`,
                                    `apellidos`,
                                    `edad`,
                                    `fecha_in`,
                                    `fecha_alta`,
                                    `servicio`,
                                    `hab`,
                                    `seguro_valid`,
                                    `nombcomp`,
                                    `dx`,
                                    `estado_llamada`,
                                    `horainicio`,
                                    `horafinl`,
                                    `conformidad`,
                                    `clasificacion`,
                                    `accion`,
                                    `obs`,
                                    `responsable`)
                                VALUES
                                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ");
        $stmt->bind_param("sssssssssssssssssss",$_POST['hc'], strtoupper($_POST['nombres']), strtoupper($_POST['apellidos']), $_POST['edad'], date_format(date_create_from_format('d/m/Y', substr($_POST['ingreso_alta'], 0, 10)), 'Y-m-d'), date_format(date_create_from_format('d/m/Y', substr($_POST['ingreso_alta'], 13, 10)), 'Y-m-d'), strtoupper($_POST['servicio']), strtoupper($_POST['hab']), $_POST['chk_seguro'], strtoupper($_POST['comp_seguro']), strtoupper($_POST['dx']), strtoupper($_POST['estado']), date_format(date_create_from_format('d/m/Y h:i:s a', substr($_POST['inoutllamada'], 0, 22)), 'Y-m-d H:i:s'), date_format(date_create_from_format('d/m/Y h:i:s a', substr($_POST['inoutllamada'], 25, 22)), 'Y-m-d H:i:s'), strtoupper($_POST['conformidad']), strtoupper($_POST['clasificacion']), strtoupper($_POST['accion']), $_POST['obs'], $_POST['responsable']);
        $stmt->execute();     
        if($stmt->affected_rows) {            
            $respuesta = array(
                'resultado' => 'ok'                
            );            
        } else {
          $respuesta = array(
              'resultado' => 'x'
          );
        } 
        $stmt->close();
        $conn->close();
      } catch(Exception $e) {
         $respuesta = array(
             'resultado' => 'x'
         );
      }
    echo json_encode($respuesta);
}

if ($_POST['registro'] == 'edithosp') {
    try {
        $stmt = $conn->prepare("UPDATE `tb_telef_bdhosp` SET 
                                    `hc` = ?,
                                    `nombres` = ?,
                                    `apellidos` = ?,
                                    `edad` = ?,
                                    `fecha_in` = ?,
                                    `fecha_alta` = ?,
                                    `servicio` = ?,
                                    `hab` = ?,
                                    `seguro_valid` = ?,
                                    `nombcomp` = ?,
                                    `dx` = ?,
                                    `estado_llamada` = ?,
                                    `horainicio` = ?,
                                    `horafinl` = ?,
                                    `conformidad` = ?,
                                    `clasificacion` = ?,
                                    `accion` = ?,
                                    `obs` = ?
                                WHERE
                                    id = ? ; ");
        $stmt->bind_param("ssssssssssssssssssi", $_POST['edithc'], $_POST['editnomb'], $_POST['editapell'], $_POST['editedad'], date_format(date_create_from_format('d/m/Y', substr($_POST['editfecinout'], 0, 10)), 'Y-m-d'), date_format(date_create_from_format('d/m/Y', substr($_POST['editfecinout'], 13, 10)), 'Y-m-d'), $_POST['editservicio'], $_POST['edithab'], $_POST['editseguro'], $_POST['editcomp'], $_POST['editdx'], $_POST['editestado'], date_format(date_create_from_format('d/m/Y h:i:s a', substr($_POST['editinoutllamada'], 0, 22)), 'Y-m-d H:i:s'), date_format(date_create_from_format('d/m/Y h:i:s a', substr($_POST['editinoutllamada'], 25, 22)), 'Y-m-d H:i:s'), $_POST['editconformidad'], $_POST['editclasificacion'], $_POST['editaccion'], $_POST['editobs'], $_POST['editid']);
        $stmt->execute();     
        if($stmt->affected_rows) {            
            $respuesta = array(
                'resultado' => 'ok'                
            );            
        } else {
          $respuesta = array(
              'resultado' => 'x'
          );
        } 
        $stmt->close();
        $conn->close();
      } catch(Exception $e) {
         $respuesta = array(
             'resultado' => 'x'
         );
      }
    echo json_encode($respuesta);
}

if ($_POST['registro'] == 'tbregllamadas') {
    $usuario = ($_POST['rol'] != 'COLABORADOR') ? "" : $_POST['usuario'];
    $horainicio = date_format(date_create_from_format('d/m/Y', $_POST['horainicio']), 'Y-m-d');
    $horafin = date_format(date_create_from_format('d/m/Y', $_POST['horafin']), 'Y-m-d');
    try {
        $sql = "SELECT 
                    `id`,
                    `hc`,
                    LOWER(CONCAT(TRIM(`apellidos`), ', ', LEFT(TRIM(`nombres`),1))) 'nombres',
                    `edad`,
                    `fecha_in`, '%d/%m/%Y' 'ingreso',
                    `fecha_alta`, '%d/%m/%Y' 'alta',
                    `servicio`,
                    `hab`,
                    `seguro_valid`,
                    `nombcomp`,
                    `dx`,
                    `estado_llamada` 'estado', 
                    `horainicio` 'horain',
                    `horafinl` 'horafin',
                    RTRIM(CONCAT(UPPER(LEFT(`conformidad`, 1)), LOWER(SUBSTRING(`conformidad`, 2)))) 'conf',
                    `clasificacion`,
                    `accion`,
                    `obs`,
                    LOWER(`responsable`) 'res',
                    `nombres` 'nomb',
                    `apellidos` 'apell'
                FROM 
                    `tb_telef_bdhosp`
                WHERE                
                    DATE(horainicio) >= '" . $horainicio . "' AND DATE(horafinl) <= '". $horafin . "' AND responsable LIKE '%$usuario%' ORDER BY horainicio";
        $resultado = $conn->query($sql);
        while($llamadas = $resultado->fetch_assoc()){
            $arreglo['data'][] = $llamadas;
        }
        echo json_encode($arreglo);         
        
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
    $conn->close();
    
}

if ($_POST['registro'] == 'indicadores') {
    $usuario = ($_POST['rol'] != 'COLABORADOR') ? "" : $_POST['usuario'];
    $horainicio = date_format(date_create_from_format('d/m/Y', $_POST['fechaini']), 'Y-m-d');
    $horafin = date_format(date_create_from_format('d/m/Y', $_POST['fechafin']), 'Y-m-d');
    try {
        $sql = "SELECT 
                    COUNT(id) 'llamadas',
                    (SELECT 
                        COUNT(estado_llamada) 
                    FROM 
                        tb_telef_bdhosp 
                    WHERE 
                        estado_llamada = 'CONTESTADA' AND responsable LIKE '%". $usuario ."%' AND (DATE(horainicio) >= '" . $horainicio . "' AND DATE(horainicio) <= '" . $horafin . "')
                    ) 'contestadas',
                    (SELECT 
                        COUNT(conformidad) 
                    FROM 
                        tb_telef_bdhosp 
                    WHERE 
                        conformidad = 'CONFORME' AND responsable LIKE '%" . $usuario . "%' AND (DATE(horainicio) >= '" . $horainicio . "' AND DATE(horainicio) <= '" . $horafin . "')
                    ) 'conformes',
                    (SELECT 
                        COUNT(conformidad) 
                    FROM 
                        tb_telef_bdhosp 
                    WHERE 
                        conformidad = 'NO CONFORME' AND responsable LIKE '%" . $usuario . "%' AND (DATE(horainicio) >= '" . $horainicio . "' AND DATE(horainicio) <= '" . $horafin . "')
                    ) 'noconformes'
                FROM 
                    tb_telef_bdhosp
                WHERE
                    responsable LIKE '%" . $usuario . "%' AND (DATE(horainicio) >= '" . $horainicio . "' AND DATE(horainicio) <= '" . $horafin . "') LIMIT 1;";
        $resultado = $conn->query($sql);
        while($indicadores = $resultado->fetch_assoc()){
            $arreglo['data'][] = $indicadores;
        }
        echo json_encode($arreglo);        
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
    $conn->close();   
}

if ($_POST['registro'] == 'eliminarreg') {    
    try {
        $stmt = $conn->prepare("DELETE FROM 
                                    `tb_telef_bdhosp` 
                                WHERE
                                    id = ?; ");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();     
        if($stmt->affected_rows) {            
            $respuesta = array(
                'resultado' => 'ok'                
            );            
        } else {
          $respuesta = array(
              'resultado' => 'x'
          );
        } 
        $stmt->close();
        $conn->close();
      } catch(Exception $e) {
         $respuesta = array(
             'resultado' => 'x'
         );
      }
    echo json_encode($respuesta);
}