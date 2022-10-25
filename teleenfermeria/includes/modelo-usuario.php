<?php include_once '../../includes/bd_conexion.php';

if ($_POST['registro'] == 'psw') {
    try {
        $opciones = array(
            'cost' => 12,
        );
        $hash_password = password_hash($_POST['newPassword'], PASSWORD_BCRYPT, $opciones);
        $stmt = $conn->prepare("UPDATE 
                                    `tb_telenf_admin` 
                                SET 
                                    `psw` = ?,
                                    `fechareg` = CURRENT_TIMESTAMP()
                                WHERE
                                    id = ? ; ");        
        $stmt->bind_param("si", $hash_password, $_POST['id']);
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

if ($_POST['registro'] == 'perfil') {
    try {
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['modalimg']['name'];
        //Si el archivo contiene algo y es diferente de vacio
        
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['modalimg']['type'];
        $tamano = $_FILES['modalimg']['size'];
        $temp = $_FILES['modalimg']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano >= 0 || $tamano < 1000000))) {
            $img = $_POST['imagen'];            
        }
        else {                
            $img = "/assets/img/avatars/" . $archivo;            
        }
        
        $stmt = $conn->prepare("UPDATE 
                                    `tb_telenf_admin` 
                                SET 
                                    `nombres` = ?,
                                    `apellidos` = ?,
                                    `usuario` = ?,
                                    `correo` = ?,
                                    `rol` = ?,
                                    `img` = ?,
                                    `fechareg` = CURRENT_TIMESTAMP()
                                WHERE
                                    id = ? ; ");
        $stmt->bind_param("ssssssi", $_POST['modalnombres'], $_POST['modalapellidos'], $_POST['modalusuario'], $_POST['modalcorreo'], $_POST['modalrol'], $img, $_POST['id']);
        $stmt->execute();     
        if($stmt->affected_rows) { 
            session_start();
            $_SESSION['nombres'] = $_POST['modalnombres'];
            $_SESSION['apellidos'] = $_POST['modalapellidos'];
            $_SESSION['rol'] = $_POST['modalrol'];
            $_SESSION['correo'] = $_POST['modalcorreo'];
            $_SESSION['img'] = $img;
            $_SESSION['usuario'] = $_POST['modalusuario'];
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

if ($_POST['registro'] == 'nuevousuario') {
    try {
        //Recogemos el archivo enviado por el formulario
        $archivo = $_FILES['modalimg']['name'];
        //Si el archivo contiene algo y es diferente de vacio
        
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['modalimg']['type'];
        $tamano = $_FILES['modalimg']['size'];
        $temp = $_FILES['modalimg']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano >= 0 || $tamano < 1000000))) {
            $img = $_POST['imagen'];            
        }
        else {                
            $img = "/assets/img/avatars/" . $archivo;            
        }
        
        $opciones = array(
            'cost' => 12,
        );
        $hash_password = password_hash($_POST['psw'], PASSWORD_BCRYPT, $opciones);
        $stmt = $conn->prepare("INSERT INTO 
                                    `tb_telenf_admin` (`nombres`, `apellidos`, `correo`, `usuario`, `psw`, `rol`, `img`)
                                VALUES (?, ?, ?, ?, ?, ?, ?); ");
        $stmt->bind_param("sssssss", $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['usuario'], $hash_password, $_POST['rol'], $img );
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
    try {
        $sql = "SELECT 
                    `id`,
                    LOWER(CONCAT(TRIM(`apellidos`), ', ', LEFT(TRIM(`nombres`),1))) 'nombres',
                    `usuario`,
                    `correo`,
                    DATE_FORMAT(`fechareg`, '%d/%m/%Y %r' ) 'fecha',
                    `rol`,
                    `img`,
                    CONCAT(`nombres`, ', ', `apellidos`) 'nombcomp',
                    `nombres` 'nomb',
                    `apellidos` 'apell'                    
                FROM 
                    `tb_telenf_admin`";
        $resultado = $conn->query($sql);
        while($usuarios = $resultado->fetch_assoc()){
            $arreglo['data'][] = $usuarios;
        }
        echo json_encode($arreglo);
    
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
    $conn->close();
}