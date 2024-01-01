
$('.left-side .anchor').on('click', function(event){
    event.preventDefault();
    $('.left-side .anchor').removeClass('active');
    $(this).addClass('active');
})