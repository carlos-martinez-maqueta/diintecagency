$(document).ready(function () {
    var form = $("#loginForm");

    form.submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro de que tus credenciales son correctas?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, enviar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = form.serialize();

                $.ajax({
                    url: "config/login/access.php",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Acceso concedido",
                                text: "Inicio de sesión correcto",
                                confirmButtonText: "OK",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Redireccionar a la página de inicio
                                    window.location.href = "index";
                                }
                            });
                        } else {
                            // Muestra el mensaje específico recibido del servidor
                            Swal.fire({
                                icon: "error",
                                title: "Acceso denegado",
                                text: response.message, // Mostrar el mensaje específico del servidor
                                confirmButtonText: "OK",
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Hubo un error al procesar la solicitud",
                            confirmButtonText: "OK",
                        });
                        console.error(xhr.responseText);
                    },
                });
            }
        });
    });
});
