$(function () {
    $("#title").on("change", validateTitle);
    $("#category").on("change", validateCategory);
    $("#content").on("change", validateContent);
    $('#enviar').on("click", validateAll);
});

function validateTitle() {
    let regex = /^[-a-z0-9,\/()&:. ]*[a-z][-a-z0-9,\/()&:. ]*$/i;
    let inputTitle = $("#title");
    let title = inputTitle.val();

    if (!title.match(regex) || title === "") {
        $('#title').removeClass('is-valid');
        $('#title').addClass('is-invalid');
        $('#errorTitle').html("Error en el título.").addClass('is-invalid');
    } else {
        $('#title').removeClass('is-invalid');
        $('#title').addClass('is-valid');

        $('#errorTitle').removeClass('is-invalid');
        $('#errorTitle').html('');
    }
}

function validateCategory() {
    let regex = /^(?!----$).*/;
    let inputCategory = $("#category");
    let category = inputCategory.val();

    if (category.match(regex) || category === "") {
        $('#category').removeClass('is-invalid');
        $('#category').addClass('is-valid');
        $('#errorCategory').html('');
    } else {
        $('#category').removeClass('is-valid');
        $('#category').addClass('is-invalid');
        $('#errorCategory').html("La categoría no es correcta.").addClass('is-invalid');

    }
}

function validateContent() {
    let regex = /[^A-Za-z0-9 .'?!,@$#\-_]+/;
    let inputContent = $("#content");
    let content = inputContent.val();

    if (!content.match(regex) || content === "") {
        $('#content').removeClass('is-valid');
        $('#content').addClass('is-invalid');
        $('#errorContent').html("Error en el contenido.").addClass('is-invalid');
    } else {
        $('#content').removeClass('is-invalid');
        $('#content').addClass('is-valid');

        $('#errorContent').removeClass('is-invalid');
        $('#errorContent').html('');
    }
}

function validateAll(e) {
    e.preventDefault();
    $('button').prop("disabled", true);

    let tituloCorrecto = validateTitle();
    let categoriaCorrecto = validateCategory();
    let contenidoCorrecto = validateContent();

    if (tituloCorrecto && categoriaCorrecto && contenidoCorrecto) {
        $('#formulario').submit();
    }

    $('button').prop("disabled", false);
}