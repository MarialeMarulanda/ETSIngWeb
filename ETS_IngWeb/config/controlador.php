<?php

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';

$data = json_decode(file_get_contents('usuarios.json'), true);

if ($data) {
    $usuarioEncontrado = false;
    $tipoUsuario = '';

    foreach ($data as $userData) {
        if ($userData['user'] == $usuario && $userData['passwd'] == $pass) {
            $usuarioEncontrado = true;
            $tipoUsuario = $userData['tipo'];
            echo json_encode(['success' => true, 'tipo' => $tipoUsuario, 'user'=>$user]);
            break;
        }
    }

    if (!$usuarioEncontrado) {
        echo json_encode(['success' => false, 'mensaje' => 'Usuario o contraseña no válidos']);
    }
} else {
    echo json_encode(['success' => false, 'mensaje' => 'Error al leer el archivo JSON']);
}
?>
