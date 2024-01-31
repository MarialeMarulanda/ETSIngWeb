$(window).ready(function () {
  $("#formulario_login").on("submit", function (e) {
    e.preventDefault();
    let usuario = $("#usuario").val();
    let pass = $("#password").val();

    $.post("config/controlador.php", { usuario, pass }, function (data) {
      data = JSON.parse(data);

      if (data.success) {
        switch (data.tipo) {
          case "admin":
            location.href = "TablaAdmin.php";
            break;
          case "operador":
            location.href = "TablaOpe.php";
            break;
          default:
            swal.fire({
              title: "¡Error!",
              icon: "error",
              text: "Tipo de usuario incorrecto, verifique con un adminstrador",
            });
        }
      } else {
        swal.fire({
          title: "¡Error!",
          icon: "error",
          text: data.mensaje,
        });
      }
    });
  });
});
