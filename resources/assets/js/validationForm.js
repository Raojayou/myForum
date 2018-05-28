$(function () {
    $("#title").on("change", validateTitleAjax);
    $("#category").on("change", validateCategoryAjax);
    $("#content").on("change", validateContentAjax);
    $('#load').on("click", loadDataAjax);
    $('#loadOne').on("click", loadDataAjaxOne);
    $('#enviar').on("click", validateAll);
});

let cont = 0;

function validate(field) {
    let data = {};
    data[field] = $("#" + field).val();

    axios.post('/topics/validate', data
    ).then(function (response) {
        gestionarErrores($("#" + field), response.data[field]);
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
    let divErrores = input.next("div");

    divErrores.html("");

    input.removeClass("is-valid is-invalid");

    if (errores.length === 0) {
        input.addClass("is-valid");
    } else {
        hayErrores = true;
        input.addClass("is-invalid");
        for (let error of errores) {
            divErrores.append("<div class='alert alert-danger' role='alert'>" + error + "</div>");
        }
    }
    return hayErrores;
}
// Función que carga todos los datos.
function loadDataAjax() {

    let resp = $("#topicList");

    axios.get('/data/loadAjax', {})
        .then(function (response) {
            showResponse(response, resp);
        }).catch(function (error) {
        console.log(error);
    });
}
// Función que carga datos uno a uno y los muestra.
function loadDataAjaxOne() {

    let resp = $("#topicList");
    axios.post('/data/loadAjaxOne',
        {
            posicionInicial: cont,
            numeroElementos: 1
        }
    ).then(function (response) {
        showResponse(response, resp);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(element) {

    let div = $("<div></div>");
    div.addClass("card");

    let divHeader = $('<div></div>');
    divHeader.addClass("card-header");
    let h2 = $("<h2></h2>");
    let a = $("<a></a>");
    let p = $("<p></p>");
    let em = $("<em></em>");
    let pContent = $("<p></p>");

    h2.addClass("card-title");
    p.addClass("card-subtitle");
    pContent.addClass("card-body");

    a.text(element.title);
    p.text(element.category);
    pContent.text(element.content);

    h2.append(a);
    divHeader.append(h2);
    p.append(em);
    divHeader.append(p);
    div.append(divHeader);
    div.append(pContent);

    return div;
}

function showResponse(response, resp) {
    let data = response.data;
    for (let item in response.data) {
        let element = data[item];
        let div = buildElement(element);
        resp.append(div);
    }
}

function validateAll(e) {

    e.preventDefault();
    let button = $('button');
    button.prop("disabled", true);

    let tituloCorrecto = validateTitleAjax();
    let categoriaCorrecta = validateCategoryAjax();
    let contenidoCorrecto = validateContentAjax();

    if (tituloCorrecto && categoriaCorrecta && contenidoCorrecto) {
        $('#form').submit();
    }

    button.prop("disabled", false);
}

function showSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function hideSpinner() {
    $("#" + field).parent().next().remove()
}