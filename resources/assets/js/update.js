// Update/Edit a topic
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('Edit');
    $('#id_edit').val($(this).data('id'));
    $('#title_edit').val($(this).data('title'));
    $('#category_edit').val($(this).data('title'));
    $('#content_edit').val($(this).data('content'));
    id = $('#id_edit').val();
    $('#editModal').modal('show');
});
$('.modal-footer').on('click', '.edit', function () {
    $.ajax({
        type: 'PUT',
        url: 'topics/' + id,
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_edit").val(),
            'title': $('#title_edit').val(),
            'category': $('#category_edit').val(),
            'content': $('#content_edit').val()
        },
        success: function (data) {
            $('.errorTitle').addClass('hidden');
            $('.errorCategory').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#editModal').modal('show');
                    toastr.error('Error al editar!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.category) {
                    $('.errorCategory').removeClass('hidden');
                    $('.errorCategory').text(data.errors.category);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Tema editado correctamente!', 'Success Alert', {timeOut: 5000});
                $('.item' + data.id).replaceWith("" +
                    "<tr class='item" + data.id + "'>" +
                    "<td>" + data.id + "</td>" +
                    "<td>" + data.title + "</td>" +
                    "<td>" + data.category + "</td>" +
                    "<td>" + data.content + "</td>" +
                    "<td class='text-center'>" +
                    " <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" +
                    "<i class='fa fa-pencil text-success'></i> Edit</button></td></tr>"
                );
            }
        }
    });
});