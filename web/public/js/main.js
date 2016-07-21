var time = 0;
$('document').ready(function(){
    var $form = $('form');
    var $first = $form.children('.question').first();
    $first.toggleClass('hidden');
    $first.find('.previous').toggleClass('hidden');
    $form.children('.question').last().find('.next').toggleClass('hidden');

    $('.next').on('click', function () {
        var $div = $(this).closest('.question');
        $div.toggleClass('hidden');
        var id = parseInt($div.attr('id').substr(1)) + 1;
        id = 'q'+id;
        $('#'+id).toggleClass('hidden');
    });

    $('.previous').on('click', function () {
        var $div = $(this).closest('.question');
        $div.toggleClass('hidden');
        var id = parseInt($div.attr('id').substr(1)) - 1;
        id = 'q'+id;
        $('#'+id).toggleClass('hidden');
    });

    timer();
});

function timer(){
    time++;
    var minutes = parseInt(time / 60);
    var seconds = time % 60;
    if (seconds < 10) {
        seconds = '0'+seconds;
    }
    if (minutes < 10) {
        minutes = '0'+minutes;
    }
    $('#seconds').html(seconds);
    $('#minutes').html(minutes);

    setTimeout(function(){
        timer();
    }, 1000);
}