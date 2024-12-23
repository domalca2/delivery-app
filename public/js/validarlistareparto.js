$(document).ready(function () {
    $("#nueva-lista-reparto").submit(validaForm);
});

function validaForm(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    const form = e.target;
    form.fecha.setCustomValidity("");
    const errFecha = new Date(form.fecha.value) <= new Date() || !form.fecha.validity.valid;
    if (errFecha) {
        form.fecha.setCustomValidity("error");
        form.classList.add('was-validated')
    } else {
        form.classList.remove('was-validated')
        $.ajax({
            type: "POST",
            url: 'index.php',
            data: {'valida-nombre-lista-reparto': true,
                'fecha': form.fecha.value},
            context: form,
            dataType: "json",
            success: function (response)
            {
                if (response.errNombreListaReparto) {
                    form.fecha.setCustomValidity("error");
                    form.classList.add('was-validated');
                } else {
                    this.submit();
                    // location.href = `index.php?nueva-lista-repartos=true&fecha=${form.fecha.value}`;
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert('Error Message: ' + thrownError);
            }
        });
    }
}


