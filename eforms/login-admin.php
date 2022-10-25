<?php

if($_POST['tipo'] == 'login') {
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    try {
      require_once('includes/funciones/funciones.php');
      $stmt = $conn->prepare("SELECT id, user, name_user, pass, level FROM ef_admins WHERE user = ?; ");
      $stmt->bind_param("s", $usuario);
      $stmt->execute();
      $stmt->bind_result($id, $user, $nombre_usuario, $pass, $nivel);
      
      if($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if($existe) {
                if(password_verify($password, $pass)){
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id'] = $id;
                    $_SESSION['nivel'] = $nivel;
                    $_SESSION['name_user'] = $nombre_usuario;
                    $respuesta = array(
                        'resultado' => 'exito',
                        'usuario' => $usuario
                    );
                } else {
                    $respuesta = array(
                        'resultado' => 'password_incorrecto'
                    );
                }
            } else {
                $respuesta = array(
                    'resultado' => 'no_existe'
                );
            }
      } else {
        $respuesta = array(
            'resultado' => 'Usuario no Existe!',
            'resultado' => $stmt
        );
      } 

      $stmt->close();
      $conn->close();
    } catch(Exception $e) {
       $respuesta = array(
           'resultado' => 'Error',
       );
    }
    die(json_encode($respuesta));
}