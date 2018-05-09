function validateTitleAjax() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[title="csrf-token"]').attr('content')
        },
        method: 'POST',
        data: { title: $("#title").val() },
        url: "/topics/validate",
        dataType: "JSON"
    }).done(function (datos) {
        var input = $("#title");
        gestionarErrores(input, datos.title);
    });
}