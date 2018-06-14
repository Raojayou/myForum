$(function () {
    $('#enviar').on("click", create());


});

function create(campo) {

    let data = {};
    data[campo] = $("#" + campo).val();

    axios.post('/topics/create', data
    ).then(function (response) {
        console.log(response);
    }).catch(function (error) {
        console.log(error);
    });
}