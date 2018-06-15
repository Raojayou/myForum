// Delete a topic
$(function () {
    $('#enviar').on("click", deleteTopic);
    $('button[name="btnModal"]').on("click", mostrarModal);
});

function deleteTopic() {
    let id = $('#enviar').attr("data-idTopicEnviar");
    axios.delete('/topics/delete/' + id)
        .then(function (response) {
            console.log(response);
            $("#topic" + id).remove();
            $("#myModal").modal("hide");
        })
        .catch(function (error) {
            console.log(error);
            $("#myModal").modal("hide");
        }).then(function () {
        $('#enviar').attr("data-idTopicEnviar", "");

    });
}

function mostrarModal(e) {
    let botonPulsado = e.target;
    let idTopic = $(botonPulsado).attr("data-idTopic");
    $('#enviar').attr("data-idTopicEnviar", idTopic);
    $("#myModal").modal();
}