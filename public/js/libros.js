function ocultarLoader() {
  $(".loader").fadeOut("slow");
}

function mostrarLoader() {
  $(".loader").css("display", "block");
}

$(document).ready(function () {
  mostrarLibros();

  function mostrarLibros() {
    mostrarLoader();
    $.ajax({
      type: "POST",
      url: url + "libro/mostrarLibros",
      success: function (response) {
        //console.log(response)
        $("#Libros tbody").html(response);
        ocultarLoader();
      },
      error: function () {
        console.log("error ajax");
        ocultarLoader();
      },
    });
  }

  // Agregar Libros
  $("#btnAdd").click(function (e) {
    $("#frmLibros").validetta({
      realTime: true,
      bubblePosition: "bottom",
      bubbleGapTop: 20,
      bubbleGapLeft: -5,
      onValid: function (e) {
        e.preventDefault();

        var form = $("#frmLibros");
        var method = form.attr("method");
        var action = form.attr("action");
        var data = form.serialize();
        $.ajax({
          type: method,
          url: action,
          data: data,
          success: function (response) {
            console.log(response)
            var mensaje = response
              ? "Libro insertado"
              : "Error al insertar el Libro";
            Swal.fire(mensaje);
            form[0].reset();
            window.location = url + "libro/index";
          },
          error: function () {
            Swal.fire("Hubo un problema");
          },
        });
      },
    });
  });

  //Modificar Libros
  $("#btnModificar").click(function (e) {
    e.preventDefault();
    var form = $("#frmLibros");
    var method = form.attr("method");
    var action = form.attr("action");
    var data = form.serialize();
    
    $.ajax({
      type: method,
      url: action,
      data: data,
      success: function (response) {
        console.log(response);
        var mensaje = response
          ? "Libro modificado"
          : "Error al modificar el Libro";
        Swal.fire(mensaje);
        window.location = url + "libro/index";
      },
      error: function () {
        Swal.fire("Hubo un problema");
      },
    });
        
  });

  // Eliminar Libros
  $("body").on("click", "#btnEliminar", function (e) {
    e.preventDefault();
    var href = $(this).attr("href");
    swal
      .fire({
        icon: "question",
        title: "¿Esta seguro de eliminar ?",
        showCancelButton: true,
        confirmButtonText: "Si, Eliminar",
      })
      .then(function (result) {
        if (result.isConfirmed) {
          $.ajax({
            type: "GET",
            url: href,
            success: function (response) {
              var mensaje = response
                ? "Libro eliminado"
                : "Error al eliminar el Libro";
              Swal.fire(mensaje);
              // Invocar función para listar Libros
              mostrarLibros();
            },
            error: function (response) {
              Swal.fire("Hubo un problema");
            },
          });
        } else if (result.isDismissed) {
          swal.fire("Operación cancelada", "", "warning");
        }
      });
  });
});