function formularioEditarTema() {
    event.preventDefault();
    $(event.target).addClass("active");
    axios.get('/topics/edit')
        .then(function (response) {
            $("#formularioEditarTema").html(response.data);

            asociarEventoAsincrono();
            asociarValidaciones();

        }).catch(function (error) {
        console.log(error);
    });
}

function asociarEventoAsincrono() {
    $("#formularioEditarTemaBoton").on("click", formularioEditarTema);
}

$(function () {
    asociarEventoAsincrono();
});


function gestionarErrores(input, errores) {
    let noEnviarFormulario = false;
    input = $(input);
    if (typeof errores !== typeof undefined) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        for (let error of errores) {
            input.after(`<div class="invalid-feedback">
                <strong> ${error} </strong>
            </div>`);
        }
        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    let formData = new FormData();
    formData.append(target.id, target.value);

    $("#" + target).next().css("display","block");

    axios.post('/topics/update',
        formData
    ).then(function (response) {

        $("#" + target).next().css("display","none");

        switch (target.id) {
            case "title":
                gestionarErrores(target, response.data.title);
                break;
            case "category":
                gestionarErrores(target, response.data.category);
                break;
            case "content":
                gestionarErrores(target, response.data.content);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function asociarValidaciones() {
    $("#title, #category, #content").on('change', function (e) {
        validateTarget(e.target)
    });

    $("#botonFormularioEditarTema").click(function (e) {
        e.preventDefault();
        let enviarFormulario = true;
        let formData = new FormData;

        formData.append('title', $("#title").val());
        formData.append('category', $("#category").val());
        formData.append('content', $("#content").val());


        axios.post('/topics/update', formData)
            .then(function (response) {
                if (gestionarErrores("#title", response.data.title)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#category", response.data.category)) {
                    enviarFormulario = false;
                }

                if (gestionarErrores("#content", response.data.content)) {
                    enviarFormulario = false;
                }

                if (enviarFormulario === true) {
                    $("#formEditarTema").submit();
                }
            });
    });
}