$(function () {
    $('#enviar').on("click", deleteTopic());

});

function deleteTopic() {

    axios.delete('/topics/delete/{id}', {
        id: 'id',
    })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
}