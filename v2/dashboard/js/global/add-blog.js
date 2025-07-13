$(document).ready(function () {
    var form = $("#addBlog");

    form.submit(function (e) {
        e.preventDefault();

        var formData5 = new FormData(this);

        $.ajax({
            url: "config/global/add-blog.php",
            method: "POST",
            data: formData5,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                Swal.fire({
                    title: 'Procesando...',
                    text: 'Publicando entrada del blog',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function (response) {
                Swal.close(); // Cierra el spinner de carga

                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Creado con éxito.",
                        text: response.message,
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "blog"; 
                        }
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: response.message,
                        confirmButtonText: "OK",
                    });
                }
            },
            error: function (xhr, status, error) {
                Swal.close(); // Cierra el spinner si hay error
                console.error(xhr.responseText);
                Swal.fire({
                    icon: "error",
                    title: "Error de servidor",
                    text: "No se pudo procesar la solicitud.",
                    confirmButtonText: "OK",
                });
            },
        });
    });
});
