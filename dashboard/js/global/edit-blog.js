$(document).ready(function () {
    var form = $("#editBlog");

    form.submit(function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: "config/global/edit-blog.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",

            beforeSend: function () {
                Swal.fire({
                    title: 'Procesando...',
                    text: 'Actualizando entrada del blog',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },

            success: function (response) {
                Swal.close();

                if (response.status === "success") {
                    Swal.fire({
                        icon: "success",
                        title: "Editado con éxito.",
                        text: response.message,
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
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
                Swal.close();
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
