
    // $(document).ready(function() {
    //     $('.edit-comment-btn').click(function() {
    //         var commentId = $(this).data('comment-id');
    //         var commentContent = $(this).siblings('.comment-content').text();
    //         var editForm = '<form class="edit-comment-form" data-comment-id="' + commentId + '">' +
    //                             '<div class="form-group">' +
    //                                 '<textarea class="form-control" name="content" rows="3">' + commentContent + '</textarea>' +
    //                             '</div>' +
    //                             '<button type="submit" class="btn btn-primary">Update</button>' +
    //                         '</form>';

    //         $(this).parent().append(editForm);
    //         $(this).hide();
    //     });

    //     $(document).on('submit', '.edit-comment-form', function(e) {
    //         e.preventDefault();

    //         var commentId = $(this).data('comment-id');
    //         var formData = $(this).serialize();

    //         $.ajax({
    //             url: '/comments/' + commentId,
    //             type: 'PUT',mhjm
    //             data: formData,
    //             success: function(response) {
    //                 $('.edit-comment-form[data-comment-id="' + commentId + '"]').remove();
    //                 $('.edit-comment-btn[data-comment-id="' + commentId + '"]').show();
    //                 $('.comment-content[data-comment-id="' + commentId + '"]').text(response.content);
    //             },
    //             error: function(xhr) {
    //                 console.log(xhr.responseText);
    //             }
    //         });
    //     });
    // });



