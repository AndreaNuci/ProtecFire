<?php
session_start();
include "modelo/conexion.php";

// -------------------------
// CREAR ADMIN AUTOMÁTICO
// -------------------------
/*$correoAdmin = "guadalupepluma@incendios.com";
$adminExistente = $conexion->prepare("SELECT id_usuario FROM usuario WHERE correo_electronico = ?");
$adminExistente->bind_param("s", $correoAdmin);
$adminExistente->execute();
$adminExistente->store_result();

if ($adminExistente->num_rows === 0) {
    $nombreAdmin = "Guadalupe Pluma";
    $contrasenaAdmin = password_hash("Admin1234", PASSWORD_DEFAULT);
    $rolAdmin = "admin";
    $telefonoAdmin = null;
    $fotoAdmin = null;

    $sqlAdmin = $conexion->prepare("INSERT INTO usuario (nombre_completo, correo_electronico, contrasena, telefono, foto_perfil, rol) VALUES (?, ?, ?, ?, ?, ?)");
    $sqlAdmin->bind_param("ssssss", $nombreAdmin, $correoAdmin, $contrasenaAdmin, $telefonoAdmin, $fotoAdmin, $rolAdmin);
    $sqlAdmin->execute();
    $sqlAdmin->close();
}
$adminExistente->close();
*/
// -------------------------
// REGISTRO DE USUARIO NORMAL
// -------------------------
if (isset($_POST["registrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["telefono"]) && !empty($_POST["email"]) && !empty($_POST["contraseña"])) {
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["email"];
        $contrasena = password_hash($_POST["contraseña"], PASSWORD_DEFAULT); 
        $rol = "usuario";
        $foto = null;

        $existeCorreo = $conexion->prepare("SELECT id_usuario FROM usuario WHERE correo_electronico = ?");
        $existeCorreo->bind_param("s", $correo);
        $existeCorreo->execute();
        $existeCorreo->store_result();

        if ($existeCorreo->num_rows > 0) {
            $_SESSION['mensaje'] = "Existe una cuenta con ese correo electrónico";
        } else {
            $sql = $conexion->prepare("INSERT INTO usuario (nombre_completo, correo_electronico, contrasena, telefono, foto_perfil, rol) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $nombre, $correo, $contrasena, $telefono, $foto, $rol);

            if ($sql->execute()) {
                $_SESSION['mensaje'] = "Usuario registrado correctamente";
            } else {
                $_SESSION['mensaje'] = "Error al registrar el usuario: " . $sql->error;
            }
            $sql->close();
        }
        $existeCorreo->close();
    } else {
        $_SESSION['mensaje'] = "Alguno de los campos está vacío";
    }

    // Redirigir para refrescar la página y mostrar modal
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


// -------------------------
// Inicio de sesion
// -------------------------
if (isset($_POST['iniciar'])) {

    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    if (!empty($email) && !empty($contraseña)) {

        // Consultar usuario por correo
        $query = "SELECT * FROM usuario WHERE correo_electronico = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if ($usuario) {
            if (password_verify($contraseña, $usuario['contrasena'])) {
                // Inicio de sesión exitoso
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre_completo'] = $usuario['nombre_completo'];
                $_SESSION['correo_electronico'] = $usuario['correo_electronico'];
                $_SESSION['rol'] = $usuario['rol'];

                // Redirigir según rol
                if ($usuario['rol'] === 'admin') {
                    header('Location: vista/admin.php');
                } elseif ($usuario['rol'] === 'usuario') {
                    header('Location: vista/usuario.php');
                }
                exit();

            } else {
                $_SESSION['mensaje'] = "Contraseña incorrecta.";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        } else {
            $_SESSION['mensaje'] = "El usuario no existe.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

    } else {
        $_SESSION['mensaje'] = "Por favor, rellena todos los campos.";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

