$(document).ready(function () {
    $("input[name='post_image']").change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#post_image_preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
    $("input[name='opt_blog_logo']").change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#opt_blog_logo_preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
    $("input[name='opt_blog_avatar']").change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#opt_blog_avatar_preview").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
});