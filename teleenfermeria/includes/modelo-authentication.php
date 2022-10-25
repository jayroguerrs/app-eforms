<?php include_once '../../includes/bd_conexion.php';

//Modelo para el control del login
if ($_POST['registro'] == 'login') {
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    try {
        $stmt = $conn->prepare("SELECT id, nombres, apellidos, psw, rol, correo, img FROM tb_telenf_admin WHERE usuario = ?; ");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id, $nombres, $apellidos, $psw, $rol, $correo, $img);
        if($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if($existe) {
                if(password_verify($password, $psw)){
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['nombres'] = $nombres;
                    $_SESSION['apellidos'] = $apellidos;
                    $_SESSION['rol'] = $rol;
                    $_SESSION['correo'] = $correo;
                    $_SESSION['img'] = $img;
                    $_SESSION['usuario'] = $usuario;
                    $respuesta = array(
                        'resultado' => 'loginok',
                        'usuario' => $nombres
                    );
                } else {
                    $respuesta = array(
                        'resultado' => 'loginx'
                    );
                }
            } else {
                $respuesta = array(
                    'resultado' => 'loginx'
                );
            }
        } else {
          $respuesta = array(
              'resultado' => 'loginx'
          );
        } 
        $stmt->close();
        $conn->close();
      } catch(Exception $e) {
         $respuesta = array(
             'resultado' => 'loginx',
         );
      }
    echo json_encode($respuesta);
}

// Para restablecer la contraseña
if ($_POST['registro'] == 'restablecer') {
    $email = $_POST['email'];
    try {
        $stmt = $conn->prepare("SELECT id, nombres FROM tb_telenf_admin WHERE correo = ?; ");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($id, $nombres);
        if($stmt->affected_rows) {
            if($stmt->fetch()) {
                $stmt->close();            
                $token = bin2hex(random_bytes(24));
                $anio = date("Y");
                require_once '../templates/email/template-restore.php';
                require_once '../templates/email/enviar-email.php';
                $stmt = $conn->prepare("UPDATE tb_telenf_admin SET token = ?, cambio = 'SI' WHERE id = ?");
                $stmt->bind_param("si", $token, $id);
                $stmt->execute();
                if($stmt->affected_rows) {
                    $respuesta = array(
                        'resultado' => 'restablecerok'
                    );
                }                            
            } else {
                $respuesta = array(
                    'resultado' => 'restablecerok'
                );
            }
        } else {
          $respuesta = array(
              'resultado' => 'restablecerok'
          );
        } 
        $stmt->close();
        $conn->close();
      } catch(Exception $e) {
         $respuesta = array(
             'resultado' => 'restablecerx',
         );
      }
    echo json_encode($respuesta);
}

// Para la nueva contraseña
if ($_POST['registro'] == 'nuevopass') {
    $pass = $_POST['password'];
    $iduser = $_POST['iduser'];
    try {
        $opciones = array(
            'cost' => 12,
        );
        $hash_password = password_hash($pass, PASSWORD_BCRYPT, $opciones);
        $stmt = $conn->prepare("UPDATE tb_telenf_admin SET psw = ?, fechareg = CURRENT_TIMESTAMP(), cambio = 'NO', token = NULL WHERE id = ?");
        $stmt->bind_param("si", $hash_password, $iduser);
        $stmt->execute();
        if($stmt->affected_rows) {
            $respuesta = array(
                'resultado' => 'nuevopassok'
            );
        } else {
          $respuesta = array(
              'resultado' => 'nuevopassx'
          );
        } 
        $stmt->close();
        $conn->close();
        } catch(Exception $e) {
            $respuesta = array(
                'resultado' => 'nuevopassx',
            );
        }
    echo json_encode($respuesta);
}
?>