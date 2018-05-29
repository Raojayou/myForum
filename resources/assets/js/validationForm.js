$(function () {
    $('#enviar').on("click", validateAll);
    $('#title').on("change", validateTitle);
    $('#category').on("change", validateCategory);
    $('#content').on("change", validateContent);
    $('#load').on("click", loadData);
    $('#loadOne').on("click", loadDataOne);
    $('#loadView').on("click", loadViewOne)

});


let cont = 0;

function validateAll(e) {

    e.preventDefault();
    let button = $('button');
    button.prop("disabled", true);

    let tituloCorrecto = validateTitle();
    let categoriaCorrecta = validateCategory();
    let contenidoCorrecto = validateContent();

    if (tituloCorrecto && categoriaCorrecta && contenidoCorrecto) {
        $('#form').submit();
    }

    button.prop("disabled", false);
}

function validar(field) {

    let data = {};
    data[field] = $("#" + field).val();

    axios.post('/topics/validate', data
    ).then(function (response) {
        gestionarErrores($("#" + field), response.data[field]);
    }).catch(function (error) {
        console.log(error);
    });

}

function validateTitle() {
    validar("title");
}

function validateCategory() {
    validar("category");
}

function validateContent() {
    validar("content");
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
            divErrores.append('<div class="alert alert-danger" role="alert">' + error + '</div>');
        }
    }
    return hayErrores;
}

function showSpinner(input) {
    if (input.parent().next().length === 0) {
        let spin = $(".spinner").first().clone(true);
        input.parent().after(spin);
        spin.show();
    }
}

function hideSpinner() {
    $("#" + campo).parent().next().remove()
}

function loadData() {

    let resp = $("#topicList");

    axios.get('/data/loadAjax', {})
        .then(function (response) {
            showResponse(response, resp);
        }).catch(function (error) {
        console.log(error);
    });
}

function loadDataOne() {

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

function loadViewOne() {
    axios.post('/topics/viewTopic',
        {
            posicionInicial: cont,
            numeroElementos: 1
        }
    ).then(function (response) {
        $('#topicList').append(response.data);
        cont++;
    }).catch(function (error) {
        console.log(error);
    });
}

function buildElement(elemento) {

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

    a.text(elemento.title);
    p.text(elemento.category);
    pContent.text(elemento.content);

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
        let elemento = data[item];
        let div = buildElement(elemento);
        resp.append(div);
    }
}