$(document).ready(function() {
    $('.reply-to-comment').on('click', function(event) {
        event.preventDefault();
        
        $(this).closest('.comment-body').next('.comment-form-reply').toggle();
    })
});