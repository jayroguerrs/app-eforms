<?php
include_once '../includes/funciones/funciones.php';

// funciones
if($_POST['registro'] == 'nuevo'){
    
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
}

if($_POST['registro'] == 'actualizar') {
    
    $id_registro = $_POST['id_registro'];

    $nombre = $_POST['name-user'];
    $usuario = $_POST['user'];
    $nivel = $_POST['level'];    
    $nuevo_password = $_POST['nuevo_password'];

    try {
        $opciones = array(
            'cost' => 12,
        );
        if(empty($_POST['nuevo_password']) && empty($_POST['repetir_password'])) {

            $stmt = $conn->prepare("UPDATE ef_admins SET user = ?, name_user = ?, level = ?, reg_update = NOW() WHERE id = ?");
            $stmt->bind_param("ssii", $usuario, $nombre, $nivel, $id_registro);
            
        } else {
            $hash_password = password_hash($nuevo_password, PASSWORD_BCRYPT, $opciones);        
            $stmt = $conn->prepare("UPDATE ef_admins SET user = ?, name_user = ?, level = ?, reg_update = NOW(), pass = ? WHERE id = ? ");            
            $stmt->bind_param("ssisi", $usuario, $nombre, $nivel, $hash_password, $id_registro);
        }
        
        
        $stmt->execute();
        $rows = $stmt->affected_rows;

        $respuesta = array(
            'rows' => $rows
        );
        // $stmt->error
        if($rows > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
                'id_actualizado' => $id_registro
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

if($_POST['registro'] == 'eliminar'){
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
}

// Para el modelo 'PREGUNTAS'
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

// Dando formato a las filas inválidas
if($_POST['registro'] == 'validar'){
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