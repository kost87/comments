function btnSubmitCommentClick(id) {
    content = $('#txtComment_' + id).val();
    $.post( "insert_comment.php", {
        content: content, id_parent: id
    })
        .done(function( data ) {
            location.reload();
        });
}

function btnEditCommentClick(id) {
    content = $('#txtComment_' + id).val();
    $.post( "edit_comment.php", {
        id: id, content: content
    })
        .done(function( data ) {
            let comment = $.parseJSON(data);
            $('#'+comment.id).children('.comment_head').html(comment.user + ' - ' + comment.updated_at)
            $('#'+comment.id).children('.comment_content').html(comment.content)
            $('#'+id).find(".answer_form").empty()
        });
}

$( document ).ready(function()
{
    $( document ).on( "click", ".answer,.edit", function() {
        let id = $(this).parent("div").attr('id')
        $(this).siblings(".answer_form").empty()
        let content = ''
        let function_name = 'btnSubmitCommentClick'
        if ($(this)[0].className == 'edit')
        {
            content = $(this).siblings(".comment_content").html();
            function_name = 'btnEditCommentClick'
        }
        $(this).siblings(".answer_form").html('<div class="form-group"> \
            <textarea class="form-control" name="comment" id="txtComment_' + id + '" rows="2" placeholder="Оставьте свой комментарий...">' + content + '</textarea><br>\
            <input class="btn btn-primary btnSubmitComment" type="button" onClick="' + function_name + '(' + id + ')" value="Сохранить"></div>')
    });
});