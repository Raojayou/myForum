// Add a new topic
$(document).on('click', '.add-modal', function () {
    $('.modal-title').text('Add');
    $('#addModal').modal('show');
});
$('.modal-footer').on('click', '.add', function () {
    $.ajax({
        type: 'POST',
        url: 'topics',
        data: {
            '_token': $('input[name=_token]').val(),
            'title': $('#title_add').val(),
            'category': $('#category_add').val(),
            'content': $('#content_add').val()
        },
        success: function (data) {
            $('.errorTitle').addClass('hidden');
            $('.errorCategory').addClass('hidden');
            $('.errorContent').addClass('hidden');

            if ((data.errors)) {
                setTimeout(function () {
                    $('#addModal').modal('show');
                    toastr.error('Error al crear!', 'Error Alert', {timeOut: 5000});
                }, 500);

                if (data.errors.title) {
                    $('.errorTitle').removeClass('hidden');
                    $('.errorTitle').text(data.errors.title);
                }
                if (data.errors.category) {
                    $('.errorCategory').removeClass('hidden');
                    $('.errorCategory').text(data.errors.title);
                }
                if (data.errors.content) {
                    $('.errorContent').removeClass('hidden');
                    $('.errorContent').text(data.errors.content);
                }
            } else {
                toastr.success('Tema añadido con éxito!', 'Success Alert', {timeOut: 5000});
                $('#topicsTable').prepend(
                    "<tr class='item" + data.id + "'>" +
                    "<td class='col1'>" + data.id + "</td>" +
                    "<td>" + data.title + "</td>" +
                    "<td>" + data.category + "</td>" +
                    "<td>" + data.content + "</td>" +
                    "<td class='text-center'>" +
                    "<td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" +
                    "<span class='glyphicon glyphicon-eye-open'></span> Show</button> " +
                    "<button class='edit-modal btn btn-info' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" +
                    "<span class='glyphicon glyphicon-edit'></span> Edit</button> " +
                    "<button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.title + "' data-category='" + data.category + "' data-content='" + data.content + "'>" +
                    "<span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");

                $('.col1').each(function (index) {
                    $(this).html(index + 1);
                });
            }
        },
    });
});