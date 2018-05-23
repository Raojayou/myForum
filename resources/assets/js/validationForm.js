$(function () {
    $("#title").on("change", validateTitleAjax);
    $("#category").on("change", validateCategoryAjax);
    $("#content").on("change", validateContentAjax);
    $('#enviar').on("click");
});

function validate(field) {
    let data = {};
    data[field] = $("#"+field).val();

    axios.post('/topics/validate', data
    ).then(function (response) {
        gestionarErrores($("#"+field), response.data[field]);
    }).catch(function (error) {
        console.log(error);
    });
}

function validateTitleAjax() {
    validate("title");
}

function validateCategoryAjax() {
    validate("category");
}

function validateContentAjax() {
    validate("content");
}

function gestionarErrores(input, errores) {
    let hayErrores = false;
    let divErrores = input.next();

    divErrores.html("");

    input.removeClass("is-valid is-invalid");

    if (errores.length === 0) {
        input.addClass("is-valid");
    } else {
        hayErrores = true;
        input.addClass("is-invalid");
        for (let error of errores) {
            divErrores.append("<div>" + error + "</div>");
        }
    }
    input.parent().next().remove();
    return hayErrores;
}