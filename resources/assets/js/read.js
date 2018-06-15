// Show a topic
$(document).on('click', '.show-modal', function () {
    $('.modal-title').text('Show');
    $('#id_show').val($(this).data('id'));
    $('#title_show').val($(this).data('title'));
    $('#category_show').val($(this).data('category'));
    $('#content_show').val($(this).data('content'));
    $('#showModal').modal('show');
});