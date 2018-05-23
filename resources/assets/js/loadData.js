$(function () {
    $('#enviar').on("click", loadData);
});

function loadData() {
    axios.get('/data/loadAjax', {}
    ).then(function (response) {
        cargarDatos(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

// function cargarDatos(response, item) {
//     let divResponse = input.next();
//
//     divResponse.html("");
//
//     for (item let response) {
//         divResponse.append("<div>" + response + "</div>");
//     }
// }