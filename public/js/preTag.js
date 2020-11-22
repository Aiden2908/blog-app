//handles removing pre tag.
let content = [];
$('pre').each(function() {
    content.push($(this).html())
    $(this).remove();
});
$('.body-container').each(function() {
    let i = 0;
    $(this).html(content[i]);
    i++;
});