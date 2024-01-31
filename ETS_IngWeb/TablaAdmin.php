<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>TablaParaAdmin</title>
  </head>
  <body>
    <div>
      <h4>Usuario: Administrador</h4>
      <br><br>
    
    <div class="tabla-container">
      <table id="usuariosTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Tipo</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $json_data = file_get_contents('config/usuarios.json');
            $usuarios = json_decode($json_data, true);
            if ($usuarios === null) {
              echo "Error al decodificar el archivo JSON.";
            } else {
              foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>" . $usuario['id'] . "</td>";
                echo "<td class='username'>" . $usuario['user'] . "</td>";
                echo "<td>" . $usuario['passwd'] . "</td>";
                echo "<td>" . $usuario['tipo'] . "</td>";
                echo "</tr>";
              }
            }
          ?>
        </tbody>
      </table>
    </div>
    <div><br>
      <center><button>Editar</button></center>
    </div>
  </body>
</html>
