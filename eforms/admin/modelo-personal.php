<?php
include_once '../includes/funciones/funciones.php';

// funciones
/*if($_POST['registro'] == 'nuevo'){
    
    $nombre = $_POST['name-user'];
    $usuario = $_POST['user'];
    $nivel = $_POST['level'];
    $pass = $_POST['pass'];

    try {
        $opciones = array(
            'cost' => 12,
        );
        $hash_password = password_hash($pass, PASSWORD_BCRYPT, $opciones);   
        $stmt = $conn->prepare("INSERT IGNORE INTO `ef_admins` (`user`, `name_user`, `pass`, `level`, `reg_update`) VALUES (?,?,?,?, NOW()) ");
        $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $nivel);
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
}*/

if($_POST['registro'] == 'actualizar') {
    
        // El uso del operador ternario puede ser muy importante para almacenar nulos
        $cod = (!empty($_POST['id_registro']))  ?   $_POST['id_registro']   :   NULL;
        $colaborador = (!empty($_POST['name'])) ?   $_POST['name']          :   NULL;
        $dni = (!empty($_POST['dni']))          ?   $_POST['dni']           :   NULL;
        $desemp = (!empty($_POST['desempeno'])) ?   $_POST['desempeno']     :   NULL;
        $ocup = (!empty($_POST['ocupacion']))   ?   $_POST['ocupacion']     :   NULL;
        $nac = (!empty($_POST['nat']))          ?   $_POST['nat']           :   NULL;
        $estado = (!empty($_POST['status']))    ?   $_POST['status']        :   NULL;
        $email = (!empty($_POST['email']))      ?   $_POST['email']         :   NULL;
        $superv = (!empty($_POST['superv']))    ?   $_POST['superv']        :   NULL;

    try {    
        $stmt = $conn->prepare("UPDATE employees SET dni = ?, name = ?, performance = ?, jobtitle = ?, nationality = ?, status = ?, email = ?, dateupdate = NOW(), ef_super = ? WHERE cod = ?");
        $stmt->bind_param("sssssssss", $dni, $colaborador, $desemp, $ocup, $nac, $estado, $email, $superv, $cod);
        
        $stmt->execute();
        $rows = $stmt->affected_rows;

        $respuesta = array(
            'rows' => $rows
        );
        // $stmt->error
        if($rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_actualizado' => $cod
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

/*if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id']; 

    try {
        $stmt = $conn->prepare("DELETE FROM ef_admins WHERE id = ? ");
        $stmt->bind_param("i", $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_eliminado' => $id_borrar
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
}*/

// Dando formato a las filas inválidas
/*if($_POST['registro'] == 'validar'){
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
}*/

// Llenar tabla
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