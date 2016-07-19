$('document').ready(function(){
    var $form = $('form');
    var $first = $form.children('.question').first();
    $first.toggleClass('hidden');
    $first.find('.previous').toggleClass('hidden');
    $form.children('.question').last().find('.next').toggleClass('hidden');

    $('.next').on('click', function () {
        var $div = $(this).closest('.question');
        $div.hide();
        $div.next().toggleClass('hidden');
    });

    $('.previous').on('click', function () {
        var $div = $(this).closest('.question');
        $div.hide();
        $div.siblings().first().toggleClass('hidden');
    });
});
